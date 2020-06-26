<?php

function validateForm($data){
	require_once 'config.php';

	$v = new Valitron\Validator($data);
	$v->rule('required', ['name', 'email', 'message', 'g-recaptcha-response']);
	$v->rule('email', 'email');
	if($v->validate()) {
    	// echo "Yay! We're all good!";
	}else {
    	// Errors
    	print_r($v->errors());
	}
}