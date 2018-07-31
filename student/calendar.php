<?php
set_include_path('../');
$page = "Calendar";
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
		<?php include_once 'includes/header-image.php' ?>

		<div class="drop-up">
			<div class="container-fluid body-container">
				<div class="body-inner">
					<div class="row justify-content-md-center">
						<div class="col-md-10 col-md-offset-1">
						<?php
						$path = array(array("name" => "Student"));
						include_once 'includes/breadcrumb.php';
						?>

							<h2>Upcoming Events</h2>

							<div class="text-center">
								<iframe src="https://calendar.google.com/calendar/embed?src=4cll8j34qjs5m7m0m81iq5t2sk%40group.calendar.google.com&ctz=America%2FNew_York" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
							</div>
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