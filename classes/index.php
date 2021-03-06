<?php
set_include_path('../');
$page = "Class Listing";
?>
<!doctype html>
<html lang="en">

<head>
	<?php include_once 'includes/head.php'; ?>

	<link rel="stylesheet" href="css/carousel.css">
	<link rel="stylesheet" href="css/awards.css">
	<link rel="stylesheet" href="css/actioncalls.css">

	<style>
	.card {
		max-width: 300px;
		min-width: 200px;
		align-items: center;
		margin: 20px auto;
	}
	.col {
		display: flex;
		align-items: center;
	}
</style>
</head>

<body>
	<?php include_once 'includes/menu.php'; ?>

	<div class="drop-up">
		<div class="container-fluid body-container">
			<div class="body-inner">
				<div class="row justify-content-md-center">
					<div class="col-md-10 col-md-offset-1">
						<?php
						$path = array();
						include_once 'includes/breadcrumb.php';
						?>

						<p> The Cincinnati Dance and Movement Center offers classes for ages two through adult. Check out below for our current
						schedule of classes. </p>

						<div>
							<div class="row">
								<?php
								$file = file_get_contents('../data/class-category.json');
								$json = json_decode($file);
								$i = 0;
								foreach($json as $OBJ):
									?>
									<div class="col">
										<div class="card">
											<img class="card-img-top" src="<?php echo $OBJ -> img; ?>" alt="Card image cap">
											<div class="card-body">
												<h5 class="card-title">							
													<?php echo $OBJ -> name; ?>
												</h5>
												<h6>
													<?php echo $OBJ -> ageGroup; ?>
												</h6>
												<a href='<?php echo $OBJ -> link; ?>' class="btn btn-primary">Check It Out</a>
											</div>
										</div>
									</div>
								<?php endforeach; ?>
							</div>
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