<?php
set_include_path('../');
$page = "Contemporary and Acro-Dance Classes";
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
						<script>setActiveClass("class-nav-contemporary-acro-dance")</script>

					<h2><?php echo $page; ?></h2>

					<div class="row">
						<div class="col-md-8">
							<p>
								Our Contemporary classes, taught by Ms. Brittany, offer students age 10 through adults the opportunity to express themselves through the
								latest contemporary styles. We offer two levels of Contemporary class: Beginning/Intermediate, for students with limited training and
								experience, and Intermediate/Advanced, for students with significant prior training. Both of these classes develop strong contemporary
								technique while allowing students the freedom to express themselves through movement. Dress code is dancewear of any type for girls (leotard
								and tights, leggings and dance top, etc.) and dancewear or exercise wear for boys (shorts/warm-ups and T-shirt, etc.) No hair in face, no
								dangling jewelry. Any style of soft, pliable dance shoes – such as lyrical shoes, ballet shoes, or jazz shoes – are permitted for class. For
								performances, tan split-sole slip-on shoes are required.
							</p>
							<p>
								Our Acro-Dance class, also taught by Ms. Brittany, focuses on developing acrobatic and tumbling skills that are commonly used in dance genres
								such as contemporary, cheer, and hip-hop. The class material is differentiated for students of varying levels, age 10 and up, so that each student
								progresses toward his or her own individualized goals. Dress code is close-fitting dancewear or exercise wear, with hair secured and no jewelry.
								If tights are worn in class, they must be footless or convertible tights as students work on skills barefooted.
							</p>
							<p>
								Students taking more than one class per week are eligible for our multiple class discounts, which are as follows: 2nd class 10% discount, 3rd class
								20% discount, 4th class 30% discount, 5th class 40% discount, 6th class or more 50% discount (calculated starting with longest class first and going
								down to shortest class.) Tuition listed is full price, not including multi-class discounts.
							</p>

							<br>
						</div>
						<div class="col-md-4">
							<div class="card">
								<img src="img/classes/contemporary-acro-dance/contemporary.jpg" class="card-img-top" alt="contemporary picture">
							</div>
						</div>
					</div>

					<br>

					<?php
					$type = 'contemporary-acro-dance';
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