<?php
set_include_path('../');

include_once 'includes/db.php';
include_once 'includes/session.php';
require_once 'includes/login-check.php';

$students = array();

if(isset($_SESSION['contact-id'])){
	$contact_id = $_SESSION['contact-id'];
	$students = getStudentsByContact($contact_id);
}

$page = "Your Students";
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
								<th scope="col">Number of Registered Classes</th>
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
										<?php echo $student['count']; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>
</body>

</html>