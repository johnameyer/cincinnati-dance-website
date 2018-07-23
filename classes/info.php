<?php
set_include_path('../');

$type = urldecode($_GET["type"]);
$class = urldecode($_GET["class"]);
$file = '../data/' . $type . '.csv';
$csv = array_map('str_getcsv', file($file));
array_walk($csv, function(&$a) use ($csv) {
	$a = array_combine($csv[0], $a);
	$a["Nice name"] = preg_replace(array("/[^a-zA-Z\s]/", "/\s\s+/", "/(\s+-\s*|\s*-\s+)/"), array("-", " ", " "), strtolower($a["Name"]));
});
array_shift($csv);
$result = $csv[array_search($class, array_column($csv, 'Nice name'))];

$students = array(array("name"=>"larry"));

$page = $result["Name"];
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
					$path = array(array("name" => "Classes", "path" => "classes/"), array("name" => ucwords($type), "path" => "classes/" . $type));
					include_once 'includes/breadcrumb.php';
					?>
					<h2><?php echo $result["Name"]; ?></h2>

					<div class="row">
						<div class="col-md-8">
							<p><?php echo $result["Notes"]; ?></p>
							<dl>
								<dt>Name</dt>
								<dd>
									<?php echo $result["Name"]; ?>
								</dd>
								<dt>Days of Week</dt>
								<dd>
									<?php echo $result["Days"]; ?>
								</dd>
								<dt>Time of Day</dt>
								<dd>
									<?php echo $result["Times"]; ?>
								</dd>
								<dt>Appropiate Ages</dt>
								<dd>
									<?php echo $result["Ages"]; ?>
								</dd>
								<dt>Class starts</dt>
								<dd>
									<?php echo $result["Class starts"]; ?>
								</dd>
								<dt>Class ends</dt>
								<dd>
									<?php echo $result["Class ends"]; ?>
								</dd>
								<dt>Tuition</dt>
								<dd>
									<?php echo $result["Tuition"]; ?>
								</dd>
							</dl>
							<div class="dropdown">
								<a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Register
								</a>

								<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
									<?php foreach ($students as $student): ?>
										<a class="dropdown-item" href="classes/register.php?<?php echo http_build_query(array("type"=>$type, "class"=>$result["Nice name"], "student"=>$student["name"])); ?>">Register <?php echo ucwords($student["name"]); ?></a>
									<?php endforeach; ?>
									<a class="dropdown-item" href="classes/sign-up.php?<?php echo http_build_query(array("type"=>$type, "class"=>$result["Nice name"])); ?>">Register a different student</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="card">
								<img src="img/classes/<?php echo $type; ?>.jpg" class="card-img-top" alt="picture">
							</div>
						</div>
					</div>

					
				</dl>
			</div>
		</div>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>
</body>

</html>