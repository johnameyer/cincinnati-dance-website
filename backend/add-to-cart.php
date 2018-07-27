<?php

set_include_path('../');

include_once 'includes/session.php';
include_once 'includes/db.php';

header('Content-Type: application/json');

if(isset($_REQUEST['student'])){
	$foreign_key = $_SESSION['contact-id'];//TODO add check fo if user has permission to student

	$query = $conn->prepare("INSERT INTO `student_class` (`student`, `class`) VALUES (?, ?);");
	$query->bind_param('is', $_REQUEST['student'], $_REQUEST['class']);//TODO form validation
	$query->execute();
	$error = $conn->error;
	if(strlen($error)){
		echo json_encode($error);
		exit();
	}
	$student = $conn->insert_id;
	echo json_encode("success");
	exit();
}
echo json_encode("failure");
