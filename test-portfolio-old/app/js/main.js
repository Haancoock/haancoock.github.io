var myModule = (function(){


	var init = function(){
		_setUpListners();
		};
	
	var _setUpListners = function(){
		$('.work-site-add-container').on('click', _showPopup);
		$('.popup-form').submit(_addProject);
		$('.hide').on('change', _imgUpload);
		$('.close-alert').on('click', _closeAlerts);
		};

	var _showPopup = function(e){
		e.preventDefault();
		var divPopup = $('.popup-container');
		divPopup.bPopup({
			onClose: function(){
				$('.popup-error-container').hide();
				$('.popup-addalert-content').hide();
				$('.input-val').val('');
				$('.qtip-container').hide();
				$('.popup-form-input, .popup-form-textarea').removeClass('qtip-error');
			}
		});
	};


	var _closeAlerts = function(){
		var closeButton = $('.close-alert');
		closeButton.closest('.alert-box').hide();
	}


	var _imgUpload = function(e){
		var imgText = $('.hide').val();
		var imgVal = $('#img');
		imgText = imgText.replace("C:\\fakepath\\", "");
		imgVal.val(imgText);
		console.log(imgText);
	}

	var _ajaxForm = function(url, form){
		if (!validation.validateForm(form)) return false;
		var url = url,
			data = new FormData(form);

		var result = $.ajax({
			url: url,
			type: 'POST',
			contentType: false,
			processData: false,
			data: data
		}).fail(function(){
			console.log('Проблемы в PHP');
			$('.popup-error-container').show();

		})

		return result;

	}

	var _addProject = function(e){
		e.preventDefault();
		var form = $(this)[0],
			url = 'php/add_project.php',
			servAnswer = _ajaxForm(url, form);
		

		if(servAnswer){
			servAnswer.done(function(data) {
			var ans = jQuery.parseJSON(data);
			console.log('servAnswer sucsess');
			console.log(ans.mes);
			if (ans.mes === 'error') {
				$('.popup-error-container').show();
				$('.popup-addalert-content').hide();
				console.log('Давай по новой Миша, всё хуйня..');
			}else{
				$('.popup-addalert-content').show();
				$('.popup-error-container').hide();
				console.log('Всё прошло успешно, ухууу!');
				}
			});
		}
		
	};

	return{
		init: init
	}
})();

myModule.init();

