
/*function scroll_to_class(chosen_class) {
	var nav_height = $('nav').outerHeight();
	var scroll_to = $(chosen_class).offset().top - nav_height;

	if($(window).scrollTop() != scroll_to) {
		$('html, body').stop().animate({scrollTop: scroll_to}, 1000);
	}
}*/

jQuery(document).ready(function() {

			// Custom method to validate username
			/*$.validator.addMethod("usernameRegex", function(value, element) {
				return this.optional(element) || /^[a-zA-Z0-9]*$/i.test(value);
			}, "Username must contain only letters, numbers");
*/
			$("#btn1").click(function(){
				var form = $("#regform");
				form.validate({
					errorElement: 'span',
					errorClass: 'help-block',
					highlight: function(element, errorClass, validClass) {
						$(element).closest('.form-group').addClass("has-error");
					},
					unhighlight: function(element, errorClass, validClass) {
						$(element).closest('.form-group').removeClass("has-error");
					},
					rules: {
						Fname: {
							required: true,
							//usernameRegex: true,
							minlength: 6,
						},
						Lname: {
							required: true,
							//usernameRegex: true,
							minlength: 6,
						},
						Phone : {
							required: true,
						},
						Email : {
							required: true,
						},
						DOB: {
							required: true,
						
						},
						Gender: {
							required: true,
							
						},
					},
					messages: {
						Fname: {
							required: "First name required",
						},
						Fname: {
							required: "Last name required",
						},
						Phone: {
							required: "Phone required",
						},
						Email: {
							required: "Email required",
						},
						DOB: {
							required: "Phone required",
						},
						Gender: {
							required: "Email required",
						},
					}
				});
				if (form.valid() === true){
					if ($('#data1').is(":visible")){
						current_fs = $('#data1');
						next_fs = $('#data2');
					}else if($('#data2').is(":visible")){
						current_fs = $('#data2');
						next_fs = $('#data3');
					}
					
					next_fs.show(); 
					current_fs.hide();
				}
			});

			$('#previous').click(function(){
				if($('#company_information').is(":visible")){
					current_fs = $('#company_information');
					next_fs = $('#account_information');
				}else if ($('#personal_information').is(":visible")){
					current_fs = $('#personal_information');
					next_fs = $('#company_information');
				}
				next_fs.show(); 
				current_fs.hide();
			});
});