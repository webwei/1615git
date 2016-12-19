define(['text!./fkms.html', 'css!./fkms.css'], function(fkmsPage){
	return {
		init: function(){
			$('.fkms').html(fkmsPage).show().siblings("div").hide();
			$('.header2 a').click(function(){
				$(this).closest('.fkms').hide();
				$('.index-home').show();
				$('.zmain').show();
				$('.footer').show();

			});
		}
	}
});