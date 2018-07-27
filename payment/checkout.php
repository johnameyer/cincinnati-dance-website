<?php
set_include_path('../');

include_once 'includes/db.php';
include_once 'includes/session.php';

$students = array();

if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
	$query = "SELECT student.fname, student.lname, student_class.class, student_class.has_paid FROM (`contact` INNER JOIN `user` ON contact.user=user.id INNER JOIN `student` ON student.contact=contact.id INNER JOIN `student_class` ON student_class.student=student.id) WHERE user.email='$email' AND student_class.has_paid=0";

	$result = mysqli_query($conn, $query);
	if ($result && mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			array_push($students, $row);
		}
		$result->close();
	}
}

$page = "Your Unpaid Classes";
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
										<?php echo $student['has_paid'] ? 'Yes' : 'No'; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>

					<p>Note that any registration fees paid over the initial class will be credited towards tuition. <a href="data/payment_policies.pdf">Read more</a></p>
					<a href="data/legalese.pdf">By checking out, you agree to the conditions here</a>
					
					<br>

					<div>
						<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
							<input type="hidden" name="cmd" value="_s-xclick">
							<input type="hidden" name="item_name" value="Class Registration">
							<input type="hidden" name="quantity" value="<?php echo count($students); ?>">
							<input type="hidden" name="hosted_button_id" value="2QX8BND8KZ55C">
							<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
							<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>
</body>

</html>