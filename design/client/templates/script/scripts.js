$(document).ready(function() {
	$(window).resize(function() {
	});
	miniGallery.init('\
		.catalog .column.right .column.left\
	');
	//filter.init();
	//selector.init();
	ordermarks.init();
	gui.init();
	//subselector.init();
	basket.init();
	basketcmd.init();
	banners.init();
	forms.init();
});
$(window).load(function() {
	gallery.init();
});

var test = {
	cnt:null,
	num:0,
	init:function() {
		var _this = this;
		this.cnt = $('.test')
			.css({
				"position":"absolute",
				"color":"#c00",
				"background":"#fff"
			});
		setInterval(function(){
			_this.count();
		},700)
	},
	count:function() {
		this.cnt.text(this.format((++this.num)/8))
	},
	format:function(val) {
		return (tmp = (new String(val)).split('.')).length>1?(tmp[0]+'.'+(tmp[1]+'0')[0]+(tmp[1]+'0')[1]):tmp[0]+'.―';
	}
}
/*var basket = {
	panels: {
		parent:null,
		head:null,
		body:null,
		init:function() {
			this.parent = parent;
			var tmp = null;
			this.head = (tmp = $(".header .basket"))[0] != null?tmp:null;
			this.body = (tmp = $(".content .basket"))[0] != null?tmp:null;
		},
		status:function() {
			if (!this.body)
				return false;
			else
				return true;
		}
	},
	content:{
		parent:null,
		items:null,
		value:0,
		init:function(parent) {
			this.parent = parent;
			request.send('/catalog/', 'getbasket', 'json', {}, this.parse);
		},
		parse:function(data, action) {
			if (data.empty != undefined) {
				alert(this.value);
			}
		}
	},
	init:function() {
		this.panels.init(this);
		if (this.panels.status()) {
			this.content.init(this);
		}
	}
}*/

var basketInfo = {
	info:new Array(),
	show:function() {
		var _this = this;
		var tmp = 0;
		var basket = $(".header .basket");
		var body = $("body");
		var width = body.outerWidth(true);
		if (this.info.length > 0) {
			var window = this.info[0];
			window.remove();
			clearTimeout(window.time);
		}
		var info = $('<div class="basket-add-info"><span class="arr"></span>\
			<div>'+$('.column.right h1').text()+'<br />добавлено в корзину</div>\
			<a href="/order/" class="button">Оформить заказ</a>\
		</div>').hide();
		this.info.push({
			target:info,
			time:0,
			remove:function() {
				_this.info.shift();
				this.target.fadeOut("fast", function() {
					$(this).remove();
				});
			},
			autoremove:function() {
				var _this = this;
				this.time = setTimeout(function() {
					_this.remove();
				},3000);
			}
		});
		body.append(info);
		var y = parseInt(basket.offset().top)+36;
		var x = parseInt(basket.offset().left)+Math.round(basket.outerWidth(true)/2)-Math.round(info.outerWidth(true)/2);
		var s = ((tmp = ((x+10+info.outerWidth(true))-width))>0)?tmp:0;
		info
			.css({
				"top":y+"px",
				"left":x-s+"px"
			})
			.fadeIn("fast", function() {
				_this.info[_this.info.length-1].autoremove();
			});
		gui.buttons();
	}
}
var basketEvents = {
	photo:null,
	onInit:function() {
	},
	onAdd:function() {
		var _this = this;
		var src = $(".mini-gallery.img-wrap img.show");
		if (src[0] != undefined) {
			this.photo = {
				src:src.clone(),
				pos:{
					top:src.offset().top+12,
					left:src.offset().left+12
				}
			}
		}
		if (this.photo != undefined) {
			var basket = $(".header .basket");
			this.photo.src.css({
				"display":"none",
				"position":"absolute",
				"z-index":"10000",
				"top":this.photo.pos.top,
				"left":this.photo.pos.left
			});
			$("body").append(this.photo.src);
			var self = this;
			setTimeout(function() {
				_this.photo.src.show();
				_this.photo.src.animate({
					"top":parseInt(basket.offset().top)+"px",
					"left":parseInt(basket.offset().left)+"px",
					"width":"20px",
					"height":"20px",
					"opacity":"0.1"
				},460, function() {
					$(this).remove();
					self.photo = undefined;
				});
			}, 100);
			setTimeout(function() {
				basketInfo.show();
			}, 600);
		} else
			basketInfo.show();
	},
	onPlus:function() {
		this.onAdd();
	},
	onRemove:function() {
	
	}
}

