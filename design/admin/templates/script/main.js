var document_ready = false;

$(document).ready(function(){
	document_ready = true;
	panel.init();
	input.init();
	list.init();
	gethtml.init();
	filters.init();
	search.init();
	product.init();
	command.init();
	photouploader.init();
	photopreview.init();
	assign.init();
	tags_list.init();
	subchanger.init();
	unicalize_article.init();
	datetimepicker.init();
	marksIn.init();
});

var datetimepicker = {
	init:function() {
		$.datepicker.regional['ru'] = {
			closeText: 'Закрыть',
			prevText: '<Пред',
			nextText: 'След>',
			currentText: 'Сегодня',
			monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь','Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
			monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн','Июл','Авг','Сен','Окт','Ноя','Дек'],
			dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
			dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
			dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
			weekHeader: 'Не',
			dateFormat: 'dd-mm-yy',
			firstDay: 1,
			isRTL: false,
			showMonthAfterYear: false,
			yearSuffix: ''
		};
		$.datepicker.setDefaults($.datepicker.regional['ru']);
		
		$.timepicker.regional['ru'] = {
			timeOnlyTitle: 'Выберите время',
			timeText: 'Время',
			hourText: 'Часы',
			minuteText: 'Минуты',
			secondText: 'Секунды',
			millisecText: 'миллисекунды',
			currentText: 'Сейчас',
			closeText: 'Закрыть',
			ampm: false
		};
		$.timepicker.setDefaults($.timepicker.regional['ru']);
		if ($('input[name=datestart]')[0] != undefined && $('input[name=dateend]')[0] != undefined) {
			var ds = $('input[name=datestart]');
			var de = $('input[name=dateend]');
			ds.datetimepicker({
				onClose: function(dateText, inst) {
					var endDateTextBox = de;
					if (endDateTextBox.val() != '') {
						var testStartDate = new Date(dateText);
						var testEndDate = new Date(endDateTextBox.val());
						if (testStartDate > testEndDate)
							endDateTextBox.val(dateText);
					}
					else {
						endDateTextBox.val(dateText);
					}
				},
				onSelect: function (selectedDateTime) {
					var start = $(this).datetimepicker('getDate');
					de.datetimepicker('option', 'minDate', new Date(start.getTime()));
				}
			});
			de.datetimepicker({
				onClose: function(dateText, inst) {
					var startDateTextBox = ds;
					if (startDateTextBox.val() != '') {
						var testStartDate = new Date(startDateTextBox.val());
						var testEndDate = new Date(dateText);
						if (testStartDate > testEndDate)
							startDateTextBox.val(dateText);
					}
					else {
						startDateTextBox.val(dateText);
					}
				},
				onSelect: function (selectedDateTime){
					var end = $(this).datetimepicker('getDate');
					ds.datetimepicker('option', 'maxDate', new Date(end.getTime()) );
				}
			});
			
			var ds_time = new Date();
			if (ds.val() != '') {
				ds_time = ds.val().split(/[: \-]/);
				ds_time = new Date(ds_time[2],ds_time[1]-1,ds_time[0],ds_time[3],ds_time[4],0);
			}
				
			var de_time = new Date();
			if (de.val() != '') {
				de_time = de.val().split(/[: \-]/);
				de_time = new Date(de_time[2],de_time[1]-1,de_time[0],de_time[3],de_time[4],0);
			}
			
			ds.datetimepicker('setDate', ds_time);
			de.datetimepicker('setDate', de_time);
		} else
		if ($('input[name=datetime]')[0] != undefined) {
			var date = $('input[name=datetime]');
			date.datetimepicker();
			var date_time = new Date();
			if (date.val() != '') {
				date_time = date.val().split(/[: \-]/);
				date_time = new Date(date_time[2],date_time[1]-1,date_time[0],date_time[3],date_time[4],0);
			}
			date.datetimepicker('setDate', date_time);
		} else
		if ($('input[name=date]')[0] != undefined) {
			var date = $('input[name=date]');
			date.datetimepicker({
				showTimepicker: false
			});
			var date_time = new Date();
			if (date.val() != '') {
				date_time = date.val().split(/[: \-]/);
				date_time = new Date(date_time[2],date_time[1]-1,date_time[0],0,0,0);
			}
			date.datetimepicker('setDate', date_time);
		}
	}
}

var subchanger = {
	changer:null,
	content:null,
	init:function() {
		var _this = this;
		this.changer = $("select[class^=sub]");
		if (this.changer.length > 0) {
			this.changer.each(function(i) {
				var changer = $(this);
				var name = changer.attr('class').split('-')[0];
				changer
					.attr('type',name)
					.css('display', 'inline')
					.after(
						$('<input />')
							.addClass('text')
							.attr('name', name)
							.attr('type', 'text')
							.attr('value', changer.attr('change'))
							.css({
								'maxlength':'30',
								'width':'150px',
								'display':'inline'
							})
					)
				var content = changer.next();
				changer.change(function(){
					_this.onChange($(this), $(this).next());
				});
				_this.onChange(changer, content);
				//this.changer = $(".subtype-changer");
				//if (this.changer[0] != undefined) {
					//this.content = $("input[name=subtype]");
					/*$(this).next().change(function(){
						_this.onChange($(this).prev());
					})
					_this.onChange($(this));*/
				//}
			})
		}
	},
	
	onChange:function(obj, cnt) {
		var val = obj.val();
		if (val == '[new-'+obj.attr('type')+'-element]') {
			cnt[0].type="text";
			cnt.val('');
		} else {
			cnt[0].type="hidden";
			cnt.val(val);
		}
		//alert(this.content[0].type);
	}
}


var tags_list = {
	contaner:null,
	init:function() {
		this.contaner = $(".tags_list");
		if (this.contaner[0] != undefined) {
			this.contaner.find("span").each(function(i){
				$(this).mouseenter(function() {
					$(this).addClass('over');
				});
				$(this).mouseleave(function() {
					$(this).removeClass('over');
				});
				$(this).click(function() {
					tags_list.test($(this).find("u").text());
				});
			});
		}
	},
	test:function(tag) {
		var input = this.contaner.next();
		if (input[0] != undefined && input[0].tagName.match(/textarea/i)) {
			if ((new RegExp('^[\s\t ]*'+tag+'[\s\t ]*$','ig')).test(input.val()))
				input.val(input.val().replace(new RegExp('^[\s\t ]*'+tag+'[\s\t ]*$','ig'),''));
			else
			if ((new RegExp('^[\s\t ]*'+tag+'[\s\t ]*,[\s\t ]*','ig')).test(input.val()))
				input.val(input.val().replace(new RegExp('^[\s\t ]*'+tag+'[\s\t ]*,[\s\t ]*','ig'),''));
			else
			if ((new RegExp('[\s\t ]*,[\s\t ]*'+tag+'[\s\t ]*$','ig')).test(input.val()))
				input.val(input.val().replace(new RegExp('[\s\t ]*,[\s\t ]*'+tag+'[\s\t ]*$','ig'),''));
			else
			if ((new RegExp('[\s\t ]*,[\s\t ]*'+tag+'[\s\t ]*,[\s\t ]*','ig')).test(input.val()))
				input.val(input.val().replace(new RegExp('[\s\t ]*,[\s\t ]*'+tag+'[\s\t ]*,[\s\t ]*','ig'),', '));
			else
				input.val(input.val()+((input.val() == '')?'':', ')+tag);
		}
	}
}

