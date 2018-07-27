<?php
set_include_path('../');

include_once('includes/validate.php');
include_once('includes/db.php');
include_once('includes/session.php');

header('Content-Type: application/json');

if(isset($_REQUEST["sign-in-email"])){ //user just signed in
	//TODO
	$email = $_REQUEST['sign-in-email'];
	$query = "SELECT contact.id, user.password, user.email, contact.fname FROM (contact INNER JOIN user ON contact.user=user.id) WHERE user.email='$email'";

	$result = mysqli_query($conn, $query);
	if ($result && mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		if(password_verify($_REQUEST['sign-in-password'], $row['password'])){
			$id = $row['id'];
			$email = $row['email'];
			$fname = $row['fname'];
		}
		$result->close();
	}

	if(isset($id)){
		$_SESSION['id'] = $id;
		$_SESSION['email'] = $email;
		$_SESSION['fname'] = $fname;

		echo json_encode("success");
		exit();
	}
}
echo json_encode("failure");