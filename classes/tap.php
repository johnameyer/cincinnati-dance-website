<?php
set_include_path('../');
$page = "Tap Classes";
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
					<script>document.getElementById("class-nav-tap").className = "nav-link active"</script>

					<h2><?php echo $page; ?></h2>

					<div class="row">
						<div class="col-md-8">
							<p>
								Our Tap program is a comprehensive program (beginners through advanced) that covers the range of tap styles, from vintage Broadway-style
								tap to the newest trends in rhythm tap, under the direction of award-winning tap master Ms. Tina Marie Prentosito. Beginning tappers learn
								correct tap technique and terminology under the tutelage of Ms. Imani (who trained for over a decade with Ms. Tina), and intermediate and
								advanced students take class with Ms. Tina. Dress code is dancewear of any type for girls (leotard and tights, unitard, leggings and dance top,
								etc.) and dancewear or exercise wear for boys (shorts/warm-ups and T-shirt, etc.) No pants that cover the shoes, no hair in face, no dangling
								jewelry. Any style tap shoes are permitted for class. For performances, shoe requirements vary, so please see notes.
							</p>
							<p>
								Students taking more than one class per week are eligible for our multiple class discounts, which are as follows: 2 nd class 10% discount, 3 rd class
								20% discount, 4 th class 30% discount, 5 th class 40% discount, 6 th class or more 50% discount. (calculated starting with longest class first, and going
								down to shortest class) Tuition listed is full price, not including multi-class discounts.
							</p>

							<br>
						</div>
						<div class="col-md-4">
							<div class="card">
								<img src="img/classes/tap.jpg" class="card-img-top" alt="tap picture">
							</div>
						</div>
					</div>

					<br>

					<?php
					$type = 'tap';
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