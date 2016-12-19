define(['text!./shansongchaoshi.html', 'css!./sscs.css'], function(sscsPage){
	return {
		init: function(){
			if($('.sscs').children().size() > 0){
				//通过路由转换页面
				$('.sscs').show().siblings("div").hide();
			}else{
				$('.sscs').html(sscsPage).show().siblings("div").hide();
				$(function(){
					//发送闪送超市的ajax
					$.get('js/sscs.json', function(data){
						//将模版文件load到页面
						$('#tmpContext').load('templete/tmpContext.html', function(){
							var htmlStr = baidu.template('twoTmp', data); 
							$('.main-sscs').html(htmlStr); //将数据通过模板放入页面
							$('#twoTmp').remove(); //移除模板
							//默认第一个li有类名before，添加样式
							$('.main-sscs-left>ul>li').first().addClass('before');
							//添加事件委托，传入数据，调用超市商品分类转换liLoad函数
							$('.main-sscs-left').on('click', 'li', {'data': data},liLoad);
							//购物车动画
							$('.main-sscs-right-bottom').on('click', 'span', gwcDh);
						});
					});
				})
			}
		}
	}
});
//超市商品分类转换liLoad函数
function liLoad(e){
	//li样式转换
	$(this).siblings().removeClass().end().addClass('before');
	//获取编号
	var shopNum = $(this).attr('data-categoryid');
	//变换模版
	$('#tmpContext').load('templete/tmpContext.html', function(){
		//获取各个编号的数据
		var data1 = e.data.data.data.products[shopNum];
		//数据传入百度模版
		var htmlStr1 = baidu.template('threeTmp', {'data': data1});
		//获取自定义二级列表
		var liId = $('.main-sscs-right-bottom div[data-li="'+shopNum+'"]');
		//判断当前二级列表有无内容，有则显示其他隐藏，无则load进对应内容
		if(liId.size() > 0){
			liId.siblings('div').hide().end().show();
		}else{
			$('.main-sscs-right-bottom ul').children('div').hide();
			$(htmlStr1).appendTo('.main-sscs-right-bottom>ul');
			$('#threeTmp').remove();
		}
	});
}
//购物车动画
function gwcDh(){
	var cartNum = $('.cart-num');
	var shop1Num = $(this).siblings('.shop1-num');
	if($(this).attr('class') == 'shop1-jiaru'){
		//购物车加1
		cartNum.show().text(Number(cartNum.text()) + 1);
		var shopImg = $(this).closest('.shop1-right').siblings('.shop1-img').first();
		var left = shopImg.offset().left;
		// 元素距离浏览器顶部位置-滚动高度=元素距离可视窗口距离
		var top = shopImg.offset().top-$(document).scrollTop();
		var carLeft = cartNum.offset().left;
		var carTop = cartNum.offset().top-$(document).scrollTop();
		var jiaodu =  (carLeft-left) < 0 ? -60 : 60;
		// console.log(left+ ' ' + top+ ' ' + carLeft + ' ' + carTop + ' '+ jiaodu);
		$('.style').html('@keyframes first{0%{width:1rem;height:1rem;top:'+top+'px;left:'+left+'px;transform: rotate(20deg)}10%{width:0.8rem;height:0.8rem;top:'+(top-40)+'px;left:'+ (left+(carLeft-left)*0.3)+'px; transform: rotate('+jiaodu+'deg);}100%{width:0;height:0;top:'+carTop+'px;left:'+carLeft+'px;}}');
		var cloneImg = shopImg.clone().addClass('move').appendTo($(this).closest('.shop1'));
		cloneImg.css('animation', 'first 1s');
		setTimeout(function(){
			cloneImg.remove();
		}, 1000);
		//减号和内容显示
		$(this).siblings().show();
		//内容加1
		shop1Num.text(Number(shop1Num.text()) + 1);
	}else{
		//内容减1
		shop1Num.text(Number(shop1Num.text()) - 1);
		//购物车减1
		cartNum.text(Number(cartNum.text()) - 1);
		if(shop1Num.text() <= 0){
			$(this).hide().siblings('.shop1-num').hide();
		}
		if(cartNum.text() <= 0){
			cartNum.hide();
		}
	}
}
