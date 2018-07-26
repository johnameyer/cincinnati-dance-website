<?php

function validate_email($email){
	$email = trim($email);

	$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
		
	} else {
		$error = $email . 'is not valid email';
		$email = NULL;
	}

	return $email;
}

function validate_int($int){
	$int = trim($int);

	$int = filter_var($int, FILTER_SANITIZE_NUMBER_INT);

	if (!filter_var($int, FILTER_VALIDATE_INT) === false) {
		
	} else {
		$error = $int . 'is not valid int';
		$int = NULL;
	}
	return $int;
}