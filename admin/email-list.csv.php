<?php
set_include_path('../');

include_once 'includes/db.php';
include_once 'includes/session.php';
require_once 'includes/admin-check.php';

$students = array();


if(isset($_REQUEST['class'])){
	$data = getEmailsByClass($_REQUEST['class']);
} else {
	$data = getEmails();
}

//header('Content-Type: text/csv');
//header('Content-Disposition: filename="emails.csv"');

$fp = fopen('php://output', 'w');
foreach ( $data as $line ) {
    fwrite($fp, $line.PHP_EOL);
}
fclose($fp);
?>