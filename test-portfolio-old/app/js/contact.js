var contact = (function(){

	var init = function(){
		_setUpListners();
	};

	var _setUpListners = function(){
		$('.contact-content-form').on('submit', _contactForm);
		$('.contact-content-form').on('reset', _resetForm);
	};


	var _resetForm = function(e){
		form = $(this);
		form.find('.qtip-container').hide();
		form.find('input, textarea').removeClass('qtip-error');
	};

	var _ajaxForm = function(form, url){
		if(!validation.validateForm(form)) return false;
		var url = url,
			data = form.serialize();

		var result = $.ajax({
			url: url,
			type: 'POST',
			data:data,
			dataType: 'Json'
		}).done(function(data){
			ans = data;
			console.log(ans);
			if (ans.mess === "done") {
				$('.popup-addalert-content').show();
			}
		})
		.fail(function(data){
			console.log(data);
		})

	};

	var _contactForm = function(e){
		e.preventDefault();

		var form = $(this),
			url = 'php/contact_me.php',
			defObj = _ajaxForm(form, url);
	};


	return {
		init: init
	};


})();


contact.init();