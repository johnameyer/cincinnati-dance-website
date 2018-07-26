<?php
set_include_path('../');

include_once('includes/db.php');
include_once('includes/session.php');

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


if(isset($_REQUEST['student'])){
	$student = $_REQUEST['student'];
	$email = $_SESSION['email'];
	$query = "SELECT student.id, student.fname, student.lname FROM (`contact` INNER JOIN `user` ON contact.user=user.id INNER JOIN `student` ON student.contact=contact.id) WHERE user.email='$email' AND student.id='$student'";

	$sql_result = mysqli_query($conn, $query);
	if ($sql_result && mysqli_num_rows($sql_result) > 0) {
		if($row = mysqli_fetch_assoc($sql_result)) {
			$student = $row;
		}
		$sql_result->close();
	}
}

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

					<h3>Register <?php echo $student['fname']; ?></h3>

					<p>Actual one:</p>

					<form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="hosted_button_id" value="52AQN8DDER4GA">
						<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>

					<p>Test add to their cart:</p>

					<form target="paypal" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
						<input type="hidden" name="cmd" value="_s-xclick">
						<input type="hidden" name="item_name" value="<?php echo $result["Name"]; ?> Registration">
						<input type="hidden" name="hosted_button_id" value="YEYWTNVE7JD8J">
						<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
						<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
					</form>

					<p>Test add to our cart:</p>

					<button class="btn-primary" onclick="addToCart()">Register for <?php echo $result["Name"]; ?></button>

				</div>
			</div>
		</div>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>
<script type="text/javascript">
	addToCart = function(){};
	$(function(){
		addToCart = function(){
			$.post('backend/add-to-cart.php', {class: "<?php echo $class; ?>", type: "<?php echo $type; ?>", student: "<?php echo $student['id']; ?>"}, function(response){
				if(response == "success"){
					window.location.href = "payment/checkout.php";
				} else {
					console.log("error");
				}
			});
		}
	});
</script>
</body>

</html>