var photouploader = {
	frm:null,
	upl:-1,
	pnl:new Array(),
	val:new Array(),
	init:function() {
		this.frm = $("#photouploader");
		$(".photouploader-panel").each(function() {
			photouploader.pnl.push($(this));
			photouploader.val.push('');
		});
		if (this.frm[0] != undefined) {
			this.frm.find("input").change(function() {
				new SRAX.Uploader('photouploader', photouploader.startCallback, photouploader.finishCallback, true)
			});
		}
		for (var num=0; num<this.pnl.length; num++) {
			var pnl = this.pnl[num];
			if (pnl[0] != undefined) {
				pnl.attr("num",num);
				pnl.size = Number((pnl.attr("size"))?parseInt(pnl.attr("size")):80);
				pnl.find('.button').click(function() {
					photouploader.upl = $(this).parent().attr("num");
					photouploader.frm.find("input").click();
				});
				var content = pnl.find('.photos .content');
				pnl.find('.photos').css("height",(pnl.size+23)+"px");
				if (content.find("img").length>0) {
					content.find(".item").each(function() {
						$(this).find("img").attr("width",pnl.size);
						$(this).find("img").attr("height",pnl.size);
						$(this).find("img").attr("src",$(this).find("img").attr("src").replace(/(.*)[0-9]{2,3}x[0-9]{2,3}(.*)-[0-9]{1,3}\.(jpg|png|gif)/,"$1"+pnl.size+'x'+pnl.size+"$2-85.$3"));
						if ($(this).find(".del").length == 0)
							$(this).find("img").after('<span class="del" />');
						if ($(this).find(".left").length == 0)
							$(this).find(".del").after('<span class="left" />');
						if ($(this).find(".right").length == 0)
							$(this).find(".left").after('<span class="right" />');
						$(this).find(".del").click(function() {
							photouploader.delitem($(this));
						});
						$(this).find(".left").click(function() {
							photouploader.toleft($(this));
						});
						$(this).find(".right").click(function() {
							photouploader.toright($(this));
						});
						photouploader.val[num]+=$(this).find('img').attr('alt')+';';
					});
					content.width((content.find("img").length*(pnl.size+5))+"px");
					pnl.find("input[type=hidden]").val(photouploader.val[num]);
				} else {
					content.append($('<span class="nophoto">Пусто</span>').css({
						"height":(pnl.size+23)+"px",
						"line-height":(pnl.size+23)+"px"
					}));
				}
				$(window).resize(function() {
					photouploader.update();
				});
				photouploader.update();
			}
			this.finish();
		};
	},
	startCallback:function() {
		var pnl = photouploader.pnl[photouploader.upl];
		pnl.find('.response').html('Загрузка');
		pnl.find('.response').css({
			"display":"block",
			"width":pnl.width()+"px",
			"height":(pnl.size+23)+"px",
			"line-height":(pnl.size+23)+"px"
		});
		pnl.find('.button').css({
			"visibility":"hidden"
		});
		for (var i=0; i<photouploader.pnl.length; i++)
			photouploader.pnl[i].find('.button').addClass("load");
	},
	finishCallback:function(data) {
		var pnl = photouploader.pnl[photouploader.upl];
		pnl.find('.response').html('Завершено');
		pnl.find('.response').css({
			"display":"none",
			"width":"1px"
		});
		pnl.find('.button').css({
			"visibility":"visible"
		});
		if (data == 'error type')
			alert("Отменено. Файл не является картинкой.");
		else
		if (data == 'error none')
			alert("Произошла не известная ошибка. Попробуйте позже.")
		else {
			data = data.split(/[;]/g);
			pnl.find('.photos .nophoto').remove();
			var photo = $('<div class="item"><img src="'+data[1].replace(/(.*)[0-9]{2,3}x[0-9]{2,3}(.*)-[0-9]{1,3}\.(jpg|png|gif)/,"$1"+pnl.size+'x'+pnl.size+"$2-85.$3")+'" width="'+pnl.size+'" height="'+pnl.size+'" alt="'+data[0]+'" /><span class="del"><!-- --></span><span class="left"><!-- --></span><span class="right"><!-- --></span></div>');
			var content = pnl.find('.photos .content');
			photo.find(".del").click(function() {
				photouploader.delitem($(this));
			});
			photo.find(".left").click(function() {
				photouploader.toleft($(this));
			});
			photo.find(".right").click(function() {
				photouploader.toright($(this));
			});
			content.append(photo);
			content.width((content.find("img").length*(pnl.size+5))+"px");
		}
		photouploader.val[photouploader.upl] += data[0]+";";
		pnl.find("input[type=hidden]").val(photouploader.val[photouploader.upl]);
		photouploader.finish();
		for (var i=0; i<photouploader.pnl.length; i++)
			photouploader.pnl[i].find('.button').removeClass("load");
	},
	delitem:function(object) {
		var num = object.parent().parent().parent().parent().attr("num");
		var pnl = this.pnl[num];
		
		object.parent().remove();
		var content = pnl.find('.content');
		var items = content.find(".item");
		if (items.length > 0)
			content.width((items.length*items.eq(0).outerWidth(true))+"px");
		else {
			content.width("auto");
			content.append($('<span class="nophoto">Пусто</span>').css({
				"height":(pnl.size+23)+"px",
				"line-height":(pnl.size+23)+"px"
			}));
		}
		this.updateval(num);
		this.finish();
	},
	toleft:function(object) {
		var num = object.parent().parent().parent().parent().attr("num");
		object.parent().insertBefore(object.parent().prev());
		this.updateval(num);
	},
	toright:function(object) {
		var num = object.parent().parent().parent().parent().attr("num");
		object.parent().insertAfter(object.parent().next());
		this.updateval(num);
	},
	updateval:function(num) {
		var items = this.pnl[num].find('.photos .content').find(".item");
		this.val[num] = '';
		for (var i=0; i<items.length; i++) {
			var file = items.eq(i).find("img").attr("alt");
			this.val[num]+=file+';';
		}
		this.pnl[num].find("input[type=hidden]").val(this.val[num]);
	},
	finish:function() {
		for (var num=0; num<this.pnl.length; num++) {
			var val = this.val[num];
			var pnl = this.pnl[num];
			var photos = (val == '')?0:Number(val.replace(/;$/,'').split(/[;]/g).length);
			var count = Number((pnl.attr("count"))?pnl.attr("count"):0);
			if (count>0) {
				if (photos == count) {
					pnl.find('.button').css({
						"visibility":"hidden"
					});
				} else {
					pnl.find('.button').css({
						"visibility":"visible"
					});
				}
			}
		}
	},
	update:function() {
		for (var num=0; num<this.pnl.length; num++) {
			var pnl = this.pnl[num];
			var count = Number((pnl.attr("count"))?pnl.attr("count"):0);
			if (count <= 2 && count!=0) {
				pnl.width((pnl.size+5)*count+8+"px");
			} else {
				pnl.width("1px");
				pnl.width((pnl.parent().width()-50)+"px");
			}
		}
	}
}

var photopreview = {
	display:null,
	parent:null,
	images:null,
	init:function() {
		this.parent = $(".photos.preview");
		if (this.parent != undefined) {
			this.display = $('<div class="photo-preview" />');
			this.display.insertAfter(this.parent);
			this.images = this.parent.find('div.item');
		}
	}
}

