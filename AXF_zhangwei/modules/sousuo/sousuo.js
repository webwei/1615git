define(['text!./sousuo.html', 'css!./sousuo.css'], function(sousuoPage){
	return {
		init: function(){
			$('.sousuo').html(sousuoPage).show().siblings("div").hide();
			$('.header-icon').click(function(){
				$(this).closest('.sousuo').hide();
				$('.zmain').show();
				$('.footer').show();
			});
		}
	}
});