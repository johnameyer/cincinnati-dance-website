<?php
set_include_path('../');
include_once 'includes/db.php';

header('Content-Type: application/json');

$error = deleteStudentClass($_REQUEST['student'], $_REQUEST['class']);
if($error) echo json_encode($error);
else echo json_encode('success');