<?php
set_include_path('../');
include_once 'includes/db.php';

header('Content-Type: application/json');

$_SESSION['contact-id']


if(isset($_SESSION['email']) && $_REQUEST['has_paid'] == 0){
	$error = deleteStudentClass($_REQUEST['student'], $_REQUEST['class']);
	if($error) echo json_encode($error);
	else echo json_encode('success');
}