var login = (function(){

	var init = function(){
		_setUpListners();
	};

	var _setUpListners = function(){
		$('.login-form-container').on('submit', _loginForm);
	};

	var _loginForm = function(e){
		e.preventDefault();
		form = $(this);
		url = "php/authorization.php";
		defObj = _ajaxForm(form, url);
	};


	var _ajaxForm = function(form, url){
		if(!validation.validateForm(form)) return false;
		var url = url,
			data = form.serialize();
			// console.log(data);

		var $result = $.ajax({
			url: url,
			type: 'POST',
			dataType: 'json',
			data: data
		}).done(function(data) {
			console.log(data.mess);
			console.log("success");
			if (data.mess === "done") {
				window.location.href = 'index.php';
			};
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	}




	return{
		init: init
	}

})();


login.init();