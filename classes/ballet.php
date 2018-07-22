<?php
set_include_path('../');
$page = "Ballet Classes";
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
					<?php
					$path = array(array("name" => "Classes", "path" => "classes/"));
					include_once 'includes/breadcrumb.php';
					?>
					<?php include_once 'includes/class-nav.php'; ?>
					<script>document.getElementById("class-nav-ballet").className = "nav-link active"</script>

					<h2><?php echo $page; ?></h2>

					<div class="row">
						<div class="col-md-8">
							<p>Our Ballet Program is a leveled classical ballet program (beginners through pre-professional) under the direction of Ms. Mary Anne Schaeper (BA
								and MA in Dance, UC College-Conservatory of Music) with a strong focus on correct technique while experiencing “la joie de danse” (the joy of
								dance). Dress code is black leotard and pink tights (for girls) and black tights/leggings and close-fitting white t-shirt (for boys.) Pink split-sole
								ballet shoes for girls and black split-sole ballet shoes for boys. Hair in a bun and no jewelry. All students are welcomed in our ballet program,
								but for upper levels, an informal audition is usually required (such as participating in a class to determine correct level placement.) Please
							contact us with any questions.</p>
							<p>
								Please note that many of our upper-level ballet students take multiple ballet classes (and/or other classes we offer) per week, and are therefore
								eligible for our multiple class discounts, which are as follows: 2nd class 10% discount, 3rd class 20% discount, 4th class 30% discount, 5th class 40%
								discount, 6th class or more 50% discount. (calculated starting with longest class first, and going down to shortest class) Tuition listed is full price,
							not including multi-class discounts.</p>

							<br>
						</div>
						<div class="col-md-4">
							<div class="card">
								<img src="img/classes/ballet.jpg" class="card-img-top" alt="ballet picture">
							</div>
						</div>
					</div>

					<br>

					<?php
					$type = 'ballet';
					include_once('includes/components/class-table.php');
					?>
				</div>
			</div>
		</div>
	</div>

	<?php include_once 'includes/footer.php'; ?>

	<?php include_once 'includes/javascript.php'; ?>
</body>

</html>