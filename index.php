<!doctype html>
<html lang="en">

	<head>
		<?php include_once 'includes/head.php'; ?>

		<link rel="stylesheet" href="css/carousel.css">
		<link rel="stylesheet" href="css/awards.css">
		<link rel="stylesheet" href="css/actioncalls.css">
	</head>

	<style>

	</style>

	<body>
		<?php include_once 'includes/menu.php'; ?>

		<div id="gallery-box">

			<?php include_once 'includes/home/gallery-header.php'; ?>

		</div>

		<div class="drop-up">
			<div class="container-fluid body-container">
				<div class="body-inner">
					<div class="justify-content-md-center">
						<?php include_once 'includes/home/news.php'; ?>
						<br>
						<?php include_once 'includes/home/info.php'; ?>
						<br>


						<div style="margin-left:-6.2%; margin-right:-6.2%; display:block; background-color:#A3DDC7; border:solid; border-color: transparent;">
							<div style="margin-top:0.5%; margin-bottom:0.5%;">
								<div class="embed-responsive embed-responsive-4by3" style="margin:auto; display:block; max-width:640px; max-height:480px">
									<iframe src="https://drive.google.com/file/d/0B9aER-CnF7jibFlfV2ZaUXdMRTVNLWlXaGhFVjBUWm9iYVI4/preview" allowfullscreen></iframe>
								</div>
							</div>
						</div>
						<br>
						<hr>

						<?php include_once 'includes/home/link-cards.php'; ?>
						<br>
						<?php include_once 'includes/home/social-buttons.php'; ?>
					</div>
				</div>
			</div>
		</div>

		<?php include_once 'includes/footer.php'; ?>

		<?php include_once 'includes/javascript.php'; ?>
	</body>

</html>