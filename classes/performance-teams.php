<?php
set_include_path('../');
$page = "Performance Teams";
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
					<script>document.getElementById("class-nav-performance-teams").className = "nav-link active"</script>

					<h2><?php echo $page; ?></h2>

					<div class="row">
						<div class="col-md-8">
							<p>
								While most of our classes perform in our big year-end recital, some students wish to have additional performance experience throughout the year, and our Performance Teams provide those opportunities.  Our teams present local performances through the year at area festivals, community events, shopping malls, retirement communities, and benefit shows.  We have a variety of options in our performance teams: The Cincinnati Dance Crew (which consists of our four Dance Teams: Junior Jazz, Senior Jazz, Junior Tap, and Senior Tap), The Cincinnati Ballet Ensemble (which consists of our Junior Ensemble and Senior Ensemble), and our Cincinnati Show Choir.  Performances usually occur in October, December, and April/May, followed by our year-end recital in June.
							</p>
							<p>
								The Cincinnati Show Choir is our newest performance team, combining singing and dancing, under the vocal direction of Mr. John Washam and the dance direction of Ms. Tina Marie Prentosito. Boys and girls age eight to fourteen may join the Cincinnati Show Choir - no prior experience is necessary. For students who love to perform but don't have a lot of experience, this is the group to join. Material is differentiated to meet the needs of all members, so that those coming into the group with experience are able to advance their skillsets as much as beginners coming into the group.  Our Show Choir performs current hits as well as oldies-but-goodies, and provides an excellent foundation for students who wish to pursue show choir or musical theater in high school or college.
							</p>
							<p>
								The Cincinnati Ballet Ensemble is made up of two classic ballet performance ensembles – our Junior Ballet Ensemble (age 10 and up, intermediate level) and our Senior Ballet Ensemble (age 13 and up, advanced level.) All members of the Cincinnati Ballet Ensemble must take weekly ballet technique classes in addition to the choreography classes in which they learn the performance choreography.  Placement on the Cincinnati Ballet Ensemble is based on the evaluation of Ms. Mary Anne Schaeper, the director of our ballet program. If a student from another dance school wishes to join the Ballet Ensemble, he/she is asked to provide videos of past performances or to participate in a group lesson taught by Ms. Mary Anne to evaluate readiness for the ensemble and to determine level placement. 
							</p>
							<p>
								The Cincinnati Dance Crew is our performance team that performs most frequently throughout the year.  It is a fun, high energy dance team made up of four groupings: Junior Jazz Team, Junior Tap Team, Senior Jazz Team, and Senior Tap Team. Placement on the Cincinnati Dance Crew is based on teacher recommendations from the previous year or the evaluation of Ms. Tina, the director of our performance teams. If a student from another dance school wishes to join, he/she is asked to provide videos of past performances or to participate in a group lesson to evaluate readiness and determine level placement. 
							</p>
							<p>
								Students are allowed to be on multiple teams, and it is not unusual to have students on two or three of our teams.  Students taking more than one class per week are eligible for our multiple class discounts, which are as follows:  2nd class 10% discount, 3rd class 20% discount, 4th class 30% discount, 5th class 40% discount, 6th class or more 50% discount (calculated starting with longest class first and going down to shortest class.)  Tuition listed is full price, not including multi-class discounts.  
							</p>

							<br>
						</div>
						<div class="col-md-4">
							<div class="card">
								<img src="img/classes/performance/performance.jpg" class="card-img-top" alt="performance picture">
							</div>
						</div>
					</div>

					<br>

					<?php
					$type = 'performance';
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