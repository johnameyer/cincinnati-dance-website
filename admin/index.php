<?php
set_include_path('../');

require_once 'includes/admin-check.php';
require_once 'includes/db.php';

$classes = getClasses();

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
					<br>
					<a class="primary-text" href="admin/student-list.csv.php">Download Student List</a>
					<br>
					<a class="primary-text" href="admin/email-list.csv.php">Download All Emails</a>
					<?php foreach($classes as $class): ?>
						<br>

						<a class="primary-text" href="admin/email-list.csv.php?class=<?php echo $class['id']; ?>">Download Emails for <?php echo $class['name']; ?></a>
					<?php endforeach; ?>

				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>
</body>

</html>