/*! jMethods start*/
!function ($) {
  $(function(){
    var $window = $(window);
		//when class to-show is click perform this event
		$('.to-show').click(function(event){
			event.preventDefault();
			var x = $(this).attr('data-show');
			$('#'+x).slideDown('slow');
		});
		
		//to hide element
		$('.to-hide').click(function(event){
			event.preventDefault();
			var x = $(this).attr('data-hide');
			$('#'+x).slideUp('fast');
		});
		
		

	})
}(window.jQuery);

