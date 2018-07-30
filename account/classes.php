<?php
set_include_path('../');

include_once 'includes/db.php';
include_once 'includes/session.php';
require_once 'includes/login-check.php';

$student_classes = array();
if(isset($_SESSION['contact-id'])){
	$contact_id = $_SESSION['contact-id'];
	$student_classes = getStudentClassesByContact($contact_id);
	$unpaid = getUnpaidClassesByContact($contact_id);
}

$page = "Your Registered Classes";
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
					<h2><?php echo $page; ?></h2>

					<table class="table">
						<thead>
							<tr>
								<th scope="col">Class</th>
								<th scope="col">First Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Paid for</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($student_classes as $student_class): ?>
								<tr>
									<td>
										<?php echo $student_class['class-name']; ?>
									</td>
									<td>
										<?php echo $student_class['fname']; ?>
									</td>
									<td>
										<?php echo $student_class['lname']; ?>
									</td>
									<td>
										<?php echo strcmp($student_class['has_paid'], '0')==0 ? 'No' : ($student_class['status'] != "Completed" ? 'Waiting for confirmation from Paypal' : 'Paid'); ?>
									</td>
									
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<a class="btn btn-secondary" href="classes/index.php">Browse classes</a>
					<?php if($unpaid): ?>
						<br>
						<a class="btn btn-primary" href="payment/checkout.php">Complete payment</a>
					<?php endif ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>
</body>

</html>