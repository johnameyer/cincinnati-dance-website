<?php
set_include_path('../');

include_once 'includes/db.php';
include_once 'includes/session.php';

$students = array();

if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
	$query = "SELECT student.fname, student.lname, student_class.class, student_class.has_paid, student_class.payment FROM (`contact` INNER JOIN `user` ON contact.user=user.id INNER JOIN `student` ON student.contact=contact.id INNER JOIN `student_class` ON student_class.student=student.id) WHERE user.email='$email'";

	$result = mysqli_query($conn, $query);
	if ($result && mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			array_push($students, $row);
		}
		$result->close();
	}
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
								<th scope="col">First Name</th>
								<th scope="col">Last Name</th>
								<th scope="col">Class</th>
								<th scope="col">Paid for</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($students as $student): ?>
								<tr>
									<td>
										<?php echo $student['fname']; ?>
									</td>
									<td>
										<?php echo $student['lname']; ?>
									</td>
									<td>
										<?php echo $student['class']; ?>
									</td>
									<td>
										<?php echo $student['has_paid']==2 ? 'Yes' : $student['payment'] != NULL ? 'Waiting for confirmation from Paypal' : 'No'; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
					<a href="payment/checkout.php">Complete payment</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>
</body>

</html>