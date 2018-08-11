<?php
set_include_path('../');

include_once('includes/validate.php');
include_once('includes/db.php');
include_once('includes/session.php');

header('Content-Type: application/json');

sleep(1); //make wait so cannot spam

if(isset($_REQUEST["sign-in-email"])){ //user just signed in
	//TODO
	$email = $_REQUEST['sign-in-email'];
	$query = "SELECT contact.id, user.password, user.email, contact.fname, user.forgot_password FROM (contact INNER JOIN user ON contact.user=user.id) WHERE user.email='$email'";

	$result = mysqli_query($conn, $query);
	if ($result && mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$needs_to_reset = false;
		if(password_verify($_REQUEST['sign-in-password'], $row['password'])){
			$id = $row['id'];
			$email = $row['email'];
			$fname = $row['fname'];
		} else if(password_verify($_REQUEST['sign-in-password'], $row['forgot_password'])) {
			$id = $row['id'];
			$email = $row['email'];
			$fname = $row['fname'];
			$needs_to_reset = true;
		} else {
			echo json_encode("That's not the right password for this account.");
			$result->close();
			exit();
		}
		$result->close();
	} else {
		echo json_encode("Looks like you don't already have an account by that email, please try again or create one.");
		exit();
	}

	if(isset($id)){
		$_SESSION['contact-id'] = $id;
		$_SESSION['email'] = $email;
		$_SESSION['fname'] = $fname;

		if($needs_to_reset){
			echo json_encode("reset");
			exit();
		}

		echo json_encode("success");
		exit();
	}
}
echo json_encode("Unknown error.");
exit();