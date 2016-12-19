define(["backbone"], function(Backbone){
	var Router = Backbone.Router.extend({ //扩展新的路径
		routes:{
			home: "home", //回调函数名称
			sscs: "sscs",
			gwc: "gwc",
			wode: "wode",
			fkms: 'fkms',
			jfsc: 'jfsc',
			sousuo: 'sousuo'
		},
		home: function(){
			require(["modules/home/home.js"], function(home){
				home.init();
			});
		},
		sscs: function(){
			require(["modules/sscs/sscs.js"], function(sscs){
				sscs.init();
			});
		},
		gwc: function(){
			require(["modules/gwc/gwc.js"], function(gwc){
				gwc.init();
			});
		},
		wode: function(){
			require(["modules/wode/wode.js"], function(wode){
				wode.init();
			});
		},
		fkms: function(){
			require(["modules/fkms/fkms.js"], function(fkms){
				fkms.init();
			});
		},
		jfsc: function(){
			require(["modules/jfsc/jfsc.js"], function(jfsc){
				jfsc.init();
			});
		},
		sousuo: function(){
			require(["modules/sousuo/sousuo.js"], function(sousuo){
				sousuo.init();
			});
		}
	});
	return new Router();
});