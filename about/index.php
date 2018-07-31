<?php
set_include_path('../');
$page = "About Us";
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
					<div class="row justify-content-md-center">
						<div class="col-md-10 col-md-offset-1">
							<?php
							$path = array();
							include_once 'includes/breadcrumb.php';
							?>
							<h1>About Us</h1>
							<p class="lead" style="text-align:center">Check out one of the pages below to learn more about us.</p>
							<br>
							<?php include_once 'includes/home/link-cards.php'; ?>
							<br>
							<br>
							<br>
							<br>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include_once 'includes/footer.php'; ?>

		<?php include_once 'includes/javascript.php'; ?>
	</body>

</html>