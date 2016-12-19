require.config({
	paths: {
		"jquery": "js/jquery-1.11.0",
		"text": "js/text",
		"backbone": "js/backbone",
		"tmpContext": "js/baiduTemplate",
		"underscore": "js/underscore",
		"css": "js/css",
		"swiper": "js/swiper.min"
	}
});
require(['jquery','backbone','js/router.js','tmpContext', 'swiper'],function($,Backbone){
    Backbone.history.start(); //开启监听
    var wordspace = new Backbone.Router();
    wordspace.navigate('home',{trigger: true});
	//页脚颜色转换，动画执行
	var footer = $('.footer');
	footer.find('div').first().addClass('footer-bhbj');
	footer.on('click', 'div', function(){
		footer.find('div').removeClass('footer-bhbj');
		$(this).addClass('footer-bhbj');
	});
});