var assign = {
	pnl:null,
	wwl:null,
	cnt:null,
	interval:0,
	val:'',
	ajax:null,
	init:function() {
		this.pnl = $(".assign-panel");
		this.wwl = $(".assign-panel .search-window");
		this.cnt = $(".assign-panel .content");
		
		if (this.pnl[0] != undefined) {
			$(window).resize(function() {
				assign.update();
			});
			assign.update();
			
			this.pnl.find('.button').click(function() {
				assign.openSearchWindow();
			});
			this.wwl.find("input[name=search]").keyup(function() {
				var exp = assign.updateItemList();
				assign.querySearchList($(this).val(), exp);
			})
			this.wwl.click(function(){
				$(this).attr("visible","0");
			})
			
			var items = this.cnt.find('.item');
			if (items.length>0) {
				items.each(function() {
					$(this).find('.del').click(function(){
						assign.delItem($(this));
					});
				})
				this.updateItemList();
			}
		}
	},
	openSearchWindow:function() {
		this.wwl.show();
		this.wwl.attr("visible","0");
		$(document).bind('click', assign.closeSearchWindow);
		var exp = assign.updateItemList();
		this.getSearchList(this.wwl.find("input[name=search]").val(), exp);
	},
	closeSearchWindow:function(obj) {
		if (assign.wwl.attr("visible") == "0")
			assign.wwl.attr("visible","1");
		else
		if (assign.wwl.attr("visible") == "1") {
			assign.wwl.attr("visible","0");
			assign.wwl.hide();
			$(document).unbind('click', assign.closeSearchWindow);
		}
	},
	querySearchList:function(val, exp) {
		clearTimeout(this.interval);
		this.interval = setTimeout(function(){
			assign.getSearchList(val, exp);
		}, 500);
	},
	getSearchList:function(val, exp) {
		val = val.trim();
		var location = new String(self.location.href).replace(/\/:.*/,'/');
		if (this.ajax)
			this.ajax.abort();
		this.ajax = $.ajax({
			type: "POST",
			url: location+":axah=out&action=getitemlist",
			data: {query:val, exception:exp},
			dataType: "html",
			success: function(data) {
				assign.wwl.find('.list').html(data);
				assign.wwl.find('.list .item').click(function(){
					assign.addItem($(this))
				})
			},
			error: function() {
				alert("error");
			}
		});
	},
	addItem: function(item) {
		if (this.cnt.find('.noitem').length)
			this.cnt.find('.noitem').remove();
		this.cnt.append(item);
		item.unbind('click');
		item.find('.del').click(function(){
			assign.delItem($(this));
		});
		this.cnt.width((this.cnt.find("img,.img").length*107)+"px");
		this.updateItemList();
	},
	delItem:function(object) {
		object.parent().remove();
		this.updateItemList();
		this.cnt.width((this.cnt.find("img,.img").length*107)+"px");
	},
	updateItemList:function() {
		var items = this.cnt.find('.item');
		this.val = '';
		for (i=0; i<items.length; i++)
			this.val+=items.eq(i).attr('dbid')+';';
		this.pnl.find("input:last").val(this.val);
		return this.val;
	},
	update:function() {
		this.pnl.width("1px");
		this.pnl.width((this.pnl.parent().width()-50)+"px");
	}
}
							
var command = {
	init:function() {
		$("a.del").click(function() {
			var title = new String($(this).parent().parent().find(".title").text()).trim();
			if(confirm('Вы действительно хотите удалить "'+title.substr(0,10)+'..." ?'))
				return true;
			else
				return false;
		});
	}
}

var product = {
	init:function() {
		$("input").each(function() {
			if ($(this).attr("class")) {
				if ((data = new String($(this).attr("class")).match(/(edit_[^ ]*)/)) != null) {
					var field = data[1];
					$(this).keydown(product.setValue);
					$(this).keypress(product.filter);
					if (field.match(/count/))
						$(this).attr("available","13,8,0,48,49,50,51,52,53,54,55,56,57");
					else
					if (field.match(/price/))
						$(this).attr("available","13,8,0,46,48,49,50,51,52,53,54,55,56,57");
					else
					if (field.match(/priority/))
						$(this).attr("available","13,8,0,48,49,50,51,52,53,54,55,56,57");
				}
			}
		})
	},
	
	setValue: function(event) {
		if (event.type == 'keydown') {
			if (event.which == 13) {
				$(this).css({
					"background-color":"#FFC"
				})
				var field = new String($(this).attr("class").replace(/(edit_)|(id[0-9]+)|( )/g,''));
				var id = new String($(this).attr("class").match(/id([0-9]+)/)[1]);
				var value = $(this).val();
				product.request($(this), "field="+field+"&id="+id+"&value="+value);
			}
		}
	},
	
	filter: function(event) {
		var available = new String($(this).attr("available")).split(/,/);
		var result = event.which;
		if (available != undefined) {
			var search = false;
			for (var i=0; i<available.length; i++)
				if (result == available[i]) {
					search = result;
					break;
				}
			result = search;
		}
		return result;
	},
	
	request: function(object, data) {
		var location = new String(self.location.href);
		$.ajax({
			type: "POST",
			url: location+":axah=out&action=setvalue",
			data: data,
			dataType: "html",
			success: function(data) {
				//alert(data);
				object.val(data);
				object.css({
					"background-color":"#CFC"
				})
				setTimeout(function(object) {
					object.css({
						"background-color":"#FFF"
					})
				},500,object);
			},
			error: function() {
				alert("error");
			}
		});
	}
}

var search = {
	field:null,
	submt:null,
	clear:null,
	init:function() {
		
	}
}

var filters = {
	timeout:0,
	init:function() {
		if ($(".filter .properties-button")[0] != undefined) {
			$(".filter .properties-button").click(filters.displayPanel);
			
			if ($(".filter .group")[0] != undefined)
				$(".filter .group").change(filters.setFilter);
				
			if ($(".filter .prarticle")[0] != undefined)
				$(".filter .prarticle").keydown(filters.setFilter);
				
			if ($(".filter .prtitle")[0] != undefined)
				$(".filter .prtitle").keydown(filters.setFilter);
				
			if ($(".filter .prshow")[0] != undefined)
				$(".filter .prshow").change(filters.setFilter);
				
			if ($(".filter .prcollection")[0] != undefined)
				$(".filter .prcollection").change(filters.setFilter);
			
			var focus = new String($(".filter").attr("class")).replace(/filter /, '');
			if (focus != '') {
				$("."+focus).focus();
				$("."+focus).keydown(function() {
					$(this).val($(this).val());
					$(this).unbind('keydown');
				})
			}
		}
	},
	
	displayPanel: function() {
		if ($(".filter .properties-button").hasClass('enabled')) {
			$(".filter .properties-button").removeClass('enabled');
			$(".filter .properties-panel").removeClass('enabled');
		} else {
			$(".filter .properties-button").addClass('enabled');
			$(".filter .properties-panel").addClass('enabled');
		}
	},
	
	setFilter: function(event) {
		if (event.type == 'change') {
				filters.request("filter="+$(this).attr("class")+"&value="+$(this).val());
		} else
		if (event.type == 'keydown') {
			if (event.which != 37 && event.which != 38 && event.which != 39 && event.which != 40) {
				clearTimeout(filters.timeout);
				filters.timeout = setTimeout(function(obj) {
					filters.request("filter="+obj.attr("class")+"&value="+obj.val());
				}, 1000, $(this));
			}
		}
	},
	
	request: function(data) {
		var location = new String(self.location.href);
		$.ajax({
			type: "POST",
			url: location+":axah=out&action=setfilter",
			data: data,
			dataType: "html",
			success: function(data) {
				if (data == 'succes')
					self.location.href = location;
				else
					self.location.href = location;
			},
			error: function() {
				alert("error");
			}
		});
	}
}

