<?php
set_include_path('./');
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

					<div id="gallery" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php for ($i=0; $i < 20; $i++): ?>
								<li data-target="#gallery" data-slide-to="<?php echo $i; ?>" class="<?php echo $i==0?"active":""; ?>"></li>
							<?php endfor; ?>
						</ol>
						<div class="carousel-inner">
							<?php for ($i=0; $i < 20; $i++): ?>
								<div class="carousel-item<?php echo $i==0?" active":""; ?>">
									<img class="d-block w-100" src="img/gallery/<?php echo $i; ?>.jpg" alt="First slide">
								</div>
							<?php endfor; ?>
						</div>
						<a class="carousel-control-prev" href="#gallery" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#gallery" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include_once 'includes/footer.php'; ?>

	<?php include_once 'includes/javascript.php'; ?>
</body>

</html>