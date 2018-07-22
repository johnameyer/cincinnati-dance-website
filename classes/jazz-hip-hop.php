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

					<?php include_once 'includes/class-nav.php'; ?>
					<script>document.getElementById("class-nav-jazz-hip-hop").className = "nav-link active"</script>

					<h2>Jazz and Hip-Hop Classes</h2>

					<div class="row">
						<div class="col-md-8">
							<p>
								Our fun and energetic Jazz and Hip-Hop classes have something for everyone, from ages 5 through adult. For the younger students up to teens, we offer jazz/hip-hop classes, taught by Ms. Imani, which combine the foundation of jazz technique with current hip-hop styles, using age-appropriate music and movement. For teens and adults, we offer a pure hip-hop class, taught by Ms. Brittany, for those who wish to learn the most up-to-date street hip-hop moves.  We also offer two levels of jazz classes as part of our dance teams, taught by Ms. Tina, for students who enjoy performing and wish to gain additional performance experience in jazz dance. (Focus on the dance teams is mainly on classic jazz, with some hip-hop style added.)  
							</p>
							<p>
								For all our jazz/hip-hop classes, we take great care that all music used – usually top hits getting airtime on the radio – is family-friendly and edited for content and that all dance moves are appropriate for a family recital. Dress code is dancewear of any type for girls (leotard and tights, leggings or dance pants and top, etc.) and dancewear or exercise wear for boys (shorts/warm-ups and T-shirt, etc.)  No hair in face, no dangling jewelry.  Any style jazz shoes or hip-hop shoes are permitted for class.  For performances, shoe requirements vary, so please see notes. 
							</p>
							<p>
								Students taking more than one class per week are eligible for our multiple class discounts, which are as follows:  2nd class 10% discount, 3rd class 20% discount, 4th class 30% discount, 5th class 40% discount, 6th class or more 50% discount (calculated starting with longest class first and going down to shortest class.)  Tuition listed is full price, not including multi-class discounts.  

							</p>

							<br>
						</div>
						<div class="col-md-4">
							<div class="card">
								<img src="img/classes/hip-hop.jpg" class="card-img-top" alt="hip hop picture">
							</div>
							<div class="card">
								<img src="img/classes/jazz.jpg" class="card-img-top" alt="jazz picture">
							</div>
						</div>
					</div>

					<br>

					<?php
					$type = 'jazz-hip-hop';
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