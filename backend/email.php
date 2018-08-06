<?php

function mailTo($email, $template_file){
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <noreply@cincinnatidance.com>' . "\r\n";
	@mail($email, 'Welcome to Cincinnati Dance', file_get_contents($template_file), $headers, '');
}