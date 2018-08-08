<?php
set_include_path('../');

include_once('includes/validate.php');
include_once('includes/db.php');
include_once('includes/session.php');

header('Content-Type: application/json');

sleep(1);

if(isset($_SESSION['email'])){

	$conn->begin_transaction();

	$new_pass = $_REQUEST['password'];

	$options = ['cost' => 12];
	$password = password_hash($new_pass, PASSWORD_DEFAULT, $options);

	$query = $conn->prepare("UPDATE `user` SET forgot_password='?' WHERE email=?");
	$query->bind_param('ss', $password, $_SESSION['email']);
	$query->execute();
	if(isset($error)){
		echo json_encode($error);
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