var gethtml = {
	init:function() {
		$(".gethtml").each(function(i) {
			$(this).zclip({
				path:"/admin/script/ZeroClipboard.swf",
				copy:function() {
					var self = location.href;
					var server_name = self.match(/http:\/\/[w\.]{0,4}([a-z0-9]+\.[a-z]{2,3})/)[1];
					var href = "http://www."+server_name+$(this).parent().parent().find(".href").text();
					var content = $(this).parent().parent().find(".text").val().replace(/\/data\//g,"http://www."+server_name+"/data/").replace(/\[s\](.*)\[\/s\]/,'').replace(/<p><\/p>/,'').replace(/<a class="light-big".*><img/ig,'<img').replace(/" \/><\/a><\/p>/g, '" /></p>')+"\n<p><br />Оригинальная версия статьи на <a href=\""+href+"\" target=\"_blank\">"+"http://www."+server_name+"/"+"</a></p>";
					return content;
				},
				beforeCopy: function() {
					//alert("Код записан в буфер обмена");
				}
			})
		})
	}
}
var validation = {
	interval:new Array(),
	frames:9,
	repeats:2,
	test:function(fields, submit) {
		var message = '';
		var result = true;
		var graphics = new Array();
		for (i=0; i<fields.length; i++) {
		var field = $("input[name='"+fields[i].name+"']");
			if (field.val().length == 0) {
				message += (" \""+fields[i].title+"\"\n");
				graphics.push(field);
			}
		}
		if (message.length>0) {
			alert("Пожалуйста заполните поля: \n"+message);
			for (i=0; i<graphics.length; i++) {
				if (!graphics[i].hasClass("need-fill"))
					graphics[i].addClass("need-fill");
				validation.interval.push(setInterval(function(motion) {
					var pos = motion.css("background-position").replace(/[a-z!]*/ig,'').split(' ');
					if (pos[1]-18 < -(18*(validation.frames*validation.repeats-1))) {
						clearInterval(validation.interval.shift());
						motion.removeClass("need-fill");
						pos[1] = 0;
					} else
						pos[1]-=18;										
					motion.css({"background-position":pos[0]+"px "+pos[1]+"px"});
				},50,graphics[i]));
			}
			return false;
		} else {
			$("#"+submit+"").addClass("disabled")
							.attr("disabled","disabled");
			return true;
		}
	}
}
var unicalize_article = {
	self:'',
	timeout:0,
	init:function() {
		if ($("input[name='article']")[0] != undefined) {
			this.self = $("input[name='article']").val();
			$("input[name='article']").keyup(function(){
				clearTimeout(unicalize_article.timeout)
				unicalize_article.timeout = setTimeout(function() {
					unicalize_article.test();
				}, 500);
			})
		}
	},
	test:function() {
		var location = new String(self.location).replace(/http\:\/\/([^\:]*)\/\:.*/ig,'http://$1/');
		this.pajax = $.ajax({
			type: "POST",
			url: location+":axah=out&action=testarticle",
			data: {article:$("input[name='article']").val()},
			dataType: "html",
			success: function(responce) {
				responce = ($("input[name='article']").val() == unicalize_article.self)?'':(responce == 1?'уже существует':'')
				$(".article_alert").text(responce);
			},
			error: function() {
			}
		});
	}
}

var list = {
	contaner:null,
	
	btn:{
		parent:null,
		ins:null,
		edt:null,
		del:null,
		
		init:function(parent) {
			this.parent = parent;
			if ($(".list_btn_insert")[0] != undefined) {
				this.ins = $(".list_btn_insert");
				this.ins.tpl = this.ins.attr("class").match(/.*([0-9])$/)[1];
				this.ins.cmd = this.ins.attr("cmd");
				this.ins.disable = this.disable;
				this.ins.enable = this.enable;
				this.ins.attr("action","add");
				this.ins.attr("value","Добавить");
				
				this.ins.click(function() {
					var action = $(this).attr("action");
					if (action == "add") {
						if (list.row.nw()) {
							$(this).attr("action","ins");
							$(this).attr("value","Внести");
							if (list.btn.edt) {
								list.btn.edt.attr("action","esc");
								list.btn.edt.attr("value","Отменить");
								list.btn.edt.enable();
							}
							if (list.btn.del)
								list.btn.del.disable();
						} else {
							alert("Ошибка.\n\nНе удалось произвести действите.");
						}
					} else
					if (action == "ins") {
						var error = list.row.insert();
						if (!error) {
							$(this).attr("action","add");
							$(this).attr("value","Добавить");
							if (list.btn.edt) {
								list.btn.edt.attr("action","edt");
								list.btn.edt.attr("value","Изменить");
							}
							list.btnActivator();
						} else {
							alert(error);
						}
					} else
					if (action == "sav") {
						var error = list.row.save();
						if (!error) {
							$(this).attr("action","add");
							$(this).attr("value","Добавить");
							if (list.btn.edt) {
								list.btn.edt.attr("action","edt");
								list.btn.edt.attr("value","Изменить");
							}
							list.btnActivator();
						} else {
							alert(error);
						}
					}
				});
			}
			
			if ($(".list_btn_edit")[0] != undefined) {
				this.edt = $(".list_btn_edit");
				this.edt.tpl = this.edt.attr("class").match(/.*([0-9])$/)[1];
				this.edt.cmd = this.edt.attr("cmd");
				this.edt.disable = this.disable;
				this.edt.enable = this.enable;
				this.edt.attr("action","edt");
				this.edt.attr("value","Изменить");
				
				this.edt.disable();
				this.edt.click(function() {
					var action = $(this).attr("action");
					if (action == "esc") {
						if (list.row.escape()) {
							$(this).attr("action","edt");
							$(this).attr("value","Изменить");
							if (list.btn.ins) {
								list.btn.ins.attr("action","add");
								list.btn.ins.attr("value","Добавить");
							}
							list.btnActivator();
						} else {
							alert("Ошибка.\n\nНе удалось произвести действите.");
						}
					} else
					if (action == "edt") {
						var error = list.row.edit()
						if (!error) {
							$(this).attr("action","esc");
							$(this).attr("value","Отменить");
							if (list.btn.ins) {
								list.btn.ins.attr("action","sav");
								list.btn.ins.attr("value","Сохранить");
								list.btn.ins.enable();
							}
							if (list.btn.del)
								list.btn.del.disable();
						}
					}
				});
			}
			
			if ($(".list_btn_delete")[0] != undefined) {
				this.del = $(".list_btn_delete");
				this.del.cmd = this.del.attr("cmd");
				this.del.disable = this.disable;
				this.del.enable = this.enable;
				this.del.attr("action","del");
				this.del.attr("value","Удалить");
				
				this.del.disable();
				this.del.click(function() {
					var error = list.row.del();
					if (!error) {
						list.btnActivator();
					} else
						alert(error);
				});
			}
			
		},
		disable:function() {
			$(this).addClass("disabled");
			$(this).attr("disabled","disabled");
		},
		enable:function() {
			$(this).removeClass("disabled");
			$(this).removeAttr("disabled");
		}
	},
	
	row:{
		parent:null,
		
		init:function(parent) {
			this.parent = parent;
		},
		nw:function() {
			if (this.parent.contaner.find(".no_data")[0] != undefined) {
				this.parent.contaner.find(".no_data").remove();
				this.parent.contaner.append("<table></table>");
			}
			this.parent.contaner.find("input[type='checkbox']").attr("disabled","disabled");
			
			var rowNum = this.parent.contaner.find("table tr").length%2;
			var newPos = (this.parent.contaner.find("table tr").length > 0)?(parseInt(parseInt(this.parent.contaner.find("table tr:last td:first").text())/10)+1)*10:10;
			this.parent.contaner.find("table").append(this.parent.tpl[list.btn.ins.tpl].newForm.replace(/\{ROWNUM\}/,rowNum).replace(/\{NEWSORT\}/,newPos));
			return true;
		},
		escape:function() {
			var edit = this.parent.contaner.find("table").find("tr.edit");
			if (edit.length > 0) {
				edit.each(function(i) {
					var form = $(this);
					var rowId = form.attr("rowid");
					var fields = {alias:form.attr("lastalias"), 
								  sort:form.attr("lastsort"),
								  name:form.attr("lastname")}
					var tplfld = list.tpl[list.btn.edt.tpl].fields;
					for (var i=0; i<tplfld.length; i++)
						fields[tplfld[i]] = form.attr("last"+tplfld[i]);
					
					var newChild = list.tpl[list.btn.edt.tpl].newRow.replace(/\{ROWID\}/,rowId)
																	.replace(/\{NEWALIAS\}/,fields.alias)
																	.replace(/\{ROWNUM\}/,0)
																	.replace(/\{NEWSORT\}/,fields.sort)
																	.replace(/\{NEWNAME\}/,fields.name);
					
					for (var f=0; f<tplfld.length; f++)
						newChild = newChild.replace(new RegExp('\{NEW'+(new String(tplfld[f]).toUpperCase())+'\}'), fields[tplfld[f]]);
					newChild = $(newChild);
					
					newChild.removeClass("row0");
					if (form.hasClass("row0"))
						newChild.addClass("row0");
					else
						newChild.addClass("row1");
					if (list.btn.edt || list.btn.del || (list.btn.edt && list.btn.del)) {
						newChild.find("input[type='checkbox']").click(function() {
							list.btnActivator();
						});
					}
					form.after(newChild);
					form.remove();
				});
			}
			this.parent.contaner.find("table").find("tr.form").remove();
			this.parent.contaner.find("input[type='checkbox']").removeAttr("disabled");
			return true;
		},
		insert:function() {
			list.btn.ins.disable();
			var form = this.parent.contaner.find("table").find("tr.form");
			var newAlias = form.find("input:eq(0)").attr("value");
			var newSort = form.find("input:eq(1)").attr("value");
			var newName = form.find("input:eq(2)").attr("value");
			var fields = {alias:newAlias, 
						  priority:newSort,
						  title:newName}
			var tplfld = list.tpl[list.btn.edt.tpl].fields;
			for (var i=0; i<tplfld.length; i++) {
				fields[tplfld[i]] = form.find("*[name='"+tplfld[i]+"']").attr("value");
			}
			/*for (prop in fields) {
				alert(prop+" = "+fields[prop]);
			}*/
			
			var rowNum = (this.parent.contaner.find("table tr").length+1)%2;
			if (newSort == '' || newName == '') {
				list.btn.ins.enable();
				return "Пожалуйста заполните все поля!";
			} else
			if (!newSort.match(/^[0-9]+$/g))
				return "В поле \"Позиция\" допустимы только целочисленные значения";
			form.remove();
			this.parent.contaner.find("input[type='checkbox']").removeAttr("disabled");
			
			var location = self.location.href;
			$.ajax({
				type: "POST",
				url: location+":axah=out&action="+list.btn.ins.cmd,
				data: (fields),
				dataType: "html",
				success: onInsert,
				error: function() { alert("error"); }
			});
			function onInsert(id) {
				var newId = id;
				var newChild = list.tpl[list.btn.ins.tpl].newRow.replace(/\{ROWID\}/,newId)
																.replace(/\{NEWALIAS\}/,newAlias)
																.replace(/\{ROWNUM\}/,rowNum)
																.replace(/\{NEWSORT\}/,newSort)
																.replace(/\{NEWNAME\}/,newName);
				for (var i=0; i<tplfld.length; i++)
					newChild = newChild.replace(new RegExp('\{NEW'+(new String(tplfld[i]).toUpperCase())+'\}'), fields[tplfld[i]]);
				newChild = $(newChild);
				
				if (list.btn.edt || list.btn.del || (list.btn.edt && list.btn.del)) {
					newChild.find("input[type='checkbox']").click(function() {
						list.btnActivator();
					});
				}
				list.contaner.find("table").append(newChild);
			}
			
			setTimeout(function() {
				list.btn.ins.enable();
			},100);
			return false;
		},
		del:function() {
			if (confirm('Удалить выбранные позиции?\n\nВнимание! После удаления, восстановить позиции и их содержание будет невозможно!')) {
				var selection = this.parent.getSelection();
				var length = selection.length;
				var id_list = '';
				for (var i=0; i<length; i++) {
					var contaner = selection[i][1].parent().parent().parent();
					var id = contaner.attr("rowid");
					id_list+=(id+(i<length-1?";":''));
					contaner.remove();
				}
				var location = self.location.href;
				$.ajax({
					type: "POST",
					url: location+":axah=noout&action="+list.btn.del.cmd,
					data: ({id_list:id_list}),
					dataType: "html",
					error: function() { alert("error"); }
				});
				this.parent.contaner.find("tr").each(function(i) {
					$(this).attr("class","row"+(i%2));
				});
			}
			return false;
		},
		edit:function() {
			var selection = this.parent.getSelection();
			var length = selection.length;
			var id_list = '';
			for (var i=0; i<length; i++) {
				var contaner = selection[i][1].parent().parent().parent();
				var rowId = contaner.attr("rowid");
				var editAlias = contaner.attr("alias");
				var editSort = contaner.find("td:eq(0)").text();
				var editName = contaner.find("td:eq(1)").text();
				var fields = {alias:editAlias, 
							  priority:editSort,
							  title:editName}
				var tplfld = list.tpl[list.btn.edt.tpl].fields;
				for (var f=0; f<tplfld.length; f++) {
					fields[tplfld[f]] = contaner.find("*[name='"+tplfld[f]+"']").text();
				}
				
				var newChild = list.tpl[list.btn.edt.tpl].editForm.replace(/\{ROWID\}/,rowId)
														 .replace(/\{ALIAS\}/,fields.alias)
														 .replace(/\{SORT\}/,fields.priority)
														 .replace(/\{NAME\}/,fields.title);
				for (var f=0; f<tplfld.length; f++)
					newChild = newChild.replace(new RegExp('\{'+(new String(tplfld[f]).toUpperCase())+'\}'), fields[tplfld[f]]);
				newChild = $(newChild);
				
				newChild.attr("lastalias",fields.alias);
				newChild.attr("lastsort",fields.priority);
				newChild.attr("lastname",fields.title);
				for (var f=0; f<tplfld.length; f++)
					newChild.attr("last"+tplfld[f],fields[tplfld[f]]);
				if (contaner.hasClass("row0"))
					newChild.addClass("row0")
				else
					newChild.addClass("row1")
				contaner.after(newChild);
				contaner.remove();
			}
			this.parent.contaner.find("input[type='checkbox']").attr("disabled","disabled");
			return false;
		},
		save:function() {
			var edit = this.parent.contaner.find("table").find("tr.edit");
			var error = false;
			if (edit.length > 0) {
				edit.removeClass("error");
				edit.each(function(i) {
					var form = $(this);
					var newSort = form.find("input:eq(1)").attr("value");
					var newName = form.find("input:eq(2)").attr("value");
					if (newSort == '' || newName == '') {
						error = "Пожалуйста заполните все поля!";
						$(this).addClass("error");
						$(this).find("input:eq(2)").select();
						return false;
					} else
					if (!newSort.match(/^[0-9]+$/g)) {
						error = "В поле \"Позиция\" допустимы только целочисленные значения";
						$(this).addClass("error");
						$(this).find("input:eq(1)").select();
						return false;
					}
				});
				if (error)
					return error;
				var save_list = '';
				edit.each(function(i) {
					var form = $(this);
					var fields = {id:form.attr("rowid"),
								  alias:form.find("input:eq(0)").attr("value"), 
								  sort:form.find("input:eq(1)").attr("value"),
								  name:form.find("input:eq(2)").attr("value")}
					var tplfld = list.tpl[list.btn.edt.tpl].fields;
					for (var f=0; f<tplfld.length; f++)
						fields[tplfld[f]] = new String(form.find("*[name='"+tplfld[f]+"']").val()).replace(/[\n\r\t]*/ig, '').replace(/textarea/ig,'');
					
					save_list+=(fields.id+"\n"+fields.alias+"\n"+fields.sort+"\n"+fields.name);
					for (var f=0; f<tplfld.length; f++)
						save_list+="\n"+fields[tplfld[f]];
					save_list+=(i<edit.length-1?"\n\n":'');
					
					var newChild = list.tpl[list.btn.edt.tpl].newRow.replace(/\{ROWID\}/,fields.id)
															 .replace(/\{NEWALIAS\}/,fields.alias)
															 .replace(/\{ROWNUM\}/,0)
															 .replace(/\{NEWSORT\}/,fields.sort)
															 .replace(/\{NEWNAME\}/,fields.name);
					for (var i=0; i<tplfld.length; i++)
						newChild = newChild.replace(new RegExp('\{NEW'+(new String(tplfld[i]).toUpperCase())+'\}'), fields[tplfld[i]].replace(/\[\/(T|K|D)\]/ig,"[/$1]\n").replace(/<\/(h[0-9]|span|div|p)>/ig,"</$1>\n"));
					newChild = $(newChild);
				
					newChild.removeClass("row0");
					if (form.hasClass("row0"))
						newChild.addClass("row0");
					else
						newChild.addClass("row1");
					if (list.btn.edt || list.btn.del || (list.btn.edt && list.btn.del)) {
						newChild.find("input[type='checkbox']").click(function() {
							list.btnActivator();
						});
					}
					form.after(newChild);
					form.remove();
				});
			}
			$.ajax({
				type: "POST",
				url: location+":axah=noout&action="+list.btn.edt.cmd,
				data: ({save_list:save_list}),
				dataType: "html",
				error: function() { alert("error"); }
			});
			this.parent.contaner.find("input[type='checkbox']").removeAttr("disabled");
			return false;
		}
	},
	
	tpl:[{
		fields:[],
		newForm:'<tr class="form row{ROWNUM}">\
					<input id="alias" name="alias" type="hidden" value="" />\
					<td class="sort"><input type="text" value="{NEWSORT}" maxlength=10 /></td>\
					<td><input type="text" onkeyup="aliasConvert.setCnvHiddenVal(this, \'alias\');" /></td>\
					<td class="cmd"><!-- --></td>\
				</tr>',
		newRow:'<tr class="row{ROWNUM}" rowid="{ROWID}" alias="{NEWALIAS}">\
					<td class="sort">{NEWSORT}</td>\
					<td>{NEWNAME}</td>\
					<td class="cmd"><label><input type="checkbox" /></label></td>\
				</tr>',
		editForm:'<tr class="form edit" rowid="{ROWID}">\
					<input id="alias" name="alias" type="hidden" value="{ALIAS}" />\
					<td class="sort"><input type="text" value="{SORT}" maxlength=10 /></td>\
					<td><input type="text" value="{NAME}" onkeyup="aliasConvert.setCnvHiddenVal(this, \'alias\');" /></td>\
					<td class="cmd"><!-- --></td>\
				</tr>'
	},
	{	
		fields:['description'],
		newForm:'<tr class="form row{ROWNUM}">\
					<input id="alias" name="alias" type="hidden" value="" />\
					<td class="sort"><div><input type="text" value="{NEWSORT}" maxlength=10 /></div></td>\
					<td class="title"><div><input type="text" onkeyup="aliasConvert.setCnvHiddenVal(this, \'alias\');" /></div></td>\
					<td><div><textarea type="text" name="description"></textarea></div></td>\
					<td class="cmd"><!-- --></td>\
				</tr>',
		newRow:'<tr class="row{ROWNUM}" rowid="{ROWID}" alias="{NEWALIAS}">\
					<td class="sort">{NEWSORT}</td>\
					<td class="title">{NEWNAME}</td>\
					<td name="description"><xmp>{NEWDESCRIPTION}</xmp></td>\
					<td class="cmd"><label><input type="checkbox" /></label></td>\
				</tr>',
		editForm:'<tr class="form edit" rowid="{ROWID}">\
					<input id="alias" name="alias" type="hidden" value="{ALIAS}" />\
					<td class="sort"><div><input type="text" value="{SORT}" maxlength=10 /></div></td>\
					<td class="title"><div><input type="text" value="{NAME}" onkeyup="aliasConvert.setCnvHiddenVal(this, \'alias\');" /></div></td>\
					<td><div><textarea type="text" name="description">{DESCRIPTION}</textarea></div></td>\
					<td class="cmd"><!-- --></td>\
				</tr>'
	}],
	
	init:function() {
		if ($(".list")[0] != undefined) {
			this.contaner = $(".list");
			this.btn.init(this);
			this.row.init(this);
			
			if (this.btn.edt || this.btn.del || (this.btn.edt && this.btn.del)) {
				this.contaner.find("input[type='checkbox']").each(function(i){
					$(this).click(function() {
						list.btnActivator();
					});
				});
			}
			this.getSelection();
		}
	},
	
	getSelection:function() {
		var checked = new Array();
		this.contaner.find("input[type='checkbox']").each(function(i){
			if ($(this).attr("checked"))
				checked.push([i,$(this)]);
		});
		return checked;
	},
	
	btnActivator:function() {
		if (list.getSelection().length == 0) {
			if (list.btn.edt)
				list.btn.edt.disable();
			if (list.btn.del)
				list.btn.del.disable();
		} else {
			if (list.btn.edt)
				list.btn.edt.enable();
			if (list.btn.del)
				list.btn.del.enable();
		}
	}
}

var input = {
	init:function() {
		if ($("input")[0] != undefined) {
			$("input").each(function(i) {
				var config = new String($(this).attr("class")).match(/([a-z\-]+):([0-9A-z%]{1,8})/g);
				if (config)
					input.transform($(this), config);
			});
		}
		if ($("select")[0] != undefined) {
			$("select").each(function(i) {
				var config = new String($(this).attr("class")).match(/([a-z\-]+):([0-9A-z%]{1,8})/g);
				if (config)
					input.transform($(this), config);
			});
		}
		if ($("textarea")[0] != undefined) {
			$("textarea").each(function(i) {
				var config = new String($(this).attr("class")).match(/([a-z\-]+):([0-9A-z%]{1,8})/g);
				if (config)
					input.transform($(this), config);
			});
		}
	},
	transform:function(obj, cfg) {
		var length = cfg.length;
		for (i=0; i<length; i++) {
			var attr = cfg[i].split(/:/);
			if (attr[0].match(/type|maxlength|disabled/)) {
				obj.attr(attr[0],attr[1]);
			} else
			if (attr[0].match(/max-width|min-width|width|max-height|min-height|height|display/)) {
				obj.css(attr[0],attr[1]);
			} else
			if (attr[0].match(/js/)) {
				if (attr[1] == "dateNow") {
					var now = new Date();
					var day = now.getDate();
					var month = now.getMonth()+1;
					var year = now.getFullYear();
					var hours = now.getHours();
					var minutes = now.getMinutes();
					var seconds = now.getSeconds();
					
					obj.attr("value",(day<10?'0':'')+day+"-"+(month<10?'0':'')+month+"-"+year+" "+(hours<10?'0':'')+hours+":"+(minutes<10?'0':'')+minutes+":"+(seconds<10?'0':'')+seconds);
				}
			}
			
			/*switch (attr[0]) {
				case "type" || "maxlength" : {
					obj.attr(attr[0],attr[1]);
					alert(attr[0]);
					break;
				};
				case "width" : {
					alert("width tralala");
					break;
				};		
			}*/
		}
	}
}

var panel = {
	contaner:null,
	items:null,
	body:null,
	operation:null,
	init:function() {
		var _this = this;
		this.panelTransform();
		this.contaner = $(".panel");
		if (this.contaner[0] != undefined) {
			this.contaner.wrapInner('<div style="overflow: auto; overflow-x: hidden; padding: 5px;" />');
			this.contaner.find(">div").each(function(){
				if ($(this).find("div:first").hasClass("title"))
					$(this).find("div:first").prependTo($(this).find("div:first").parent().parent());
			});
			this.body = $("body");
			this.operation = this.body.find(".panel-operation");
			var _this = this;
			$(window).resize(function() {
				_this.autoSize();
			});
			setTimeout(function() {
				_this.autoSize();
			},1);
		}
		this.separate.init();
		setTimeout(function() {
			_this.mainicon.init();
		},10);
	},
	autoSize:function() {
		var body = this.body.height();
		var h2 = $("body>table>tbody>tr:first").height();
		var h3 = $("#page #right #title").height();
		var h4 = $("#page #right #tabline").height();
		var panel_height = body-(h2+h3+h4)-((this.operation[0]!=undefined)?63:32);
		$(".panel").each(function(i) {
			var padding = parseInt($(this).css("padding-top"))+parseInt($(this).css("padding-bottom"));
			var titleapp = 0;
			var object = null;
			if ($(this).find("div:eq(0)").hasClass("title"))
				object = $(this).find("div:eq(1)");
			else {
				object = $(this).find("div:eq(0)");
				titleapp = 23;
			}
			object.css({
				"height":panel_height-padding+titleapp+"px"
			});
		});
		
		if ($(".meta")[0] != undefined) {
			$(".meta input").css({
				"width":"10px"
			});
			$(".meta textarea").css({
				"width":"10px"
			});
			var mWidth = $(".meta>div:last").width()-22;
			$(".meta input").css({
				"width":mWidth+"px"
			});
			$(".meta textarea").css({
				"width":(mWidth-5)+"px",
				"max-width":(mWidth-5)+"px",
				"min-width":(mWidth-5)+"px"
			});
			$(".meta .border").css({
				"width":mWidth+"px"
			});
			//alert(mWidth);
		}
	},
	
	separate: {
		sepline:null,
		move:false,
		menu:null,
		content:null,
		security:null,
		init:function() {
			this.sepline = $("td#sep");
			if (this.sepline[0] != undefined) {
				var width = ($.cookie('sepline_pos'))?$.cookie('sepline_pos'):170
				this.sepline.prev().width(width);
				
				this.menu = this.sepline.prev();
				this.content = this.sepline.next().find('>#content');
				this.security = $('<div class="sep-opacity" />');
				
				this.sepline.mousedown(function(e) {
					panel.separate.onMouseDown(e);
				})
				$(document).mousemove(function(e) {
					panel.separate.onMouseMove(e);
				})
				$(document).mouseup(function(e) {
					panel.separate.onMouseUp(e);
				})
				this.save({'separate':width});
			}
		},
		onMouseDown:function(e) {
			$('body').addClass('separate').append('<div class="sep-cur" />').find('*').disableSelection();
			
			this.security.css({"position":"absolute", "background":"#fff", "z-index":"100", "opacity":"0.01"});
			this.security.height(this.content.height()).width(this.content.width());
			this.content.before(this.security);
			this.move = true;
		},
		onMouseMove:function(e) {
			if (this.move) {
				$('body').find('.sep-cur').css({
					"top":e.pageY+'px',
					"left":e.pageX-7+'px'
				});
				this.security.width(1);
				this.menu.width(e.pageX<150?150:(e.pageX>500?500:e.pageX));
				this.security.width(this.content.width());
				panel.mainicon.resort(e);
			}
		},
		onMouseUp:function(e) {
			if (this.move) {
				$('body *').enableSelection();
				$('body').removeClass('separate').find('.sep-cur').remove();
				this.security.remove();
				this.move = false;
				$.cookie("sepline_pos", this.menu.width(), {
					expires: 365,
					path: "/"
				});
			}
			this.save({'separate':this.menu.width()});
		},
		save:function(data) {
			var location = new String(self.location).replace(/(http\:\/\/[^\/]*).*/ig,'$1/admin/index/');
			this.ajax = $.ajax({
				type: "POST",
				url: location+":axah=noout&action=cookie",
				data: data,
				dataType: "html",
				success: function(responce) {
				},
				error: function() {
				}
			});
		}
	},
	
	mainicon: {
		contaner:null,
		blocks:null,
		blockwidth:300,
		table:null,
		init:function() {
			this.contaner = $(".main-page");
			if (this.contaner[0] != undefined) {
				this.blocks = this.contaner.find('a');
				this.contaner = this.contaner.parent().append('<div class="icon-contaner" />').find(".icon-contaner");
				this.blocks.parent().remove();
				$(window).resize(function(e) {
					panel.mainicon.resort(e);
				});
				setTimeout(function() {
					panel.mainicon.resort();
				}, 250);
			}
		},
		resort:function(e) {
			if (this.contaner) {
				if (this.table) {
					this.table.remove();
					this.table = null;
				}
				var count = Math.floor(this.contaner.width()/this.blockwidth);
				this.table = $('<table class="main-page" />');
				var row = $('<tr />');
				this.table.append(row);
				for (var i=0; i<this.blocks.length; i++) {
					var cell = $('<td />').append(this.blocks[i]);
					row.append(cell);
					if (i%count == (count-1) && i<this.blocks.length-1) {
						row = $('<tr />');
						this.table.append(row);
					}
				}
				this.contaner.append(this.table);
				if (typeof(e) == 'undefined') {
					this.table.css("display","none").fadeIn("fast");
				}
			}
		}
	},
	
	panelTransform:function() {
		$("div[mode='mark']").each(function(i) {
			var parent = $(this);
			var point = null;
			parent.append($('<table class="panels" />').append(point=$('<tr />')));
			parent.find('panel').each(function() {
				var cls = '';
				var attrs = $(this)[0].attributes;
				var title = $(this).attr("title");
				var content = $(this).html();
				$(this).remove();
				for(var i=0;i<attrs.length;i++)
					if (attrs[i].nodeName != 'title')
						cls+=' '+attrs[i].nodeName;
				var mod = (new String($(this)[0].tagName).toLowerCase());
				point.append($('<td class="'+mod+cls+'"/>').html(content).prepend('<div class="title">'+title+'</div>'));
			});
			parent.find('operation').each(function() {
				parent.append($('<div class="panel-operation" />').html($(this).html()));
				$(this).remove();
			});
			parent.find('empty').each(function() {
				$('<div class="no_data"/>').html($(this).html()).insertAfter($(this));
				$(this).remove();
			});
			parent.find('group').each(function() {
				$('<div class="group-line'+($(this).attr("title")!=undefined?' with-title':'')+'">'+($(this).attr("title")!=undefined?'<span class="title">'+$(this).attr("title")+'</span><span class="clear" />':'')+'</div>').append($(this).html()).insertAfter($(this));
				$(this).remove();
			});
			parent.find('field').each(function() {
				var field = $('<div class="field"/>').append($(this).html()).insertAfter($(this));
				if ($(this).attr("title")!=undefined)
					$('<div class="f_title">'+$(this).attr("title")+'</div>').insertBefore(field);
				$(this).remove();
			});
		});
	}
}
	
var marksIn = {
	params:null,
	marks:new Array(),
	init:function() {
		this.params = $('#tabline');
		if (this.params[0] != undefined) {
			if (new String(this.params = this.params.attr('rev')).length==0)
				return false;
			this.params = this.params.split(/;/);
			var tmp = $("div[mode='mark']");
			for (var i=0; i<tmp.length; i++) {
				tmp.eq(i).attr('id', 'texts['+i+']');
				this.marks.push(new Array(
					'mark'+(i+1),
					tmp.eq(i).attr('rev'),
					'auto'
				));
			}
			marks.init(
				this.marks,
				this.params[0],
				this.params[1],
				(this.params[2]=='')?0:this.params[2],
				this.params[3],
				this.params[4],
				this.params[5],
				this.params[6]
			);
			return true;
		}
		return false;
	}
}
var marks = {
	tabsList: null,
	tabIdName: null,
	tabSelImg: null,
	tabSelCls: null,
	tabNoSelImg: null,
	tabNoSelCls: null,
	tabLineId: null,
	
	init: function (tabsList, tabLineId , tabIdName, startTab, tabSelImg, tabSelCls, tabNoSelImg, tabNoSelCls) {
		this.tabsList = tabsList;
		this.tabIdName = tabIdName;
		this.tabLineId = tabLineId;
		this.out();
		this.tabSelImg = tabSelImg;
		this.tabSelCls = tabSelCls;
		this.tabNoSelImg = tabNoSelImg;
		this.tabNoSelCls = tabNoSelCls;
		if (startTab>=0 && startTab<this.tabsList.length)
			this.mark(startTab);
		else
			this.mark(0);
	},

	out: function () {
		var buf = '<table class="tabs" cellpadding="0" cellspacing="0">';
				buf+= '<tr>';
		for (i=0; i<this.tabsList.length; i++) {			
				buf+= '<td id="'+this.tabsList[i][0]+'" onclick="marks.mark('+i+')" class="sel"><span>'+this.tabsList[i][1]+'</span></td>';
		}	
				buf+= '<td class="end">&nbsp;</td>';
				buf+= '</tr><tr>';
				buf+= '<td colspan="'+(this.tabsList.length+1)+'">';
				buf+= '<div class="dline"><div>';
				buf+= '</td>';
				buf+= '</tr>';
				buf+= '</table>';
		/*		buf+= '<table class="tabs" cellpadding="0" cellspacing="0">';
				buf+= '<tr valign="top">';
				buf+= '<td class="content">';
				buf+= '<div id="cont">';
				buf+= '</div>';
				buf+= '</td>';
				buf+= '</tr>';
				buf+= '</table>';*/
		//document.write(buf);
		document.getElementById(this.tabLineId).innerHTML = buf;
	},
		
	mark: function (num) {
		//var contaner = document.getElementById("cont");

		for ( i = 0; i < this.tabsList.length; i++ ) {
			var elem = document.getElementById(this.tabsList[i][0]);
			elem.className = this.tabNoSelCls;
			//elem.style.width = this.tabsList[i][2];
			
			var mark = document.getElementById(this.tabIdName+"["+i+"]");
			mark.style.display = "none";
			/*if (mark.innerHTML == ':OPENED:') {
				mark.innerHTML = '';
				while (elem_mark = contaner.firstChild)
					mark.appendChild(elem_mark); 
			}*/
		}
    
		var elem = document.getElementById(this.tabsList[num][0]);
		elem.className = this.tabSelCls;
		//elem.style.width = this.tabsList[num][2];
		
		var mark = document.getElementById(this.tabIdName+"["+num+"]");
		mark.style.display = "block";
		
		/*while (elem_mark = mark.firstChild)
			contaner.appendChild(elem_mark); 
		mark.innerHTML = ':OPENED:';*/
		
		var location = self.location.href;
		var attr_page = location.match(/([a-z]+)=([a-z_0-9]+)/g);
		var add_attr = '';
		if (attr_page) {
			var replace_string = ':';
			for (var i=0; i<attr_page.length; i++) {
				replace_string+=attr_page[i]+(i<attr_page.length-1?"&":'');
				add_attr += "_"+attr_page[i].split(/=/)[1];
			}
		}
		//alert(location+":axah=noout&mark="+num+"&markattr="+add_attr)
		
		var httpRequest = this.httpObject();
		httpRequest.open("GET", location+":axah=noout&mark="+num+"&markattr="+add_attr);
		httpRequest.send(false);
		//panel.autoSize();
		if (document_ready)
			panel.autoSize();
	},
	
	httpObject: function() {
  	var objType = false;
  	try {
  		objType = new ActiveXObject('Msxml2.XMLHTTP');
  	} catch(e) {
			try {
				objType = new ActiveXObject('Microsoft.XMLHTTP');
			} catch(e) {
				objType = new XMLHttpRequest();
			}
		}
		return objType;
	}
}

var button = {
	disable: function (buttonId) {
		buttonId.style.color='#ADAECC';
		buttonId.disabled=true;
		return false;
	}
}

var showWindow = {
	open: function(windowId) {
		document.getElementById(windowId).style.display='block';
		return false;
	},
	close: function(windowId) {
		document.getElementById(windowId).style.display='none';
		return false;
	}
}

// :: ALIAS CONVERT ==================================================================================================

var aliasConvert = {
	convertTable: Array(Array('[аA]','a'),
						Array('[бB]','b'),
						Array('[вV]','v'),
						Array('[гG]','g'),
						Array('[дD]','d'),
						Array('[еэE]','e'),
						Array('(ё)|(YE)','ye'),
						Array('(ж)|(ZH)','zh'),
						Array('[зZ]','z'),
						Array('[иI]','i'),
						Array('[йыY]','y'),
						Array('[кK]','k'),
						Array('[лL]','l'),
						Array('[мM]','m'),
						Array('[нN]','n'),
						Array('[оO]','o'),
						Array('[пP]','p'),
						Array('[рR]','r'),
						Array('[сS]','s'),
						Array('[тT]','t'),
						Array('[уU]','u'),
						Array('[фF]','f'),
						Array('(C)','c'),
						Array('(H)','h'),
						Array('(J)','j'),
						Array('(Q)','q'),
						Array('(W)','w'),
						Array('(X)','x'),
						Array('(х)|(KH)','kh'),
						Array('(ц)|(TS)','ts'),
						Array('(ч)|(CH)','ch'),
						Array('(ш)|(SH)','sh'),
						Array('(щ)|(SHCH)','shch'),
						Array('[ъь"\'\(\)]',''),
						Array('(ю)|(YU)','yu'),
						Array('(я)|(YA)','ya'),
						Array('[\-\\\/:\.,%^!;:?& ]','_'),
						Array('[_]{2,}','_'),
						Array('^_',''),
						Array('_$',''),
						Array('[«»]','')),
	getConvert: function(source,def) {
		if (source == '')
			return def;
		else {
			source = source.replace(/<\/?[^>]+>/gi, '');
			for (i=0; i<this.convertTable.length;i++)
				source = source.replace(new RegExp(this.convertTable[i][0], "ig"),this.convertTable[i][1]);
			return source;
		}
	},
	setCnvVal: function(cntObject, aliasID, outID, defaultVal) {
		if (cntObject && document.getElementById(aliasID) && document.getElementById(outID)) {
			var cnv = this.getConvert(cntObject.value,defaultVal);
			document.getElementById(aliasID).value = cnv;
			document.getElementById(outID).value = cnv;	
		} else {
			alert('[aliasConvert.setCnvVal] Ошибка: Передан несуществующий идентификатор!');	
		}
	},
	setCnvHiddenVal: function(cntObject, hiddenID) {
		if (cntObject && document.getElementById(hiddenID)) {
			var cnv = this.getConvert(cntObject.value, 0);
			document.getElementById(hiddenID).value = cnv;	
		} else {
			alert('[aliasConvert.setCnvVal] Ошибка: Передан несуществующий идентификатор!');	
		}
	}
}

// :: DESABLE BUTTON =================================================================================================

function clickDesable(buttonId) {
	buttonId.disabled=true;
	return false;
}

var cntHeight = {
	attath: function() {
		if (document.getElementById('content')) {
			var elem = document.getElementById('content');
			var elemParent = elem.parentNode;
			if (elemParent.offsetHeight>0) {
				elem.style.height = "1px";
				elem.style.height = elemParent.offsetHeight - 125 + "px";
			}
		}
	},
	init: function() {
		if (document.getElementById('content')) {
			if (window.addEventListener)
				window.addEventListener('resize', function () { cntHeight.attath() }, false);
			else
				window.attachEvent('onresize', function () { cntHeight.attath() });
			setTimeout("cntHeight.attath();", 500);
		}
	}
};

var cssFix = function() {
	var u = navigator.userAgent.toLowerCase(),
	addClass = function(el,val) {
		if(!el.className) {
			el.className = val;
		} else {
			var newCl = el.className;
			newCl+=(" "+val);
			el.className = newCl;
		}
	},
	is = function(t){return (u.indexOf(t)!=-1)};

	addClass(document.getElementsByTagName('html')[0],[
    	(!(/opera|webtv/i.test(u))&&/msie (\d)/.test(u))?('ie ie'+RegExp.$1)
      		:is('firefox/2')?'gecko ff2'
      		:is('firefox/3')?'gecko ff3'
      		:is('gecko/')?'gecko'

      		:is('opera/9')?'opera opera9':/opera (\d)/.test(u)?'opera opera'+RegExp.$1
      		:is('konqueror')?'konqueror'
      		:is('applewebkit/')?'webkit safari'
      		:is('mozilla/')?'gecko':'',
    	(is('x11')||is('linux'))?' linux'
      		:is('mac')?' mac'

      		:is('win')?' win':''
  	].join(" "));
}();

jQuery.fn.extend({ 
    disableSelection : function() { 
            this.each(function() { 
                    this.onselectstart = function() { return false; }; 
                    this.unselectable = "on"; 
                    jQuery(this).css('-moz-user-select', 'none'); 
            }); 
    },
    enableSelection : function() { 
            this.each(function() { 
                    this.onselectstart = function() {}; 
                    this.unselectable = "off"; 
                    jQuery(this).css('-moz-user-select', 'auto'); 
            }); 
    } 
});

new function($) {
  $.fn.setCursorPosition = function(pos) {
    if ($(this).get(0).setSelectionRange) {
      $(this).get(0).setSelectionRange(pos, pos);
    } else if ($(this).get(0).createTextRange) {
      var range = $(this).get(0).createTextRange();
      range.collapse(true);
      range.moveEnd('character', pos);
      range.moveStart('character', pos);
      range.select();
    }
  }
}(jQuery);