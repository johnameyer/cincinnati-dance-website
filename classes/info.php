<?php
set_include_path('../');

include_once 'includes/db.php';
include_once 'includes/session.php';

$students = array();
$result = getById($_GET['class']);
if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
	$query = "SELECT student.id, student.fname FROM (`contact` INNER JOIN `user` ON contact.user=user.id INNER JOIN `student` ON student.contact=contact.id) WHERE user.email='$email'";

	$sql_result = mysqli_query($conn, $query);
	if ($sql_result && mysqli_num_rows($sql_result) > 0) {
		while($row = mysqli_fetch_assoc($sql_result)) {
			array_push($students, $row);
		}
		$sql_result->close();
	}
}

$page = $result["name"];
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
						<h2><?php echo $result["name"]; ?></h2>

						<div class="row">
							<div class="col-md-8">
								<p><?php echo $result["description"]; ?></p>
								<dl>
									<dt>Notes</dt>
									<dd>
										<?php echo $result["notes"]; ?>
									</dd>
									<dt>Days of Week</dt>
									<dd>
										<?php echo $result["days"]; ?>
									</dd>
									<dt>Time of Day</dt>
									<dd>
										<?php echo $result["times"]; ?>
									</dd>
									<dt>Appropiate Ages</dt>
									<dd>
										<?php echo $result["ages"]; ?>
									</dd>
									<dt>Class starts</dt>
									<dd>
										<?php echo $result["class_starts"]; ?>
									</dd>
									<dt>Class ends</dt>
									<dd>
										<?php echo $result["class_ends"]; ?>
									</dd>
									<dt>Tuition</dt>
									<dd>
										<?php echo $result["tuition"]; ?>
									</dd>
								</dl>
								<?php if(isset($_SESSION['contact-id'])): ?>
								<a class="btn btn-primary" href="classes/register.php?<?php echo http_build_query(array("type"=>$type, "class"=>$class)); ?>">
									Register
								</a>
								<?php else: ?>
								<p>Please sign in to register for classes</p>
								<?php endif; ?>
							</div>
							<div class="col-md-4">
								<div class="card">
									<img src='<?php echo $result["image"]; ?>' class="card-img-top" alt="picture">
								</div>
							</div>
						</div>
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