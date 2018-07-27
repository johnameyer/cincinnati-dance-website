<?php

set_include_path('../');

include_once 'includes/session.php';
include_once 'includes/db.php';

header('Content-Type: application/json');

if(isset($_REQUEST['fname'])){
	$foreign_key = $_SESSION['contact-id'];

	$query = $conn->prepare("INSERT INTO `student` (`fname`, `lname`, `birth_date`, `age`, `school_district`, `grade`, `medical_info`, `contact`) VALUES (?, ?, ?, ?, ?, ?, ?, ?);");
	$query->bind_param('sssisssi', $_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST['birth'], $_REQUEST['age'], $_REQUEST['school-district'], $_REQUEST['grade'], $_REQUEST['medical'], $foreign_key);//TODO form validation
	$query->execute();
	$error = $conn->error;
	if(strlen($error)){
		echo json_encode($error);
	}
	$student = $conn->insert_id;
	echo json_encode(array("student" => $student));
	exit();
}
echo json_encode("failure");