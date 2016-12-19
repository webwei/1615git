define(['text!./jfsc.html', 'css!./jfsc.css'], function(jfscPage){
	return {
		init: function(){
			$('.jfsc').html(jfscPage).show().siblings("div").hide();
			$('.header-icon').click(function(){
				console.log($('.wode'));
				$(this).closest('.jfsc').hide();
				$('.wode').show();
				$('.zmain').show();
				$('.footer').show();
			});
		}
	}
});