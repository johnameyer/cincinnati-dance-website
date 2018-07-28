<?php
$my_file = 'file.log';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);

fwrite($handle, "Success:" . json_encode($_REQUEST) . '\n');

set_include_path('../');

include_once 'includes/db.php';
include_once 'includes/session.php';

if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
	$query = "UPDATE (`contact` INNER JOIN `user` ON contact.user=user.id INNER JOIN `student` ON student.contact=contact.id INNER JOIN `student_class` ON student.id=student_class.student) SET student_class.has_paid=1 WHERE user.email='$email' AND student_class.has_paid=0";
	echo $conn->error;
}