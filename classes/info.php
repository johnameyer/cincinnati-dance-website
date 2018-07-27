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
							<p><?php echo $result["Full"]; ?></p>
							<dl>
								<dt>Notes</dt>
								<dd>
									<?php echo $result["Notes"]; ?>
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
						</div>
						<div class="col-md-4">
							<div class="card">
								<img src='<?php echo $result["Image"]; ?>' class="card-img-top" alt="picture">
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