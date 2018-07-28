<?php
set_include_path('../');

include_once('includes/validate.php');
include_once('includes/db.php');
include_once('includes/session.php');

header('Content-Type: application/json');

if(isset($_REQUEST['email'])){ //new user just registered
	$email = validate_email($_REQUEST['email']);
	if($_REQUEST['password'] !== $_REQUEST['verify-password']){
		$error = 'Passwords do not match';
	}
	if(!isset($error)){

		$conn->begin_transaction();

		$options = ['cost' => 12];
		$password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT, $options);

		$query = $conn->prepare("INSERT INTO `user` (email, password) VALUES (?,?)");
		$query->bind_param('ss', $_REQUEST['email'], $password);//TODO form validation
		$query->execute();
		$error = isset($error) ? $error : $conn->error;

		$foreign_key = $conn->insert_id;


		$query = $conn->prepare("INSERT INTO `contact` (`user`, `fname`, `lname`, `relationship`, `address`, `city`, `state`, `zip`, `contact_phone`, `emergency_phone`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
		$query->bind_param('issssssiss', $foreign_key, $_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST['relationship'], $_REQUEST['address'], $_REQUEST['city'], $_REQUEST['state'], $_REQUEST['zip'], $_REQUEST['contact-phone'], $_REQUEST['emergency-phone']);//TODO form validation
		$query->execute();
		$error = isset($error) ? $error : $conn->error;

		$conn->commit();

		if(strlen($error) == 0 && isset($foreign_key)){
			$_SESSION['contact-id'] = $conn->insert_id;
			$_SESSION['email'] = $_REQUEST['email']; //TODO support return field
			$_SESSION['fname'] = $_REQUEST['fname'];
			echo json_encode("success");
			exit();
		}
		
		$conn->close();
	}
}
echo json_encode(isset($error) ? $error : "failure");