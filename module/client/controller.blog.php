<?
class blog_client extends TClientController {
	public function blog($code_name){
		$header = 'Новое';
		if (preg_match('#^blog_tag_#',$code_name))
			$code_name = preg_replace('#^(blog)_tag_.*#','\\1',$code_name);
		$this->content = $this->load_module($code_name);
		
		$groups = $this->core->sql->query("SELECT `dat_blog_group`.`alias`, `dat_blog_group`.`id`, `dat_blog_group`.`title`, COUNT(`dat_blog_list`.`id`) as `count`  FROM `dat_blog_group` LEFT JOIN `dat_blog_list` ON (`dat_blog_group`.`id` = `dat_blog_list`.`group_id`) GROUP BY `dat_blog_group`.`alias`");
		
		$submenu = array();
		for ($i=0; $i<$groups->num_rows; $i++) {
			if ($this->page == $groups->cell[$i]['alias'])
				$header = $groups->cell[$i]['title'];
			array_push($submenu, array("alias" => $groups->cell[$i]['alias'],
									   "id" => $groups->cell[$i]['id'],
									   "title" => "{$groups->cell[$i]['title']} [!-]{$groups->cell[$i]['count']}[-!]",
									   "count" => $groups->cell[$i]['count']));
		}
		uasort($submenu,"func::absArrayCountSort");
		
		$tagmenu = array();
		$tags = $this->core->sql->query("SELECT `tags` FROM `dat_blog_list` GROUP BY `tags`");
		$tags_list = array();
		for ($i=0; $i<$tags->num_rows; $i++) {
			$tmp = func::extractTags($tags->cell[$i]['tags']);
			foreach($tmp as $key => $val) {
				if (preg_match('#[\'"]#',$val)) {
					continue;
				}
				if (!in_array($val, $tags_list) && !empty($val)) {
					array_push($tags_list, $val);
				}
			}
		}
		foreach($tags_list as $key => $val) {
			$count = $this->core->sql->query("SELECT count(`id`) as `count` FROM `dat_blog_list` WHERE (`tags` LIKE '%[{$val}]%')");
			array_push($tagmenu, array("alias" => "tag_".func::convertTagToURI($val),
									   "id" => '',
									   "title" => "{$val} [!-]{$count->cell[0]['count']}[-!]",
									   "count" => $count->cell[0]['count']));
		}
		uasort($tagmenu,"func::absArrayCountSort");
		
		$pos_on_page = 5;
		
		if (empty($this->subpage)) {
			$post_list = array();
			if (empty($this->page)) {
				$count = $this->core->sql->query("SELECT count(`id`) as `count` FROM `dat_blog_list`");
				$posts = $this->core->sql->query("SELECT 
													`dat_blog_list`.`alias`, 
													`dat_blog_group`.`title` as `group_title`, 
													`dat_blog_group`.`alias` as `group_alias`, 
													`dat_blog_list`.`title`, `dat_blog_list`.`text`, 
													`dat_blog_list`.`tags`, `dat_blog_list`.`livejournal`, 
													`datetime` 
												FROM `dat_blog_list`, `dat_blog_group` 
												WHERE (`dat_blog_group`.`id` = `dat_blog_list`.`group_id`) 
												ORDER BY `dat_blog_list`.`datetime` DESC
												LIMIT ".(pg*$pos_on_page).",{$pos_on_page}");
			} else
			if (preg_match('#^tag_#i',$this->page)) {
				$page = preg_replace('#^tag_#','',$this->page);
				$header = "Рубрика - ".str_replace('_',' ',$page);
				$where = "AND `tags` LIKE '%[{$page}]%'";
				$count = $this->core->sql->query("SELECT count(`id`) as `count` FROM `dat_blog_list` WHERE (1 {$where})");
				$posts = $this->core->sql->query("SELECT 
													`dat_blog_list`.`alias`, 
													`dat_blog_list`.`title`, 
													`dat_blog_list`.`text`, 
													`dat_blog_list`.`tags`, 
													`dat_blog_list`.`livejournal`, 
													`dat_blog_list`.`datetime`, 
													`dat_blog_group`.`alias` as `group_alias` 
												FROM `dat_blog_list`, `dat_blog_group` 
												WHERE (`dat_blog_list`.`group_id`=`dat_blog_group`.`id` {$where}) 
												ORDER BY `dat_blog_list`.`datetime` DESC
												LIMIT ".(pg*$pos_on_page).",{$pos_on_page}");
			} else {
				$where = "AND `dat_blog_group`.`alias`='{$this->page}'";
				$count = $this->core->sql->query("SELECT count(`dat_blog_list`.`id`) as `count` FROM `dat_blog_list`, `dat_blog_group` WHERE (`dat_blog_list`.`group_id`=`dat_blog_group`.`id` {$where})");
				$posts = $this->core->sql->query("SELECT 
													`dat_blog_list`.`alias`, 
													`dat_blog_list`.`title`, 
													`dat_blog_list`.`text`, 
													`dat_blog_list`.`tags`, 
													`dat_blog_list`.`livejournal`, 
													`dat_blog_list`.`datetime` 
												FROM `dat_blog_list`, `dat_blog_group`
												WHERE (`dat_blog_list`.`group_id`=`dat_blog_group`.`id` {$where}) 
												ORDER BY `dat_blog_list`.`datetime` DESC
												LIMIT ".(pg*$pos_on_page).",{$pos_on_page}");
												
				if ($count->cell[0]['count'] == 0) {
					$this->content = $this->error404($code_name);
					return $this->content;
				}
			}
			for ($i=0; $i<$posts->num_rows; $i++) {
				$imgs = func::getImagesURL($posts->cell[$i]['text']);
				if ($imgs) {
					$imgs_list = array();
					for ($ii=0; $ii<(count($imgs)>1?1:count($imgs)); $ii++) {
						array_push($imgs_list, array("src" => preg_replace('#/data/image/(.*)\.([jpegnif]{3,4})$#i','/img-image/$1-$2-562c370-82.$2',$imgs[$ii][1]),
													 "size" => func::imageGetSizeRestric($imgs[$ii][1], 562, 370),
													 "alt" => $imgs[$ii][2]));
					}
				} else
					$imgs_list = false;
				$date = preg_split('/[- :]/', $posts->cell[$i]['datetime']);
				$posts->cell[$i]['text'] = (($stag = func::getShortTagText($posts->cell[$i]['text'])) == false)?func::subText($posts->cell[$i]['text'],400):$stag;
				$posts->cell[$i]['tags'] = func::extractTags($posts->cell[$i]['tags']);
				$posts->cell[$i]['imgs'] = $imgs_list[0];
				$posts->cell[$i]['comments'] = $this->core->sql->get_num_rows('sys_comments', "`channel`='http://{$_SERVER['SERVER_NAME']}/{$this->core->SITE_SECTION_NAME}/{$posts->cell[$i]['group_alias']}/{$posts->cell[$i]['alias']}/'");
				$posts->cell[$i]['date'] = array(
					"day" => $date[2],
					"month" => func::dateGetMonthName($date[1]),
					"year" => $date[0],
					"week" => func::dateGetWeekFullDay($date[0],$date[1],$date[2])
				);
			}
			if ($header != 'Последние посты') {
				$this->content['title'] = $header;
				$this->content['keywords '] = '';
				$this->content['description '] = '';
			}
			$this->content['content'] = array('header' => $header,
											  'post_list' => $posts->cell,
											  'pages' => ceil($count->cell[0]['count']/$pos_on_page),
											  'page' => pg);
		} else {
			$post = $this->core->sql->query("SELECT `dat_blog_list`.`alias`, `dat_blog_list`.`title`, `dat_blog_list`.`menutitle` as `subtitle`, `dat_blog_list`.`text`, `dat_blog_list`.`tags`, `dat_blog_list`.`livejournal`, `dat_blog_list`.`datetime` FROM `dat_blog_list`, `dat_blog_group` WHERE (`dat_blog_list`.`group_id`=`dat_blog_group`.`id` AND `dat_blog_list`.`alias`='{$this->subpage}') ORDER BY `dat_blog_list`.`datetime` DESC");

			if ($post->num_rows == 0) {
				$this->content = $this->error404($code_name);
				return $this->content;
			}
			
			$imgs = func::getImagesURL($post->cell[0]['text']);
			if ($imgs) {
				$this->content['photo_like'] = "http://{$_SERVER['SERVER_NAME']}".preg_replace('#/data/image/(.*)\.([jpegnif]{3,4})$#i','/img-image/$1-$2-300x0-90.$2',$imgs[0][1]);
			}
			$date = preg_split('/[- :]/', $post->cell[0]['datetime']);
			$post->cell[0]['text'] = func::correctMediaSize(func::setMaxImageSize(func::delEmptyParagraph(func::delShortTagText($post->cell[0]['text'])), 562, 562, "0xfcfcfc:85"), 562);
			$post->cell[0]['tags'] = func::extractTags($post->cell[0]['tags']);
			$post->cell[0]['url'] = "http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}";
			$post->cell[0]['comments'] = $this->core->sql->get_num_rows('sys_comments', "`channel`='http://{$_SERVER['SERVER_NAME']}/{$this->core->SITE_SECTION_NAME}/{$this->page}/{$this->subpage}/'");
			$post->cell[0]['date'] = array(
				"day" => $date[2],
				"month" => func::dateGetMonthName($date[1]),
				"year" => $date[0],
				"week" => func::dateGetWeekFullDay($date[0],$date[1],$date[2])
			);
			$this->content['content'] = array('post_cont' => $post->cell[0]);
		}
		
		$count = $this->core->sql->query("SELECT COUNT(`id`) as `num_rows` FROM `dat_blog_list`");
		$this->content['submenu'] = $submenu;
		$this->content['tagmenu'] = $tagmenu;
		$this->content['all_rows'] = $count->cell[0]['num_rows'];
		$this->content['subclass'] = "inner blog post";
		$this->content['submenu_tpl'] = "submenu.blog_list.tpl";
		return $this->content;
	}
}
?>