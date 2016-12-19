define(['text!./gwc.html', 'css!./gwc.css'], function(gwcPage){
	return {
		init: function(){
			$('.gwc').html(gwcPage).show().siblings("div").hide();
		}
	}
});