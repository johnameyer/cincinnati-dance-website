<?php
set_include_path('../');

include_once('includes/validate.php');
include_once('includes/db.php');
include_once('includes/session.php');

header('Content-Type: application/json');

//sleep(1);

if(isset($_REQUEST['email'])){

	$conn->begin_transaction();

	$new_pass = bin2hex(openssl_random_pseudo_bytes(10)); 

	$options = ['cost' => 12];
	$password = password_hash($new_pass, PASSWORD_DEFAULT, $options);

	$query = $conn->prepare("UPDATE `user` SET password=?, forgot_password=NULL WHERE email=?");
	$query->bind_param('ss', $password, $_REQUEST['email']);
	$query->execute();
	if(isset($error)){
		echo json_encode($error);
		$conn->rollback();
		$conn->close();
		exit();
	}

	require_once('email/email.php');
	if(!mailTo($_REQUEST['email'], 'Reset Your Password', 'email/forgot-password.html', array('password' => $new_pass))){
		echo json_encode("Failed to send email");
		$conn->rollback();
		$conn->close();
		exit();
	}

	$conn->commit();
	$conn->close();

	echo json_encode("success");
	exit();
}
echo json_encode("Not signed in");
exit();