<?php
set_include_path('../');
$page = "Drop-In Classes";
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

		<div class="drop-up">
			<div class="container-fluid body-container">
				<div class="body-inner">
					<div class="justify-content-md-center">
						<?php
						$path = array(array("name" => "Classes", "path" => "classes/"));
						include_once 'includes/breadcrumb.php';
						?>

						<?php include_once 'includes/components/class-nav.php'; ?>
						<script>setActiveClass("class-nav-drop-in")</script>

						<h2><?php echo $page; ?></h2>

						<div class="row">
							<div class="col-md-8">
								<p>
									While most of our classes are weekly classes that require consistent attendance, we do offer a few “drop-in” classes each week, which are classes that students may “drop in” on rather than committing to a full session of classes (although some students choose to attend for the entire session.)  These classes are structured in such a way that each weekly class is a “stand-alone” class, meaning that it does not require prior attendance in order to follow the material taught in that day’s class.  The teachers do, however, tailor the material to the students’ various levels and attendance records, differentiating as necessary, so that all students’ needs are met whether it is their first class at CMDC or they have been attending for years.  Some of our drop-in classes require prior training; please read the notes for each class for more details.
								</p>
								<p>
									Drop-in classes may be paid for individually when coming to class or “dance cards” for a certain number of classes may be purchased in advance at a discounted price.  Please refer to the notes in the chart below for tuition information.  There is no tuition charge for “A Chance to Dance”, our drop-in classes for students with special needs. 
								</p>

								<br>
							</div>
							<div class="col-md-4">
								<div class="card">
									<img src="img/classes/drop-in/drop-in.jpg" class="card-img-top" alt="drop-in picture">
								</div>
							</div>
						</div>

						<br>

						<?php
						$type = 'drop-in';
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