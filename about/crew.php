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
		<style>
			.card .row {
				display: flex;
				align-items: center;
				padding: 20px;
			}
		</style>
	</head>

	<body>
		<?php include_once 'includes/menu.php'; ?>

		<div class="drop-up">
			<div class="container-fluid body-container">
				<div class="body-inner">
					<div class="row justify-content-md-center">
						<div class="col-md-10 col-md-offset-1" id="cardbox">
							<br>

							<h1>Our Faculty/Staff</h1>
							<br>
							<p>At CDMC, classes are taught by adult dance teachers with college-level training in dance and
								education. Unlike many studios, we do not hire high school students to teach the younger children’s
								classes; they may only serve as assistants to the adult teachers in charge. Our teachers are not only
								outstanding dancers (having been professional dancers, members of their university dance teams, and
								award-winning competitive dancers), but are also outstanding educators. Our teaching faculty has
								won numerous teaching and choreography awards on the local, regional, and even national level.
								Additionally, our faculty members regularly attend master classes and teaching workshops to stay on
								top of current dance trends and teaching methods.</p>
							<div class="row ">
								<?php
								$LEFT = false;
								$file = file_get_contents('../data/staff.json');
								$json = json_decode($file);
								foreach($json as $OBJ):
								?>
								<?php $LEFT = !$LEFT; ?>
								<?php include 'includes/components/staff-card.php' ?>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>

				<?php include_once 'includes/footer.php'; ?>

				<?php include_once 'includes/javascript.php'; ?>
				</body>

			</html>