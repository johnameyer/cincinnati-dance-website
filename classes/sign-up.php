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
					<h2>Sign up Student</h2>

					<form action="classes/register.php">
						<div class="form-group">
							<label for="fname">First Name</label>
							<input type="text" class="form-control" id="fname" placeholder="Bob">
						</div>
						<div class="form-group">
							<label for="lname">Last Name</label>
							<input type="text" class="form-control" id="lname" placeholder="Jones">
						</div>
						<input type="hidden" id="type" name="type" value="<?php echo $type; ?>">
						<input type="hidden" id="class" name="class" value="<?php echo $result["Nice name"]; ?>">
						<!--div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div-->
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</dl>
			</div>
		</div>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>
</body>

</html>