var basket = {
	count:0,
	products:null,
	basket:null,
	error:null,
	limited: {
		status: true,
		value: 50
	},
	panels: {
		parent:null,
		head:null,
		body:null,
		init:function() {
			this.parent = parent;
			var tmp = null;
			this.head = (tmp = $(".header .basket"))[0] != null?tmp:null;
			this.body = (tmp = $(".content .basket"))[0] != null?tmp:null;
		},
		status:function() {
			if (!this.body)
				return false;
			else
				return true;
		}
	},
	
	init:function() {
		var _this = this;
		this.panels.init(this);
		if (this.panels.status()) {
			this.products = this.panels.body.find(".products");
			this.count = Number(this.panels.body.find(">.count").text());
			this.products.find("tr[class^='item']").each(function(i) {
				$(this).find("td:first").find(".del").click(function() {
					_this.removefrom(_this.item.find($(this)));
				});
				$(this).find("td:first").find(".inc").click(function() {
					_this.incItem(_this.item.find($(this)));
				});
				$(this).find("td:first").find(".dec").click(function() {
					_this.decItem(_this.item.find($(this)));
				});
				_this.update_control($(this));
			});
			this.update();
			if (typeof(basketEvents.onInit) != 'undefined')
				basketEvents.onInit();
		}
	},
	
	clear:function() {
		var _this = this;
		this.products.find("tr").each(function() {
			_this.removefrom($(this));
		});
	},
	
	addto:function(id, title, group, article, price, max, count, photo, width, height) {
		var _this = this;
		var item = this.products.find(".item"+id);
		var element = undefined;
		if (item[0] != undefined) {
			var item_max = this.limited.status?max:this.limited.value;
			var last_count = Number(parseInt(item.find("span").text()));
			
			count = last_count+count>item_max?item_max-last_count:count;
			
			this.count += Number(count);
			var new_count = parseInt(last_count)+Number(count);
			var new_price = Number(price)*Number(new_count);
			item.find("span").text(new_count+"x");
			item.find(".basket-price span").text(new_price);
			
			this.request("basketadd",{"id":id, "count":count});
			if (typeof(basketEvents.onPlus) != 'undefined' && count>0)
				basketEvents.onPlus();
		} else {
			this.count += Number(count);
			element = $("	<tr class=\"item"+id+"\">\
								<td>\
									<div class=\"photo\">\
										<img src=\""+photo+"\" width=\""+width+"\" height=\""+height+"\" alt=\""+title+"\" />\
									</div>\
									<div class=\"mod del\"><!-- --></div>\
									<div class=\"mod dec button-count disable\"><!-- --></div>\
									<div class=\"mod inc button-count disable\"><!-- --></div>\
									<div class=\"end-float\"><!-- --></div>\
									<div class=\"data\">\
										<span>"+count+"x</span> <a href=\"/catalog/"+group+"/"+article+"/\">"+title+"</a>\
									</div>\
								</td>\
								<td class=\"basket-price\"><span>"+(Number(price)*Number(count))+"</span> р</td>\
							</tr>")
			this.item.setHash(element, {
				id:Number(id),
				max:Number(max),
				count:Number(count),
				price:Number(price)
			});
			element.hide();
			this.products.append(element);
			var max_height = parseInt(this.products.parent().css("max-height"));
			var height = this.products.height()+element.height()>max_height?max_height:this.products.height()+element.height();
			this.products.parent().animate({
				"height":height+'px'
			}, 250, function() {
				$(this).css("height","auto");
				element.fadeIn(300);
			});
			element.find(".del").click(function() {
				_this.removefrom(_this.item.find($(this)));
			});
			element.find(".inc").click(function() {
				_this.incItem(_this.item.find($(this)));
			});
			element.find(".dec").click(function() {
				_this.decItem(_this.item.find($(this)));
			});
			this.request("basketadd",{"id":id, "count":count});
			if (typeof(basketEvents.onAdd) != 'undefined')
				basketEvents.onAdd();
		}
		this.update(element);
	},
	
	removefrom:function(item) {
		var param = this.item.getHash(item);
		this.request("basketdel",{"id":param.id});
		this.count -= param.count;
		
		if (this.count > 0) {
			item.addClass('removed');
			item.fadeTo(300, 0.01, function() {
				$(this)
					.css({"height":$(this).height()+'px'})
					.empty()
					.animate({
						"height":0
					},250, function() {
						$(this).remove();
					}
				);
			});
		} else {
			item.remove();
			var location = new String(document.location.href).replace(/http:\/\/[^\/]*/,'');
			if (location.match(/^\/order\//) && this.count==0)
				document.location.reload();
		}
		this.update(item);
		if (typeof(basketEvents.onRemove) != 'undefined')
			basketEvents.onRemove();
	},
	
	incItem:function(item) {
		var param = this.item.getHash(item);
		if (param.count+1<=(this.limited.status?param.max:this.limited.value)) {
			this.request("basketadd",{"id":param.id, "count":1});
			param.count++;
			this.count++;
			this.item.setHash(item,param);
			this.update(item);
		}
	},
	
	decItem:function(item) {
		var param = this.item.getHash(item);
		if (param.count-1 > 0) {
			this.request("basketadd",{"id":param.id, "count":-1});
			param.count--;
			this.count--;
			this.item.setHash(item,param);
			this.update(item);
		}
	},
	
	request:function(method, data) {
		var _this = this;
		var location = new String(self.location).replace(/http\:\/\/([^\/]*).*/ig,'http://$1/catalog/');
		$.ajax({
			type: "POST",
			url: location+":axah=out&action="+method,
			data: data,
			dataType: "html",
			success: function(data) {
				if (method == "order")
					_this.panels.body.openform($(data));
				else
				if (method == "confirmorder") {
					_this.panels.body.showresponce($(data));
				}
			},
			error: function() {
				//alert("error");
			}
		});
	},
	
	update:function(item) {
		var _this = this;
		this.panels.body
		
		if (this.count > 0) {
			if (this.panels.body.find(".result").hasClass("hidden"))
				this.panels.body.find(".result").removeClass("hidden");
			if (this.panels.body.find(".order").hasClass("hidden"))
				this.panels.body.find(".order").removeClass("hidden");
		} else {
			if (!this.panels.body.find(".result").hasClass("hidden"))
				this.panels.body.find(".result").addClass("hidden");
			if (!this.panels.body.find(".order").hasClass("hidden"))
				this.panels.body.find(".order").addClass("hidden");
		}
		var price = 0;
		this.products.find("tr[class^='item']").each(function() {
			if (!$(this).hasClass('removed')) {
				var param = _this.item.getHash($(this));
				price += param.result;
				$(this).find(".price").text(_this.format(param.result, '―'));
				$(this).find(".count").text(param.count);
			}
		});
		this.panels.body.find(".result").find("span.price").text(this.format(price)+" руб");
		this.panels.body.find(".sell").find("span").text(this.sell_val(price)+" %");
		this.panels.body.find(".total-result").find("span").text(this.format(this.sell_price(price))+" руб");
		
		this.panels.body.find(">.count").text(this.count);
		if (this.panels.head) {
			if (this.count>0 && this.panels.head.hasClass('empty'))
				this.panels.head.removeClass('empty')
			else
			if (this.count==0 && !this.panels.head.hasClass('empty'))
				this.panels.head.addClass('empty')
			this.panels.head.find(".price").text(this.format(price));
			this.panels.head.find(".count").text(this.count);
		}
		this.panels.body.find(".info").text((this.count == 0?"Ваша корзина пуста":"В корзине "+this.count+" "+this.ends(this.count)+":"));
		if (this.count == 0 && this.panels.body.find(".info").hasClass('hide'))
			this.panels.body.find(".info").removeClass('hide');
		else
		if (this.count > 0 && !this.panels.body.find(".info").hasClass('hide')) 
			this.panels.body.find(".info").addClass('hide');
		
		if (this.count>0 || item!=undefined)
			cookie.save({
				"basket_count":this.count,
				"basket_price":this.format(price)
			});
		
		var sell_panel = $(".basket .roller");
		if (this.sell_val(price)>0 && !sell_panel.hasClass('opened')) {
			sell_panel.slideDown('fast');
			sell_panel.addClass('opened');
		} else
		if (this.sell_val(price)==0 && sell_panel.hasClass('opened')) {
			sell_panel.slideUp('fast');
			sell_panel.removeClass('opened');
		}
		
		if (item!=undefined)
			this.update_control(item);
	},
	
	update_control:function(item) {
		var param = this.item.getHash(item);
		if (item != undefined) {
			var btn_inc = item.find(".mod.inc");
			var btn_dec = item.find(".mod.dec");
			if (this.limited.status) {
				if (param.count > 1 && btn_dec.hasClass('disable')) {
					btn_dec.removeClass('disable');
					btn_dec.fadeTo('fast', 1);
				} else
				if (param.count == 1 && !btn_dec.hasClass('disable')) {
					btn_dec.addClass('disable');
					btn_dec.fadeTo('fast', 0.2);
				}
				
				if (param.count < param.max && btn_inc.hasClass('disable')) {
					btn_inc.removeClass('disable');
					btn_inc.fadeTo('fast', 1);
				}
				else
				if (param.count == param.max && !btn_inc.hasClass('disable')) {
					btn_inc.addClass('disable');
					btn_inc.fadeTo('fast', 0.2);
				}
			} else {
				btn_dec.removeClass('disable');
				btn_dec.fadeTo('fast', 1);
				btn_inc.removeClass('disable');
				btn_inc.fadeTo('fast', 1);
			}
		}
	},
	
	item: {
		getHash: function(item) {
			var result = $.base64.decode(item.attr('hash')).split('-');
			return {
				id: Number(result[0]),
				max: Number(result[1]),
				count: Number(result[2]),
				price: Number(result[3]),
				result: Number(result[4])
			}
		},
		setHash: function(item, param) {
			var result = $.base64.encode(param.id+'-'+param.max+'-'+param.count+'-'+param.price+'-'+(param.count*param.price));
			item.attr('hash',result);
		},
		find: function(point) {
			var target = point;
			while (target[0] != undefined) {
				if (target.attr('class') && target.attr('class').match(/^item.*/))
					break;
				target = target.parent();
			}
			return target;
		}
	},
	
	format:function(val, zero) {
		zero = (zero == undefined)?'':('.'+zero);
		function decs(val) {
			return (new String(val)).split("").reverse().join("").replace(/([0-9]{3})/g,'$1 ').split("").reverse().join("");
		}
		val = (tmp = (new String(val)).split('.')).length>1?(decs(tmp[0])+'.'+(tmp[1]+'0')[0]+(tmp[1]+'0')[1]):decs(tmp[0])+zero;
		return val;
	},
	
	sell_val:function(price) {
		if (price > 5000000)
			return 20;
		else
		if (price > 1500000)
			return 15;
		else
		if (price > 1000000)
			return 10;
		else
		if (price > 500000)
			return 5;
		return 0;
	},
	
	sell_price:function(price) {
		return Math.floor(Math.floor(price-(price*(this.sell_val(price)/100)))/10)*10;
	},
	
	ends:function(count) {
		return ((count-11)%100==0 || (count-12)%100==0 || (count-13)%100==0 || (count-14)%100==0)?'товаров':((count%10==1?'товар':(count%10>=2 && count%10<=4?'товара':'товаров')))
	}
}

var basketcmd = {
	id: 0,
	title: null,
	group: null,
	article: null,
	price: 0,
	max: 0,
	value: 0,
	photo: null,
	width: 0,
	height: 0,
	loaded: false,
	field: null,
	interval: null,
	timeout: null,
	panel: null,
	control: true,
	
	btn_inc: null,
	btn_dec: null,
	
	init:function() {
		if ($(".addbasket-panel")[0] != undefined) {
			this.panel = $(".addbasket-panel");
			this.field = this.panel.find(".input");
			this.btn_inc = this.panel.find(".inc");
			this.btn_dec = this.panel.find(".dec");
			
			this.value = parseInt(this.field.text());
			this.id = $.base64.decode(this.panel.attr("rev"));

			this.panel.attr("rev",'');
			this.request(this.id);
			this.btn_inc.mousedown(basketcmd.inc_value);
			this.btn_inc.mouseup(basketcmd.stop);
			this.btn_dec.mousedown(basketcmd.dec_value);
			this.btn_dec.mouseup(basketcmd.stop);
			
			this.panel.find(".add").click(function() {
				if (basketcmd.loaded && basketcmd.value>0)
					basket.addto(basketcmd.id, basketcmd.article, basketcmd.group, basketcmd.article, basketcmd.price, basketcmd.max, basketcmd.value, basketcmd.photo, basketcmd.width, basketcmd.height);
			});
			
			this.update();
		}
	},
	
	inc_value:function() {
		basketcmd.inc_ex();
		basketcmd.timeout = setTimeout(function() {
			basketcmd.interval = setInterval(function() {
				basketcmd.inc_ex();
			},100);
		},500);
	},
	
	dec_value:function() {
		basketcmd.dec_ex();
		basketcmd.timeout = setTimeout(function() {
			basketcmd.interval = setInterval(function() {
				basketcmd.dec_ex();
			},100);
		},500);
	},
	
	inc_ex:function() {
		if (this.value+1 <= (this.control?this.max:50))
			this.value++;
		this.update();
	},
	
	dec_ex:function() {
		if (basketcmd.value-1 >= 1)
			basketcmd.value--;
		this.update();
	},
	
	stop:function() {
		clearTimeout(basketcmd.timeout);
		clearInterval(basketcmd.interval);
	},
	
	request:function(id) {
		var location = new String(self.location).replace(/http\:\/\/([^\:]*)\/\:.*/ig,'http://$1/');
		this.pajax = $.ajax({
			type: "POST",
			url: location+":axah=noout&action=getproduce",
			data:{id:id},
			dataType: "xml",
			success: function(responce) {
				basketcmd.title = $(responce).find('title').text();
				basketcmd.group = $(responce).find('group').text();
				basketcmd.article = $(responce).find('article').text();
				basketcmd.price = $(responce).find('price').text();
				basketcmd.max = $(responce).find('count').text();
				basketcmd.photo = $(responce).find('photo').text();
				basketcmd.width = $(responce).find('width').text();
				basketcmd.height = $(responce).find('height').text();
				//basketcmd.panel.find(".add").fadeTo('fast', 1).css({'cursor':'pointer'});
				basketcmd.panel.find(".add").css({'cursor':'pointer'});
				basketcmd.loaded = true;
				basketcmd.update();
			},
			error: function() {
			}
		});
	},
	
	update:function() {
		if (this.value > 0)
			this.panel.find(".add").fadeTo('fast', 1);
		else
			this.panel.find(".add").fadeTo('fast', 0.2);
		
		if (this.control) {
			if (this.value > 1 && this.btn_dec.hasClass('disable')) {
				this.btn_dec.removeClass('disable');
				this.btn_dec.fadeTo('fast', 1);
			} else
			if (this.value == 1 && !this.btn_dec.hasClass('disable')) {
				this.btn_dec.addClass('disable');
				this.btn_dec.fadeTo('fast', 0.2);
			}
			
			if (this.value < this.max && this.btn_inc.hasClass('disable')) {
				this.btn_inc.removeClass('disable');
				this.btn_inc.fadeTo('fast', 1);
			}
			else
			if (this.value == this.max && !this.btn_inc.hasClass('disable')) {
				this.btn_inc.addClass('disable');
				this.btn_inc.fadeTo('fast', 0.2);
			}
		} else {
			this.btn_dec.removeClass('disable');
			this.btn_dec.fadeTo('fast', 1);
			this.btn_inc.removeClass('disable');
			this.btn_inc.fadeTo('fast', 1);
		}
		
		this.field.text(this.value);
	}
}

var ordermarks = {
	contaner:null,
	tabs:null,
	page:null,
	contr:null,
	callback:undefined,
	event:{
		nextProcess:null,
		backProcess:null,
		nextQuery:function() {
			return (this.nextProcess == undefined)?true:this.nextProcess();
		},
		backQuery:function() {
			return (this.backProcess == undefined)?true:this.backProcess();
		},
		onNextQuery:function(func) {
			this.nextProcess = func;
		},
		onBackQuery:function(func) {
			this.backProcess = func;
		}
	},
	init:function(callback) {
		this.contaner = $('.order-marks');
		if (this.contaner.length > 0) {
			this.callback = callback;
			this.contaner
				.removeClass('order-marks')
				.wrap('<div class="order-marks" />')
				.addClass('order-pages');
			this.buildMarks();
			this.buildContr();
			this.open(0);
		}
	},
	buildMarks:function() {
		var _this = this;
		this.tabs = $('<div class="order-marks-tabs"></div>');
		var itemwidth = Math.ceil((this.contaner.width()-2)/3);
		this.page = this.contaner.find('>div[class^=item]').each(function(i) {
			_this.tabs.append(
				$('<div'+(i==0?' class="first"':'')+' style="width:'+itemwidth+'px"><samp style="width:'+(itemwidth+2)+'px"></samp>'+$(this).attr('title')+'</div>')
			);
			$(this)
				.addClass('page')
				.removeAttr('title');
		});
		this.tabs.append('<span />');
		this.contaner.before(this.tabs);
		this.tabs = this.tabs.find('>div');
	},
	buildContr:function() {
		var _this = this;
		this.contr = {
			back:$('<div class="button skin2 back">Назад</div>'),
			next:$('<div class="button skin2 next">Далее</div>')
		}
		this.contaner.after(
			$('<div class="order-control" />')
				.append(this.contr.back)
				.append(this.contr.next)
				.append('<div class="clear" />')
		);
		this.contr.back.click(function() {
			if(_this.event.backQuery()) {
				var index = _this.tabs.parent().find('.select').index();
				if (index>0)
					_this.open(index-1);
			}
		})
		this.contr.next.click(function() {
			if(_this.event.nextQuery()) {
				var index = _this.tabs.parent().find('.select').index();
				if (index<_this.tabs.length-1)
					_this.open(index+1);
			}
		})
	},
	open:function(page) {
		this.tabs
			.next().removeClass('preselect').prev()
			.removeClass('select')
			.eq(page)
			.addClass('select')
			.next().addClass('preselect');
		this.page
			.removeClass('select')
			.eq(page)
			.addClass('select');
		if (page==0 && !this.contr.back.hasClass('hide'))
			this.contr.back.addClass('hide');
		else
		if (page>0 && this.contr.back.hasClass('hide'))
			this.contr.back.removeClass('hide');
		if (page==this.page.length-1 && !this.contr.next.hasClass('hide'))
			this.contr.next.addClass('hide');
		else
		if (page<this.page.length-1 && this.contr.next.hasClass('hide'))
			this.contr.next.removeClass('hide');
		if (this.callback != undefined)
			this.callback();
	},
	getTabIndex:function() {
		return this.page.parent().find('.select').index();
	}
}

var filter = {
	pajax:null,
	hash:0,
	datatry:0,
	updateCallBack:null,
	
	init:function(updateCallBack) {
		var catalog = $('.catalog-contaner');
		if (catalog[0] != undefined) {
			if (updateCallBack != undefined)
				this.updateCallBack = updateCallBack;
			this.range.init();
			this.checkcontrol.init();
			this.selection.init();
			$('.catalog-contaner')
				.css('min-height','500px')
				.empty();
			filter.update();
		}
	},
	selection: {
		block:null,
		input:null,
		init:function() {
			var def = decodeURIComponent(new String(self.location)).replace(/http\:\/\/.*#.*select\[(.*)\].*$/ig,'$1').replace(/[\-]/ig, ' ').split(/;/);
			var val = new Object();
			for (key in def) {
				var coupla = def[key].split(/=/);
				val[coupla[0]] = coupla[1];
			}
			
			var isupdate = false;
			
			this.block = $(".filter .block");
			this.input = this.block.find('select');
			if (this.input[0] != undefined) {
				this.input.each(function() {
					$(this).change(function() {
						filter.update();
					});
					var type = jQuery.trim($(this).parent().attr("class").replace(/block/,'').replace(/first-child/,''));
					if (val[type] != undefined) {
						var items = $(this).children();
						items.each(function() {
							//alert($(this).text().replace(/[ ]/, '_')+" <> "+val[type]);
							if (new String($(this).text().replace(/[ ]/ig, '_')).toLowerCase() == new String(val[type]).toLowerCase()) {
								items.attr("selected","");
								$(this).attr("selected","selected");
								isupdate = true;
							}
						})
					}
				});
				if (isupdate)
					filter.update();
			}
		},
		getData:function() {
			var tmp = '[';
			for (var i=0; i<this.block.length; i++)
				tmp+='{"name":"'+jQuery.trim(this.block.eq(i).attr("class").replace(/block/,'').replace(/first-child/,''))+'","value":"'+$.base64.encode(encodeURIComponent(this.block.eq(i).find('select').val()))+(i<this.block.length-1?'"},':'"}]');
			return ['selection',tmp];
		}
	},
	checkcontrol: {
		block:new Array(),
		
		init:function() {
			if ($(".filter .check")[0] != undefined) {
				$(".filter .check").each(function(i) {
					var block_name = $(this).attr("class").replace(/(check|block)/ig,'').trim();
					var block_props = $(this).find("div");
					$(this).find("div").click(function() {
						filter.checkcontrol.check($(this));
					});
					filter.checkcontrol.block.push({"name":block_name,
													"props":block_props});
				});
			}
		},
		check:function(obj) {
			if (obj.hasClass('checked'))
				obj.removeClass('checked');
			else
				obj.addClass('checked');
				
			filter.update();
		},
		getData:function() {
			var data = '';
			for (var i=0; i<this.block.length; i++) {
				data += this.block[i].name;
				for (var j=0; j<this.block[i].props.length; j++) {
					var obj = this.block[i].props.eq(j);
					if (obj.hasClass('checked')) {
						data += '-['+obj.text()+']';
					}
				}
				if (i<this.block.length-1)
					data += ';';
			}
			return ['checkcontrol',data];
		}
	},
	range: {
		value: {"min":0, "max":0},
		
		contaner:null,
		line:null,
		min:null,
		max:null,
		price:null,
		x: 0,
		lx: 0,
		restric: {"min":4, "max":238},
		input: {"min":null, "max":null},
		updatekey: false,
		init:function() {
			if (typeof($(".filter .range")) != "undefined") {
				this.contaner = $(".filter .range");
				this.line = this.contaner.find(".line");
				this.min = this.contaner.find(".control-min");
				this.max = this.contaner.find(".control-max");
				this.price = {"min":Number(this.contaner.find(".price-step:first").text()),
							  "max":Number(this.contaner.find(".price-step:last").text())};
				
				this.input.min = this.contaner.find('.min').find('input');
				this.input.max = this.contaner.find('.max').find('input');
				
				this.value.min = parseInt(this.input.min.val());
				this.value.max = parseInt(this.input.max.val());
			
				this.min.mousedown(function(e) {
					$('body *').disableSelection();
					filter.range.x = e.pageX-parseInt($(this).css("left"));
					$(document).mousemove(function(e) {
						filter.range.change(filter.range.min, e.pageX-filter.range.x);
					});
					$(document).mouseup(function() {
						$(this).unbind('mousemove');
						$(this).unbind('mouseup');
						$('body *').enableSelection();
						filter.range.onChange();
					});
				});
				this.max.mousedown(function(e) {
					$('body *').disableSelection();
					filter.range.x = e.pageX-parseInt($(this).css("left"));
					$(document).mousemove(function(e) {
						filter.range.change(filter.range.max, e.pageX-filter.range.x);
					});
					$(document).mouseup(function() {
						$(this).unbind('mousemove');
						$(this).unbind('mouseup');
						$('body *').enableSelection();
						filter.range.onChange();
					});
				});
				this.input.min.keypress(function(e) {
					if (e.which!=13 && e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
						return false;
					else
						filter.range.updatekey = true;
				});
				this.input.max.keypress(function(e) {
					if (e.which!=13 && e.which!=8 && e.which!=0 && (e.which<48 || e.which>57))
						return false;
					else
						filter.range.updatekey = true;
				});
				this.input.min.keyup(function() {
					if (filter.range.updatekey) {
						filter.range.updatekey = false;
						filter.range.inputchange($(this), $(this).val());
						filter.range.onChange();
					}
				});
				this.input.max.keyup(function() {
					if (filter.range.updatekey) {
						filter.range.updatekey = false;
						filter.range.inputchange($(this), $(this).val());
						filter.range.onChange();
					}
				});
				var self = this;
				setTimeout(function() {
					self.inputchange(self.input.min, parseInt(self.input.min.val()));
					self.inputchange(self.input.max, parseInt(self.input.max.val()));
				}, 100);
			}
		},
		inputchange:function(obj, val) {
			var type = new String(obj.parent().attr("class")).replace(/(.*-)/i,'');
			val = val<this.price.min?this.price.min:(val>this.price.max?this.price.max:val);
			if (type == 'min')
				val = Number(Number(val) > Number(this.value.max)?this.value.max:val);
			else
				val = Number(Number(val) < Number(this.value.min)?this.value.min:val);
			result = Math.round((val-this.price.min)/(this.price.max-this.price.min)*(this.restric.max-this.restric.min)+this.restric.min);
			if (type == 'min')
				this.min.css({"left":(result-8)+"px"});
			else
				this.max.css({"left":result+"px"});
			this.lineUpdate();
		},
		change:function(obj, x) {
			var type = obj.attr("class").replace(/(.*-)/i,'');
			var point = new Array();
			if (type == 'min') {
				var min = this.restric.min - (parseInt(obj.css("width"))-1);
				var max = parseInt(this.max.css("left")) - (parseInt(obj.css("width"))-1);
				if (x >= min && x <= max) {
					obj.css({"left":x+"px"});
				} else {
					if (x < min)
						obj.css({"left":min+"px"});
					else
						obj.css({"left":max+"px"});
				}
				point[type] = parseInt(this.min.css("left")) + (parseInt(obj.css("width"))-1);
			} else {
				var min = parseInt(this.min.css("left"))+(parseInt(obj.css("width"))-1);
				var max = this.restric.max;
				if (x >= min && x <= max) {
					obj.css({"left":x+"px"});
				} else {
					if (x < min)
						obj.css({"left":min+"px"});
					else
						obj.css({"left":max+"px"});
				}
				point[type] = parseInt(this.max.css("left"));
			}
			this.lineUpdate();
			var percent = Number((point[type]-this.restric.min)/(this.restric.max-this.restric.min));
			var result = Math.round(Number((this.price.max-this.price.min)*percent+this.price.min)/100)*100;
			this.contaner.find('.'+type).find('input').val(result);
		},
		lineUpdate:function() {
			var lineLeftPoint = parseInt(this.min.css("left")) + (parseInt(this.min.css("width"))-1);
			var lineRighPoint = parseInt(this.max.css("left"));
			this.line.css({
				"left":(lineLeftPoint)+"px",
				"width":(lineRighPoint-lineLeftPoint)+"px"
			});
		},
		onChange:function() {
			this.value.min = parseInt(this.contaner.find('.min').find('input').val());
			this.value.max = parseInt(this.contaner.find('.max').find('input').val());
			filter.update();
		},
		getData:function() {
			return ['pricescroll',this.value.min+'-'+this.value.max];
		}
	},
	pages:{
		page:0,
		init:function() {
			if ($(".pages")[0] != undefined) {
				$(".pages a").each(function() {
					$(this).click(function() {
						var page = $(this).attr("rev");
						filter.pages.page = page;
						filter.update();
					});
				});
			}
		},
		getData:function() {
			return ['pages',this.page];
		}		
	},
	setUpdateCallBack:function(updateCallBack) {
		if (updateCallBack != undefined)
			this.updateCallBack = updateCallBack;
	},
	update:function() {
		var _this = this;
		var query = {
			'pg':filter.pages.getData()[1],
			'checkcontrol':filter.checkcontrol.getData()[1],
			'pricescroll':filter.range.getData()[1],
			'selection':filter.selection.getData()[1]
		};
		if (this.pajax != null) {
			this.pajax.abort();
			this.pajax = null;
			this.request(query);
		} else {
			$('.catalog-contaner')
				.append('<div class="loading" style="width:'+($('.catalog-contaner').width())+'px; height:'+($('.catalog-contaner').height()+5)+'px;"><!-- --></div>')
				.animate({
					"opacity": 0.5
				},200, function() {
					_this.request(query);
				});
		}
	},
	request:function(data) {
		var _this = this;
		var location = new String(self.location).replace(/http\:\/\/([^\:]*)\/.*/ig,'http://$1/');
		if (this.pajax)
			this.pajax.abort();
		this.hash = Math.round(Math.random()*10000);
		data.hash = this.hash;
		this.pajax = $.ajax({
			type: "POST",
			url: location+":axah=out&action=filterupdate",
			data: data,
			dataType: "html",
			success: function(responce) {
				_this.datatry = 0;
				if (_this.pajax != null) {
					responce = $(responce);
					if (responce[0].tagName.match(/responce/i)) {
						//alert(_this.hash+' '+responce.attr('hash'));
						var produce = responce.find("produce");
						var control = responce.find("control");
						var pagenation = responce.find("pagenation");
						control.find('>*').each(function(){
							$('.filter .controls .'+(new String($(this)[0].tagName).toLowerCase())+' .selector').empty().append($(this).html());
						})
						control.remove();
						$('.catalog-contaner')
							.empty()
							.append(produce.html())
							.animate({
								"opacity": 1
							},200);
						produce.remove();
						$('.pagenation').empty().append(pagenation.html());
						pagenation.remove();
						_this.pages.init();
						_this.pages.page=0;
						_this.pajax = null;
						//_this.selection.init();
						if (_this.updateCallBack != null)
							_this.updateCallBack();
					} else {
						if (_this.datatry<5) {
							_this.datatry++;
							setTimeout(function(_this, data) {
								_this.request(data);
							}, 1000, _this, data);
						}
					}
				}
			},
			error: function() {
				if (_this.datatry<5) {
					_this.datatry++;
					setTimeout(function(_this, data) {
						_this.request(data);
					}, 1000, _this, data);
				}
			}
		})
	}
}

/*var pages = {
	init:function() {
		setTimeout(function(){
			var items = $(".pages>*");
			var center = 0;
			for (var i=0; i<items.length; i++) {
				center+=items.eq(i).width()+4;
			}
			$(".pages").width(center);
			$(".pages").fadeTo("fast",1);
		},50);
	}
}*/

var selector = {
	init:function() {
		var select = $('select.selector');
		for (var i=0; i<select.length; i++) {
			var obj = select.eq(i);
			var selector = $('<div class="selector"/>');
			obj.after(selector);
			var option = obj.find('option');
			if (option.length<=9)
				selector.addClass('noscroll');
			for (var o=0; o<option.length; o++) {
				var element = option.eq(o);
				var block = $('<div num="'+o+'" vid="'+element.attr('value')+'" href="javascript:void(0)"'+(element.attr('visible')!=undefined && element.attr('visible')=='false'?' class="hide"':'')+'>'+element.text()+'</div>');
				block.click(function() {
					var dat = $(this).parent().parent().attr('class').replace('block ','');
					var sel = $(this).parent().find('>div.select').attr('num');
					var num = $(this).attr('num');
					if (num != sel) {
						$(this).parent().prev().find('option').eq(num).attr('selected','selected').change();
						$(this).parent().find('>div').removeClass('select');
						$(this).addClass('select');
						var subs = $('.filter .subselector[parent='+dat+']');
						for (var ui=0; ui<subs.length; ui++)
							subs.find('option:first').attr('selected','selected').change();
						$(this).find('.subblock .select').removeClass('select');
						//window.location.hash="select["+dat+"="+$(this).find('>span:first').text().replace(/[ ]/ig, '_').toLowerCase()+"]";
					}
				});
				selector.append(block);
				if (element.attr('selected')) {
					block.addClass('select');
				}
			}
		}
		this.update();
	},
	update:function() {
		$('div.selector').each(function() {
			var elem = $(this).find('div');
			var pos = 0;
			for (var i=1; i<elem.length; i++)
				if (elem.eq(i).hasClass('select')) {
					pos = i*15+'px';
					break;
				}
			$(this).scrollTo(pos,0);
		});
	}
}
var subselector = {
	init:function() {
		var subselect = $('select.subselector');
		for (var i=0; i<subselect.length; i++) {
			var obj = subselect.eq(i);
			var parent_items = $('.'+obj.attr('parent')+' div.selector>div');
			for (var u=0; u<parent_items.length; u++) {
				var parent_item = parent_items.eq(u);
				var option = obj.find('option[parid='+parent_item.attr('vid')+']');
				if (option.length > 0) {
					var contaner = $('<div class="subblock" target="'+obj.parent().attr('class').replace('block ','')+'" />');
					for (var ui=0; ui<option.length; ui++) {
						var element = option.eq(ui);
						var block = $('<a num="'+ui+'" vid="'+element.attr('value')+'" href="javascript:void(0)">'+element.text()+'</a>');
						block.click(function() {
							var sel = $(this).parent().find('>a.select').attr('num');
							var num = $(this).attr('num');
							if (num != sel) {
								$('.filter .'+$(this).parent().attr('target')+' .subselector').find('option[parid='+$(this).parent().parent().attr('vid')+']').eq(num).attr('selected','selected').change();
								$(this).parent().find('>a').removeClass('select');
								$(this).addClass('select');
								//window.location.hash="select[type_id="+$(this).find('>span:first').text().replace(/[ ]/ig, '_').toLowerCase()+"]";*/
							}
						})
						contaner.append(block);
						if (element.attr('selected')) {
							block.addClass('select');
						}
					}
					parent_item.append(contaner);
				}
			}
		}
	}
}

var gui = {
	init:function() {
		this.images();
		this.heads();
		this.menu();
		this.background();
		this.textgreat();
		this.buttons();
		this.titles();
		this.letteral("\
			.blog .blog_item .column.right,\
			.about .column.right,\
			.catalog.card .column.right .descript\
		");
		this.order();
	},
	images:function() {
		$(".about .column.right img,\
		   .blog .column.right img,\
		   .catalog .column.right .column.left img,\
		   .content .contaner .column p iframe").each(function() {
			if (!$(this).parent().hasClass('mc-comment-author')) {
				if (!$(this).parent().hasClass('mini-gallery')) {
					var mod = (new String($(this)[0].tagName).toLowerCase());
					$(this).wrap('<div class="img-wrap" />');
					if (mod != 'iframe') {
						$(this)
							.parent()
							.append('<span class="egle left top" />')
							.append('<span class="egle left bottom" />')
							.append('<span class="egle right top" />')
							.append('<span class="egle right bottom" />');
					}
					$('<div class="img-wrap-end" />').insertAfter($(this).parent());
					$('<div class="img-wrap-start" />').insertBefore($(this).parent());
				} else {
					if (!$(this).parent().hasClass('img-wrap')) {
						$(this).parent()
							.addClass('img-wrap')
							.append('<span class="egle left top" />')
							.append('<span class="egle left bottom" />')
							.append('<span class="egle right top" />')
							.append('<span class="egle right bottom" />')
					}
				}
			}
		})
	},
	heads:function() {
		$("*>h1:first, *>h2:first").addClass("first-child");
	},
	menu:function() {
		var main = $('.menu,.submenu,.type_id div.selector');
		if (main.length > 0) {
			main.each(function() {
				$(this).find('>a,>div').each(function() {
					var text = $(this).text();
					if (text != '') {
						$(this)
							.empty()
							.append('<span>'+text+'</span>'+(($.browser.msie && $.browser.version<10)?'<span class="shadow">'+text+'</span>':''));
					}
				})
			})
		}
	},
	background:function() {
		$(window).resize(function() {
			resize();
		});
		resize();
		function resize() {
			var tmp;
			var max = {
				'w': 1500,
				'p': 1280
			}
			var min = {
				'w': 1000,
				'p': 980
			}
			var body = $('body').width();
			var contaner = $('body > .contaner, body > .footer');
			if (contaner[0] != undefined) {
				var percent = ((tmp = (body - min.w)/(max.w - min.w))>1?1:(tmp<0?0:tmp))
				var width = min.p+Math.round((tmp=max.p-min.p)*percent);
				contaner.css({
					"max-width":width+'px'
				})
			}
		}
	},
	textgreat:function() {
		$('.text-great').each(function() {
			$(this)
				.wrapInner('<span class="text" />')
				.prepend('<span class="line top" />')
				.append('<span class="line bottom" />');
		});
	},
	buttons:function() {
		$('input:submit[gui!="init"]').each(function() {
			$(this)
				.css('display','none')
				.attr('gui','init')
				.after('<div class="button">'+$(this).attr('value')+'</div>')
				.next()
				.click(function() {
					$(this).parent().prev().click();
				});
		});
		$('.button[gui!="init"]')
			.wrap('<div class="btnContaner" /> ')
			.wrapInner('<span />');
		$('.button[gui!="init"],.button-count[gui!="init"]')
			.attr('gui','init')
			.mouseenter(function() {
				$(this).addClass('mouseover');
			})
			.mouseleave(function() {
				$(this)
					.removeClass('mouseover')
					.removeClass('mousedown');
			})
			.mousedown(function() {
				$(this).addClass('mousedown');
			})
			.mouseup(function() {
				$(this).removeClass('mousedown');
			})
	},
	titles:function() {
		var template = '<div class="title-info-window"><div>[TEXT]</div><sapm class="clear"></sapm><span></span></div>';
		var window = null;
		var items = $('span[title]');
		if (items.length>0) {
			items
				.addClass('title-info')
				.mouseenter(function() {
					var target = $(this);
					$(this).addClass('mouseover');
					window = $(template.replace(/\[TEXT\]/,$(this).attr('desc')));
					$('body').append(window);
					var y = parseInt(target.offset().top)-window.outerHeight(true);
					var x =parseInt(target.offset().left)+Math.round(target.outerWidth(true)/2)-Math.round(window.outerWidth(true)/2);
					window
						.css({
							"top":y-20+"px",
							"left":x+"px",
							"opacity":0
						})
						.animate({
							"top":y-10+"px",
							"left":x+"px",
							"opacity":1
						}, "fast");
				})
				.mouseleave(function() {
					$(this).removeClass('mouseover');
					window.fadeOut("fast", function() {
						$(this).remove();
					})
				})
				.each(function() {
					$(this)
						.attr('desc', $(this).attr('title'))
						.removeAttr('title')
				});
		}
	},
	letteral:function(objects) {
		var contaner = $(objects);
		contaner.each(function() {
			var p = $(this).find('p:first');
			while (p[0] != undefined) {
				if (p.text().length>0)
					break;
				else
					p = p.next('p[class!="tags-list"]');
			}
			if (p[0] != undefined && !p.hasClass('no-letters') && p.text().length>0) {
				var word = p.text().split(' ')[0];
				var word_c = word.replace(/^(.).*/,'$1');
				var word_b = word.replace(/^.(.*)/,'$1');
				p.html(p.html().replace((new RegExp('^(.{0,40})'+word)),word_b))
					.before('<div class="forlitter">'+word_c+'</div>');
			}
		});
	},
	order:function() {
		var form = $('.form-order');
		if (form.length>0) {
			forms.event.onSubmitQuery(function() {
				ordermarks.contr.next.click();
				return false;
			});
			ordermarks.event.onNextQuery(function() {
				var index = ordermarks.getTabIndex();
				if (index == 1) {
					if (forms.success) {
						var fields = form.find('input[type="text"],input[type="hidden"],input[type="radio"][checked="checked"],textarea');
						var data = $('<form action="" method="post">');
						for (var i=0; i<fields.length; i++) {
							var field = fields.eq(i);
							var value = (!(new String(field.attr('name'))).match(/action|secret/))?$.base64.encode(encodeURIComponent(field.val())):field.val();
							data.append('<input name="'+field.attr('name')+'" type="hidden" value="'+value+'" />');
						}
						var sucpanel = $('.item-success');
						sucpanel.find('.name').text(form.find('input[name="last_name"]').val()+' '+form.find('input[name="first_name"]').val()+' '+form.find('input[name="middle_name"]').val());
						sucpanel.find('.address').text(form.find('input[name="zip"]').val()+', г. '+form.find('input[name="city"]').val()+', '+form.find('input[name="address"]').val());
						sucpanel.find('.order').html('Вы заказали '+$('.header .basket .count').text()+' '+$('.header .basket .item').text()+' на сумму <b>'+$('.header .basket .price').text()+'</b> руб.');
						sucpanel.find('.payment').text(form.find('input[name="payment"][checked="checked"]').val());
						data.append('<input class="skin2" type="submit" value="Подтвердить" />');
						var contaner = $('.item-success');
						contaner.find('form').remove();
						contaner.append(data);
						gui.buttons();
						return true;
					} else {
						form.submit();
						return false;
					}
				} else
					return true;
			});
			ordermarks.event.onBackQuery(function() {
				forms.reset();
				return true;
			}); 
		}
	}
}
var miniGallery = {
	mobile:false,
	init:function(contaner) {
		if ($('html').hasClass('ipad'))
			this.mobile = true;
		var p = $(contaner).find('p');
		var gallerys = new Array();
		for (var i=0; i<p.length; i++) {
			var item = p.eq(i);
			var text = (new String(item.text()).replace(/([\s\t ]*|&nbsp;)/ig,'')).length;
			var imgs = item.find(">img");
			if (text==0 && imgs.length>0) {
				gallerys.push({
					"base":item,
					"imgs":imgs
				});
			}
		}
		if (gallerys.length>0) {
			this.bild(gallerys, 11, 2/3);
		}
	},
	bild:function(gallerys, padding, ratio) {
		for (var i=0; i<gallerys.length; i++) {
			var gallery = gallerys[i];
			gallery.base.addClass("mini-gallery")
				.attr("num",i)
				.attr("pos",1);
			var width = gallery.base.width()-(padding*2);
			var height = Math.floor(gallery.base.width()*ratio)-(padding*2);
			gallery.base.height(height+(padding*2));
			var imgs = new Array();
			var _this = this;
			if (!this.mobile) {
				var hover = null;
				gallery.base
					.append(hover = $('<div class="hover" />').css({
						'position':'absolute',
						'width':width+'px',
						'height':height+'px',
						'top':(padding>0)?padding+'px':'0',
						'left':(padding>0)?padding+'px':'0',
						'opacity':0.01
					}));
				hover
					.mouseenter(function() {
						$(this)
							.stop(true,false)
							.fadeTo('fast', 1);
					})
					.mouseleave(function() {
						$(this)
							.stop(true,false)
							.fadeTo('fast', 0.01);
					})
					.click(function() {
						_this.slideIn($(this));
					});
			}
			for (var im=0; im<gallery.imgs.length; im++) {
				var p_size = gallery.imgs.eq(im).attr('src').match(/-([0-9]{2,4})(x|c|v)([0-9]{2,4})-/);
				var p_mode = (p_size.length>0)?(p_size[1]/p_size[3]>1?'c':'x'):'x';
				var m_mode = (this.mobile?2.2:1);
				var img=$('<img />')
					.attr('title', gallery.imgs.eq(im).attr('alt'))
					.css({
						'display':'block',
						'position':'absolute',
						'width':width+'px',
						'height':height+'px'/*,
						'top':(padding>0)?padding+'px':'0',
						'left':(padding>0)?padding+'px':'0'*/
					})
					.attr("src", (gallery.imgs.eq(im).attr('src').replace(/-([0-9]{2,4})(x|c|v)([0-9]{2,4})-/,'-'+Math.round(width*m_mode)+p_mode+Math.round(height*m_mode)+'-')))
					.attr("crop", gallery.imgs.eq(im).attr('src_width')+':'+gallery.imgs.eq(im).attr('src_height')+':'+gallery.imgs.eq(im).attr('src_width')/gallery.imgs.eq(im).attr('src_height'))
					.hide();
				imgs.push(img);
				gallery.base.append(img);
				gallery.imgs.eq(im).remove();
			}
			gallery.base
				.append($('<div class="shadow top" />').css({
					'width':width+'px',
					'top':(padding>0)?padding+'px':'0',
					'left':(padding>0)?padding+'px':'0'
				}))
				.append($('<div class="shadow bottom" />').css({
					'width':width+'px',
					'bottom':(padding>0)?padding+'px':'0',
					'left':(padding>0)?padding+'px':'0'
				}));
			gallery.imgs = imgs;
			this.show(imgs[0]);
			var left = null;
			var right = null;
			if (gallery.imgs.length>1) {
				gallery.base
					.append(left = $('<a href="javascript:void(0)" class="left">Предыдущий</a>'))
					.append(right = $('<a href="javascript:void(0)" class="right">Следующий</a>'));
				if (!left.css('top') && !left.css('bottom'))
					left.css('top',Math.ceil((height+(padding*2))/2-left.height()/2));
				if (!right.css('top') && !right.css('bottom'))
					right.css('top',Math.ceil((height+(padding*2))/2-right.height()/2));
				left.mousedown(function() {
					$(this).addClass('down');
					_this.left($(this));
				}).mouseup(function() {
					$(this).removeClass('down');
				});
				right.mousedown(function() {
					$(this).addClass('down');
					_this.right($(this));
				}).mouseup(function() {
					$(this).removeClass('down');
				});
			}
			gallery.base
				.append($('<div class="num'+(gallery.imgs.length==1?' hide':'')+'"><div>1</div> / '+gallery.imgs.length+'</div>'))
				.append($('<div class="title">'+gallery.imgs[0].attr('title')+'</div>'));
		}
	},
	show:function(object) {
		object.addClass('show');
		if (this.mobile)
			object.show();
		else
			object.fadeIn('fast');
	},
	hide:function(object) {
		object.removeClass('show');
		if (this.mobile)
			object.hide();
		else
			object.fadeOut('fast');
	},
	updateInfo:function(object) {
		var gallery = object.parent();
		var pos = object.attr('pos')?object.attr('pos'):gallery.attr('pos');
		gallery.find('>.num div,>.info .num').text(pos);
		gallery.find('>.title,>.info .title').text(gallery.find('>img.show').attr('title'));
	},
	left:function(object) {
		var gallery = object.parent();
		var prev = null;
		var selected = gallery.find('img.show');
		var selection = ((((prev = selected.prev('img'))[0]) == undefined)?gallery.find('>img:last'):prev);
		gallery.attr('pos',(prev[0]==undefined)?gallery.find('>img').length:Number(gallery.attr('pos'))-1);
		this.show(selection);
		this.hide(selected);
		this.updateInfo(selection);
	},
	right:function(object) {
		var gallery = object.parent();
		var next = null;
		var selected = gallery.find('img.show');
		var selection = ((((next = selected.next('img'))[0]) == undefined)?gallery.find('>img:first'):next);
		gallery.attr('pos',(next[0]==undefined)?1:Number(gallery.attr('pos'))+1);
		this.show(selection);
		this.hide(selected);
		this.updateInfo(selection);
	},
	slideIn:function(obj) {
		var parent = obj.parent();
		var imgs = parent.find('img');
		var control = parent.find('a');
		var canvas = $('<div class="mini-gallery-canvas" />');
		var padding = {
			'left':130,
			'top':40
		};
		var i = 0;
		$('body').append(canvas);
		canvas.append($('<div class="info"><span class="num" /><span class="title" /></div>'));
		for (i=0; i<imgs.length; i++) {
			var item = imgs.eq(i).clone();
			/*var width = canvas.width()-(padding.left*2);
			var height = canvas.height()-(padding.top*2)-60;*/
			var crop = {
				'width':item.attr('crop').split(/:/)[0],
				'height':item.attr('crop').split(/:/)[1],
				'ratio':item.attr('crop').split(/:/)[2]
			}
			var counter = {
				'width':canvas.width()-(padding.left*2),
				'height':canvas.height()-(padding.top*2)-60,
				'ratio':(canvas.width()-(padding.left*2))/(canvas.height()-(padding.top*2)-60)
			}
			
			var size = this.getUrlSize(crop, counter, 200);
			item.css({
					'top': padding.top+(counter.height/2-size.imgHeight/2)+'px',
					'left': padding.left+(counter.width/2-size.imgWidth/2)+'px',
					'width': size.imgWidth+'px',
					'height': size.imgHeight+'px'
				})
				.attr('pos',(i+1)+' / '+imgs.length)
				.attr('src',item.attr('src')
					.replace(/-([0-9]{1,2}x[0-9a-fA-F]{3,6})/,'')
					.replace(/-([0-9]{2,4})(x|c|v)([0-9]{2,4})-/,'-'+size.srcWidth+'c'+size.srcHeight+'-')
					.replace(/\.thumbs\//,'')
					.replace(/_[0-9]{1,4}_[0-9]{1,4}_[0-9]{1,4}/,''));
			canvas.append(item);
			if (item.hasClass('show'))
				this.updateInfo(item);
		}
		var _this = this;
		for (i=0; i<control.length; i++) {
			var item = $('<div />').attr('class', control.eq(i).attr('class'));
			item.css("top",Math.round(counter.height/2-item.height()/2));
			item.mousedown(function() {
				$(this).addClass('down');
				_this.slideClick($(this));
			}).mouseup(function() {
				$(this).removeClass('down');
			});
			canvas.append(item);
		}
		var close = $('<div href="javascript:void(0)" class="close">Закрыть</div>')
			.mousedown(function() {
				$(this).addClass('down');
			}).mouseup(function() {
				$(this).removeClass('down');
				_this.slideClick($(this));
			});
		canvas.append(close);
	},
	slideClick:function(obj) {
		var canvas = obj.parent();
		var mode = obj.attr('class').replace(/down/ig,'').replace(/ /ig,'');
		if (mode == 'close') {
			/*canvas.fadeOut('fast', function() {
				$(this).empty();
				$(this).remove();
			});*/
			canvas.hide().empty().remove();
		} else
		if (mode == 'left') {
			this.left(obj);
		} else
		if (mode == 'right') {
			this.right(obj);
		}
	},
	getUrlSize:function(crop, counter, step) {
		var iw = 0;
		var ih = 0;
		var sw = 0;
		var sh = 0;
		if (crop.ratio > counter.ratio) {
			iw = counter.width;
			ih = Math.round(counter.width/crop.ratio);
			sw = iw<step?step:Math.floor(iw/step)*step;
			sh = Math.round(sw/crop.ratio);
		} else {
			ih = counter.height;
			iw = Math.round(counter.height*crop.ratio);
			sh = ih<step?step:Math.floor(ih/step)*step;
			sw = Math.round(sh*crop.ratio);
		}
		return {
			'imgWidth':iw,
			'imgHeight':ih,
			'srcWidth':sw,
			'srcHeight':sh
		}
	},
	loadImage:function(url, callback) {
		
	}
}

var gallery = {
	contaner:null,
	motion:null,
	onpage:1,
	//motionPos:0,
	buttons: {
		prev:null,
		next:null,
		anim:false,
		init:function(_super, parent, ilngh, next, prev) {
			this.prev = parent.find('>.prev');
			this.next = parent.find('>.next');
			//this.prev.addClass("blocked");
			if (ilngh<=_super.onpage) {
				this.prev.hide();
				this.next.hide();
			} else {
				this.prev.click(function() {
					prev(_super, $(this));
				})
				this.prev.block = function() {
					$(this).addClass("blocked");
				}
				this.prev.unblock = function() {
					$(this).removeClass("blocked");
				}
				this.prev.isblock = function() {
					return $(this).hasClass("blocked");
				}
				this.next.click(function() {
					next(_super, $(this));
				})
				this.next.block = function() {
					$(this).addClass("blocked");
				}
				this.next.unblock = function() {
					$(this).removeClass("blocked");
				}
				this.next.isblock = function() {
					return $(this).hasClass("blocked");
				}
			}
		}
	},
	items:{
		data:null,
		size:0,
		lngh:0,
		set:function(obj) {
			this.data = obj;
			this.height = obj.outerHeight(true);
			this.size = obj.outerWidth(true);
			this.lngh = obj.length;
		}
	},
	init:function () {
		this.contaner = $('.products-gallery');
		this.motion = $('.products-gallery .motion');
		if (this.contaner[0] != undefined && this.motion[0] != undefined) {
			this.items.set(this.motion.find('.item'));
			this.onpage = Math.round(this.contaner.width()/this.items.size);
			this.buttons.init(this, this.contaner, this.items.lngh, this.next, this.prev);
			if (this.items.lngh > this.onpage)
				this.motion.css('width', this.items.size * Math.ceil(this.items.lngh)+'px');
				this.contaner.css('height', this.items.height+'px');				
			this.update();
		}
	},
	next:function(_super, obj) {
		if (!obj.hasClass("anim")) {
			var motion = obj.parent().find('.motion');
			if (motion.position().left + motion.width() > _super.onpage * _super.items.size) {
				obj.addClass("anim");
				motion.animate({
					'left': '-='+_super.items.size*_super.onpage+'px'
				}, 500, 
				function() {
					obj.removeClass("anim");
					_super.update();
				});
			}
		}
	},
	prev:function(_super, obj) {
		if (!obj.hasClass("anim")) {
			var motion = obj.parent().find('.motion');
			if (motion.position().left < 0) {
				obj.addClass("anim");
				motion.animate({
					'left': '+='+_super.items.size*_super.onpage+'px'
				}, 500, 
				function() {
					obj.removeClass("anim");
					_super.update();
				});
			}
		}
	},
	update:function() {
		if (this.buttons.prev.block != undefined)
			this.buttons.prev.block();
		if (this.buttons.next.block != undefined)
			this.buttons.next.block();
		if (this.motion.position().left + this.motion.width() > this.onpage * this.items.size) {
			this.buttons.next.unblock();
		}
		if (this.motion.position().left < 0) {
			this.buttons.prev.unblock();
		}
	}
}

banners = {
	stage:null,
	
	time:5000,
	interval:null,
	xmltry:0,
	
	skin:null,
	
	active:null,
	layercount:null,
	loaded:null,
	motion:false,
	first:null,
	size:null,
	
	ipad:null,
	
	init:function() {
		if ($(".banners")[0] != undefined) {
			this.ipad = (navigator.userAgent.match(/iPad/i) == null)?null:navigator.userAgent.match(/mobile\/([^ ]*)/i)[1];
			
			this.stage = $(".banners").empty();
			$url = this.stage.attr('class').match(/\[(.*)\]/);
			this.size = this.stage.attr('class').match(/([0-9]+)x([0-9]+)/);
			this.stage.attr('class','');
			this.stage.wrap(
				$('<div class="banners" />')
					.css({
						"position":"relative",
						"display":"block"
					})
			);
			
			if (!$url) {
				$(".banners").remove();
				return false;
			} else
				$url = $url[1];
			
			if (!this.size)
				this.size = new Array("320x240",320,240);
			this.stage.css({
				"position":"relative",
				"width":this.size[1]+"px",
				"height":this.size[2]+"px",
				"z-index":1
			});
			
			this.loadXML($url);
		}
	},
	
	loadXML:function(url) {
		$.ajax({
			type: "GET",
			url: url,
			dataType: "xml",
			success: onLoadXML,
			error: function() {
				if (banners.xmltry<5) {
					banners.xmltry++;
					setTimeout(function(banners, url) {
						banners.loadXML(url);
					}, 500, banners, url);
				}
			}
		});
		
		function onLoadXML(xml) {
			banners.parseXML(xml);
		}
	},
	
	parseXML:function(xml) {
		var data = $(xml).find("banners");
		var controller = $(document.createElement("div")).addClass("controller");
		this.layercount = data.find("layer").length;
		this.loaded = new Array(this.layercount);
		
		if (data.attr("skin")) {
			var tmp = data.attr("skin").match(/(.*)\|([C0-9]+)x([C0-9]+)x([0-9]+)\|([C0-9]+)x([0-9]+)/);
			tmp[5] = tmp[5].replace(/C/i,'-1');
			tmp[6] = tmp[6].replace(/C/i,'-1');
			if (tmp.length == 7) {
				this.skin = new Object();
				this.skin.url = tmp[1];
				this.skin.width = parseInt(tmp[2]);
				this.skin.height = parseInt(tmp[3]);
				this.skin.padding = parseInt(tmp[4]);
				this.skin.x = parseInt(tmp[5]);
				this.skin.y = parseInt(tmp[6]);
			} else {
				$(".banners").remove();
				return false;
			}
		} else {
			$(".banners").remove();
			return false;
		}
		if (data.attr("time"))
			this.time = parseInt(data.attr("time"))>1000?parseInt(data.attr("time")):1000;
		
		data.find("layer").each(function(i){
			var source = $(this);
			var block = $(document.createElement("div")).addClass("layer");
			var button = $(document.createElement("div"));
			
			block.css({
				"position":"absolute",
				"display":"none",
				"cursor":(source.attr("url") != 'javascript:void(0)')?"pointer":"default",
				"border":"0",
				"width":banners.size[1]+"px",
				"height":banners.size[2]+"px",
				"z-index":i,
				"background": "url("+source.attr("background")+") no-repeat center",
				"background-size": "cover",
				"overflow":"hidden"
			});
			block.click(function(){
				var location = new String(document.location.href).replace(/http:\/\/[^\/]*/,'');
				var url = source.attr("url");
				if (location != url &&
					url != 'javascript:void(0)') {
					document.location.href=source.attr("url");
					if (location.match(/^\/catalog\//))
						document.location.reload();
				}
			});
			//alert(source.first()[0].childNodes[0].nodeValue)
			block.html($("<div />").html(source.find('>*')).html());
			
			button.css({
				"position":"absolute",
				"left": i*(banners.skin.width+banners.skin.padding)+"px",
				"width":banners.skin.width+"px",
				"height":banners.skin.height+"px",
				"background":"url("+banners.skin.url+") no-repeat 0 0",
				"cursor":"pointer"
			});
			button.click(function(){
				if (banners.loaded[i] && !banners.motion && i!=banners.active-1) {
					banners.imgShow(i);
					clearInterval(banners.first);
				}
			})
			
			banners.stage.append(block);
			controller.append(button);
			
			if (i==0) {
				banners.first = setInterval(function(){
					if (banners.loaded[0] && !banners.motion && i!=banners.active-1) {
						banners.imgShow(0);
						clearInterval(banners.first);
					}
				},500);
			}
			
			banners.loaded[i] = true;
			block.load(function(){ alert(10);
				banners.loaded[i] = true;
				var button = banners.stage.find("div div:nth-child("+(i+1)+")");
				button.css({
					"background-position":"-"+banners.skin.width+"px 0"
				})
			})
		});
		
		//alert();
		//alert();
		
		banners.skin.x = Math.round(this.size[1]/2) - Math.round((banners.layercount*(banners.skin.width+banners.skin.padding))/2);
		
		controller.css({
			"position":"absolute",
			"left":banners.skin.x+"px",
			"top":banners.skin.y+"px",
			"width":banners.layercount*(banners.skin.width+banners.skin.padding)+"px",
			"height":banners.skin.height+"px",
			"overflow":"hidden",
			"z-index":banners.layercount+10
		})
		this.stage.append(controller);
		//controller.insertAfter(this.stage);
		
		if (this.time>0) {
			this.autoStart();
			if (!this.ipad) {
				this.stage.mouseenter(this.autoStop);
				this.stage.mouseleave(this.autoStart);
			}
		}
	},
	
	autoStart:function(event) {
		if (!banners.interval)
			banners.interval = setInterval(function() {
				var iteration=0;
				var showId = banners.active-1;
				do {
					iteration++;
					showId = showId+1<banners.layercount?showId+1:0;
				} while (!banners.loaded[showId] && iteration<banners.layercount)
				if (banners.loaded[showId] && !banners.motion && showId!=banners.active-1) {
					banners.imgShow(showId);
				}
			},banners.time);
	},
	
	autoStop:function(event) {
		clearInterval(banners.interval);
		banners.interval = null;
	},
	
	imgShow:function(showId) {
		this.motion = true;
		if (this.active) {
			var imgHide = this.stage.find("div.layer:nth-child("+this.active+")");
			var imgShow = this.stage.find("div.layer:nth-child("+(showId+1)+")");
			
			var butHide = this.stage.find("div.controller div:nth-child("+this.active+")");
			var butShow = this.stage.find("div.controller div:nth-child("+(showId+1)+")");
			
			butHide.css({
				"background-position":"-"+this.skin.width+"px 0",
				"cursor":"pointer"
			})
			butShow.css({
				"background-position":"-"+(this.skin.width*2)+"px 0",
				"cursor":"default"
			})
			imgHide.css({
				"display":"block",
				"z-index":showId
			})
			imgShow.css({
				"display":"none",
				"z-index":this.layercount+1
			})
			
			if (this.ipad == '8F190') {
				imgShow.css({
					"display":"block"
				});
				imgHide.css({
					"display":"none"
				});
				banners.motion = false;
			} else {
				imgShow.fadeIn(300,function(){
					imgHide.css({
						"display":"none"
					});
					banners.motion = false;
				})	
			}
		} else {
			var imgShow = this.stage.find("div.layer:nth-child("+(showId+1)+")");
			var butShow = this.stage.find("div.controller div:nth-child("+(showId+1)+")");
			
			butShow.css({
				"background-position":"-"+(this.skin.width*2)+"px 0",
				"cursor":"default"
			})
			imgShow.css({
				"display":"none",
				"z-index":this.layercount+1
			})
			
			if (this.ipad == '8F190') {
				imgShow.css({
					"display":"block"
				});
				banners.motion = false;
			} else {
				imgShow.fadeIn(300,function(){
					banners.motion = false;
				});
			}
		}
		this.active = showId+1;
	}
}

var cookie = {
	save:function(data) {
		var location = new String(self.location).replace(/(http\:\/\/[^\/]*).*/ig,'$1/');
		this.ajax = $.ajax({
			type: "POST",
			url: location+":axah=noout&action=cookie",
			data: data,
			dataType: "html",
			success: function(responce) {
			},
			error: function(e) {
			}
		});
	}
}

var request = {
	send:function(uri, action, type, data, callback) {
		var domaine = new String(self.location).replace(/(http\:\/\/[^\/]*).*/ig,'$1');
		uri = (uri == undefined)?(new String(self.location).replace(/http\:\/\/[^\/]*(\/[^?#]*).*/ig,'$1')):uri;
		action = (action == undefined)?'':'&action='+action;
		type = (type == undefined)?'html':type;
		data = (data == undefined)?new Object():data;
		$.ajax({
			type: "POST",
			url: domaine+uri+':axah=out'+action,
			data: data,
			dataType: type,
			success: function(data) {
				if (callback != undefined)
					callback(data, action)
			},
			error: function() {
			
			}
		});
	}
}

var forms = {
	form:null,
	success:false,
	event:{
		submitProcess:null,
		submitQuery:function() {
			return (this.submitProcess == undefined)?true:this.submitProcess();
		},
		onSubmitQuery:function(func) {
			this.submitProcess = func;
		}
	},
	fields:new Array(),
	valids:new Array(),
	init:function() {
		this.form = $("form[class^='form-']");
		if (this.form[0] != undefined) {
			var success = $("span[class*='"+(this.form.attr('class').split('-')[1]+'-success')+"']");
			if (success[0] != undefined) {
				setTimeout(function() {
					showMessage(success.attr("header"), success.html(), '400px');
				}, 500);
			}
			this.form.submit(function(e) {
				return forms.onsubmit(e);
			});
			var fields = this.form.find(".field");
			var vl = 0;
			for (var i=0; i<fields.length; i++, vl++) {
				var name = fields.eq(i).attr("class").replace(/field /,'');
				var input = fields.eq(i).find("input, textarea, select");
				var error = input.attr("error");
				var ecolor = input.attr("ecolor");
				var eout = input.attr("eout");
				if (error != undefined) {
					var tmp = error.split(/[;]/);
					error = $('<div class="error" header="'+tmp[0]+'" description="'+tmp[1]+'" />');
					if (eout == undefined || eout == "window")
						error.click(function() {
							showMessage($(this).attr("header"), $(this).attr("description"), '400px');
						});
					else
					if (eout == "field")
						error.text(tmp[1]);
					input.after(error.hide());
				} else
					error = false;
				input.attr("name",name);
				this.fields.push({
					"name":name,
					"input":input,
					"error":error
				});
				if (error) {
					input.focus(function() {
						$(this).parent().find('.error').fadeOut(200);
					});
				}
				if (ecolor != undefined) {
					input.focus(function() {
						$(this).animate({
							"background-color":$(this).attr("ecolor").split(/:/)[0]
						}, 'fast');
					});
				}
				if (input.attr('valid'))
					this.valids.push(i+'-0');
				if (input.length>1) {
					if (input.attr('type') == 'radio') {
						for (var eq=0; eq<input.length; eq++, vl++) {
							if (input.eq(eq).attr('valid'))
								this.valids.push(i+'-'+eq);
						}
						input.change(function() {
							var selected = $(this).parent().parent().find('input[checked="checked"]');
							var description = $(this).attr("description");
							var contaner = $(this).parent().parent().next();
							if (selected.length>0)
								selected.removeAttr('checked');
							$(this).attr("checked","checked");
							if (contaner.hasClass('description'))
								contaner.html(description);
						})
						input.eq(0).change();
					}
				}
			}
		}
		return true;
	},
	reset:function() {
		this.form
			.removeClass('validation')
			.find('input[name="secret"]').remove();
		this.success = false;
	},
	onsubmit:function(e) {
		var submit = this.getsubmit();
		if (this.success)
			return this.event.submitQuery();
		if (submit.hasClass('block'))
			return false;
		if (!this.form.hasClass('validation')) {
			this.form.addClass('validation');
			submit
				.addClass('block')
				.fadeTo(200, 0.2);
			var valid = '{"request":[\n';
			for (var i=0; i<this.valids.length; i++) {
				var cell = this.valids[i].split(/\-/);
				valid+='\t{"name":"'+$.base64.encode(encodeURIComponent(this.fields[cell[0]].name))+'","type":"'+$.base64.encode(encodeURIComponent(this.fields[cell[0]].input.eq(cell[1]).attr('valid')))+'","value":"'+$.base64.encode(encodeURIComponent(this.fields[cell[0]].input.eq(cell[1]).val()))+'","checked":"'+$.base64.encode(encodeURIComponent((this.fields[cell[0]].input.eq(cell[1]).is(":checked")?'checked':'')))+'"}'+(i<this.valids.length-1?',':'')+'\n';
			}
			valid+= ']}';
			this.request({"valid":valid});
		}
		return false;
	},
	onerror:function(error) {
		var pos = null;
		while (pos = error.shift()) {
			if (this.fields[pos].error != false) {
				var input = this.fields[pos].error.prev();
				if (input.attr('ecolor'))
					input.animate({
						"background-color":input.attr('ecolor').split(/:/)[1]
					}, 'fast');
				if (input.attr('error'))
					this.fields[pos].error.fadeIn(200);
			}
		}
		var submit = this.form.find('input[type=submit]');
		this.getsubmit().fadeTo(200, 1, function() {
			$(this).removeClass('block')
		});
		this.form.removeClass('validation');
	},
	onsuccess:function(response) {
		this.success = true;
		this.form.append($('<input name="secret" type="hidden" value="'+response.secret+'" />')).submit();
	},
	getsubmit:function() {
		var submit = this.form.find('input[type=submit]');
		if (submit.css('display') == 'none')
			submit = submit.next();
		return submit;
	},
	request:function(data) {
		var location = new String(self.location).replace(/http\:\/\/([^\:]*)\/\:.*/ig,'http://$1/');
		$.ajax({
			type: "POST",
			url: location+":axah=out&action=valid",
			data:data,
			dataType: "json",
			success: function(response) {
				if (typeof(response.error) != 'undefined')
					forms.onerror(response.error);
				else
				if (typeof(response.response.secret) != 'undefined')
					forms.onsuccess(response.response);
			},
			error: function() {
				forms.onerror(new Array());
			}
		});
	},
	fnShowProps:function (obj, objName) {
		var result = "";
		for (var i in obj) // обращение к свойствам объекта по индексу
			result += objName + "." + i + " = " + obj[i] + "\n";
		alert(result);
	}
}

function showMessage(Header, Message, Width) {
	var controller = $('<a id="windows-info-loc" href="#showMessage" style="display: none">0</a>');
	var content = $('	<div id="showMessage" class="popup" style="width:'+Width+'">\
							<h1>'+Header+'</h1>\
							<p>'+Message+'</p>\
							<div class="button showmessage-close">Закрыть</div>\
						</div>');
	controller.appendTo("body");
	content.appendTo("body");

	$("#windows-info-loc").fancybox({
		'width'				: 250,
		'height'			: 200,
		'autoScale'     	: true,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		"showCloseButton"	: false,
		onStart				: function() {
		},
		onClosed			: function() {
			content.remove();
		},
		onComplete			: function() {
			setTimeout(function(win){
				$.fancybox.resize();
				$.fancybox.center();
				var endpos = parseInt(win.css('top'));
				//win.css({'top':(endpos+20)+'px'});
				win.animate({
					'top':endpos-5+'px',
					'opacity':'1'
				}, 200);
			},10, $('#fancybox-wrap'))
		}
	});
	controller.click();
	controller.remove();
	if (content.find(".showmessage-close")[0] != undefined) {
		content.find(".showmessage-close").click(function() {
			$(this).css({ opacity: 0.5, cursor: "default" });
			$(this).unbind("click");
			$.fancybox.close();
		});
	}
}