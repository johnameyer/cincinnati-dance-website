<?php
set_include_path('../');
include_once 'includes/db.php';

header('Content-Type: application/json');

if(isset($_SESSION['contact-id']) && $_REQUEST['has_paid'] == 0){
	//TODO check if contact has access to this student / student_class
	$error = deleteStudentClass($_REQUEST['student'], $_REQUEST['class']);
	if($error) echo json_encode($error);
	else echo json_encode('success');
}