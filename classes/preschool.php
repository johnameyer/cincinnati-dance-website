<?php
set_include_path('../');
$page = "Preschool Classes";
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
					<script>document.getElementById("class-nav-preschool").className = "nav-link active"</script>

					<h2><?php echo $page; ?></h2>

					<div class="row">
						<div class="col-md-8">
							<p>
								Our preschool classes are designed to introduce basic dance technique, with a focus on developing gross motor skills, musicality, and dance fundamentals in a fun and encouraging environment.  Dress code is dancewear (leotard and tights for girls, shorts and a close-fitting T-shirt for boys) and ballet shoes (pink for girls, black for boys.)  Hair secured back from face and no dangling jewelry please. 
							</p>
						</p>

						<br>
					</div>
					<div class="col-md-4">
						<div class="card">
							<img src="img/classes/preschool/preschool.jpg" class="card-img-top" alt="preschool picture">
						</div>
					</div>
				</div>

				<br>

				<?php
				$type = 'preschool';
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