<?php

function mailTo($email, $subject, $template_file, $replacements = array()){
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= 'From: <noreply@cincinnatidance.com>' . "\r\n";
	$contents = file_get_contents($template_file);
	foreach ($replacements as $key => $replacement) {
		$contents = preg_replace('/$' . $key . '/', $replacement, $contents);
	}
	return @mail($email, $subject, $contents, $headers, '');
}