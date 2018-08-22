<?php
set_include_path('../');
$page = "Gallery";
?>
<!doctype html>
<html lang="en">

	<head>
		<?php include_once 'includes/head.php'; ?>

		<link rel="stylesheet" href="css/carousel.css">
		<link rel="stylesheet" href="css/awards.css">
		<link rel="stylesheet" href="css/actioncalls.css">
		<style type="text/css">
			#gallery img {
				height: 80vh;
				object-fit: cover;
			}
		</style>
	</head>

	<body>
		<?php include_once 'includes/menu.php'; ?>

		<?php include_once 'includes/header-image.php'; ?>

		<div class="drop-up">
			<div class="container-fluid body-container">
				<div class="body-inner">
					<div class="justify-content-md-center">
						<?php
						$path = array();
						include_once 'includes/breadcrumb.php';
						?>

						<h2><?php echo $page; ?></h2>

						<br>
						<div class="card-deck">
							<?php
							$file = file_get_contents('../data/gallery-folders.json');
							$json = json_decode($file);
							foreach($json as $OBJ):
							?>
							<?php include 'includes/components/gallery-card.php'; ?>
							<?php endforeach; ?>
						</div>

						<?php
						$folder = "caribole18-07-20";
						$pattern = "1232132321";
						$title = "Caribole 2018"

						?>


					</div>
				</div>
			</div>
		</div>

		<?php include_once 'includes/footer.php'; ?>

		<?php include_once 'includes/javascript.php'; ?>
	</body>

</html>