
function scroll_to_class(chosen_class) {
	var nav_height = $('nav').outerHeight();
	var scroll_to = $(chosen_class).offset().top - nav_height;

	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 1000);
	}
}

jQuery(document).ready(function() {
	count=0;
	
	/*
	    Fullscreen background
	*/
	$.backstretch("assets/img/backgrounds/1.jpg");

	/*
	    Multi Step Form
	*/
	$('.msf-form form fieldset:first-child').fadeIn('slow');
	
	// next step
	$('.msf-form form .btn-next').on('click', function() {
		
		var fname=document.getElementById("firstname").value;
		var address=document.getElementById("address").value;
		var cast=document.getElementById("cast").value;

		if(count==0)
		{
			if(fname=="")
			{
				alert("fname empty");
				count=0;
				return;
			}
			$(this).parents('fieldset').fadeOut(200, function() {
				$(this).next().fadeIn();
				scroll_to_class('.msf-form');
			});  
			count++;
		}
		else if(count==1)
		{
			if (address=="") 
			{
				alert("address is empty");	
				count=1;
				return;
			}
			$(this).parents('fieldset').fadeOut(200, function() {
				$(this).next().fadeIn();
				scroll_to_class('.msf-form');
			});  
			count++;
		}
		else if(count==2)
		{
			if (cast=="") 
			{
				alert("cast is empty");	
				count=2;
				return;
			}
			$(this).parents('fieldset').fadeOut(200, function() {
				$(this).next().fadeIn();
				scroll_to_class('.msf-form');
			});  
			count++;
		}
	});
	
	// previous step
	$('.msf-form form .btn-previous').on('click', function() {
		$(this).parents('fieldset').fadeOut(200, function() {
			$(this).prev().fadeIn();
			scroll_to_class('.msf-form');
		});
	});	
});