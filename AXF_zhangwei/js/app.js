require.config({
	paths: {
		"jquery": "js/jquery-1.11.0",
		"text": "js/text",
		"backbone": "js/backbone",
		"underscore": "js/underscore",
		"css": "js/css"
	}
});
require(['jquery','backbone','router.js'],function($,Backbone){
    Backbone.history.start(); //开启监听
});

