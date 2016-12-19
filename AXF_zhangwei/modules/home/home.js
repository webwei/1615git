define(['text!./home.html', 'css!./home.css', 'css!./swiper.min.css'], function(homePage){
	return {
		init: function(){
			$('.index-home').html(homePage).show().siblings("div").hide();
			$(function(){
				//发送轮播图的ajax
				$.get('js/home.json',function(data){ //用jq发送ajax请求 返回数据后
					$('#tmpContext').load('templete/tmpContext.html', function(){ //通过load方法 载入装模板的HTMl文件
						var htmlStr = baidu.template('firstTmp', data); 
						$('.index-home').html(htmlStr); //将数据通过模板放入页面
						$('#firstTmp').remove(); //移除模板
						// 轮播插件
					  var mySwiper = new Swiper('.swiper-container', {
					    autoplay: 2000,//可选选项，自动滑动(时间:毫秒)
					    loop : true,//循环
					    pagination : '.swiper-pagination',//分页器
					  });
					  //购物车动画
						$('.shop .shop-jiaru').click(function(){
							var cartNum = $('.cart-num');
							var shopImg = $(this).siblings('a').children('.shop-img');
							cartNum.show().text(Number(cartNum.text()) + 1);
							var left = shopImg.offset().left;
							// 元素距离浏览器顶部位置-滚动高度=元素距离可视窗口距离
							var top = shopImg.offset().top-$(document).scrollTop();
							var carLeft = cartNum.offset().left;
							var carTop = cartNum.offset().top-$(document).scrollTop();
							var jiaodu =  (carLeft-left) < 0 ? -60 : 60;
							$('.style').html('@keyframes first{0%{width:1rem;height:1rem;top:'+top+'px;left:'+left+'px;transform: rotate(20deg)}10%{width:0.8rem;height:0.8rem;top:'+(top-40)+'px;left:'+ (left+(carLeft-left)*0.3)+'px; transform: rotate('+jiaodu+'deg);}100%{width:0;height:0;top:'+carTop+'px;left:'+carLeft+'px;}}');
							var cloneImg = shopImg.clone().addClass('move').appendTo($(this).closest('.shop'));
							cloneImg.css('animation', 'first 1s');
							setTimeout(function(){
								cloneImg.remove();
							}, 1000);
						});
					});		 
					});
				})
		}
	}
});
