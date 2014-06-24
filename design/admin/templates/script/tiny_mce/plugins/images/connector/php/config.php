<?
//Корневая директория сайта
define('DIR_ROOT',		$_SERVER['DOCUMENT_ROOT']); //"/design/admin/templates/script/tiny_mce/plugins/images/connector/php/index.php"
//Директория с изображениями (относительно корневой)
define('DIR_IMAGES',	'/data/image');
//Директория с файлами (относительно корневой)
define('DIR_FILES',		'/data/file');

define('IMG_QUALITY', 	97);

//Высота и ширина картинки до которой будет сжато исходное изображение и создана ссылка на полную версию
define('WIDTH_TO_LINK', 700);
define('HEIGHT_TO_LINK', 700);

//Атрибуты которые будут присвоены ссылке (для скриптов типа lightbox)
define('CLASS_LINK', 'light-big');
define('REL_LINK', '');
?>