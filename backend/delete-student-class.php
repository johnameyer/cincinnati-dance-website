<?php
set_include_path('../');
include_once 'includes/db.php';
include_once 'includes/session.php';

header('Content-Type: application/json');

if(isset($_SESSION['contact-id'])){
	//TODO check if contact has access to this student / student_class
	$error = deleteStudentClass($_REQUEST['student'], $_REQUEST['class']);
	if($error) echo json_encode('Failed to remove');
	else echo json_encode('success');
	exit();
}
echo json_encode('You are not signed in');