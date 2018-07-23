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

$page = 'Registering for ' . $result["Name"];
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

					
				</dl>
			</div>
		</div>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>
</body>

</html>