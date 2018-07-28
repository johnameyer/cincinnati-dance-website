<?php
$my_file = 'file.log';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);

fwrite($handle, "Success:" . json_encode($_REQUEST) . "\n");

set_include_path('../');

include_once 'includes/db.php';
include_once 'includes/session.php';

if(isset($_SESSION['contact-id'])){
	$contact = $_SESSION['contact-id'];
	$query = "UPDATE (`student` INNER JOIN `student_class` ON student.id=student_class.student) SET student_class.has_paid=1 WHERE student.contact='$contact' AND student_class.has_paid=0";
	mysqli_query($conn, $query);
	echo $conn->error;
}

$page = "Checkout Success";
?>
<!doctype html>
<html lang="en">

<head>
	<?php include_once 'includes/head.php'; ?>

	<link rel="stylesheet" href="css/carousel.css">
	<link rel="stylesheet" href="css/awards.css">
	<link rel="stylesheet" href="css/actioncalls.css">
</head>

<body>
	<?php include_once 'includes/menu.php'; ?>

	<?php include_once 'includes/header-image.php'; ?>

	<div class="drop-up">
		<div class="container-fluid body-container">
			<div class="body-inner">
				<div class="justify-content-md-center">
					<a href="account/classes.php">You successfully checked out, click here</a>
				</div>
			</div>
		</div>
	</div>

	<?php include_once 'includes/footer.php'; ?>

	<?php include_once 'includes/javascript.php'; ?>
</body>

</html>