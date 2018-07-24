$.validate({
	modules :  'sanitize',
	ignore: [],
});


$(function(){
	$('.nav-icon').click(function(){
		$('.nav-icon').toggleClass('open');
		//Open menu
		$("#mobile-menu").toggleClass("mobile-nav-show");
		$(".cbp-spmenu-push").toggleClass("cbp-spmenu-push-toleft");
	});

	$(".chkbox").on("click", function(e){
		var chkbox = $(this);
		var targetChk = chkbox.parent().children('input[type=checkbox]');

		if(chkbox.hasClass("unchecked")){
			chkbox.removeClass("unchecked");
			targetChk.prop("checked", true);
		} else {
			chkbox.addClass("unchecked");
			targetChk.prop("checked", false);
		}

		targetChk.validate();

	});

	$('.question-title').click(function(){
		$(this).toggleClass("active");
	});

	$('.question-large-title').click(function(){
		$(this).toggleClass("active");
	});

	$(".phone-mask").mask("(999) 999-999", { autoclear: false });
	$(".jmbg-mask").mask("9999999999999", { autoclear: false });

});