<?php
set_include_path('../');
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
						<h1>Checkout Completed</h1>
						<p>You should be redirected to <a href="account/classes.php">your classes.</a></p>
					</div>
				</div>
			</div>
		</div>

		<script>
			window.location.replace("account/classes.php");
		</script>

		<?php include_once 'includes/footer.php'; ?>

		<?php include_once 'includes/javascript.php'; ?>
	</body>

</html>