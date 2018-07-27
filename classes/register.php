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

$students = array();

if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
	$query = "SELECT student.id, student.fname, student.lname FROM (`contact` INNER JOIN `user` ON contact.user=user.id INNER JOIN `student` ON student.contact=contact.id) WHERE user.email='$email'";

	$sql_result = mysqli_query($conn, $query);
	if ($sql_result && mysqli_num_rows($sql_result) > 0) {
		while($row = mysqli_fetch_assoc($sql_result)) {
			array_push($students, $row);
		}
		$sql_result->close();
	}
}

$page = "Register for " . $result["Name"];
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

					<p>Select students to register for this class:</p>
					<?php foreach ($students as $student): ?>
						<div class="form-check">
							<input class="form-check-input student" type="checkbox" value="" name="<?php echo $student['fname']; ?>" id="student-<?php echo $student['id']; ?>">
							<label class="form-check-label" for="student-<?php echo $student['id']; ?>">
								<?php echo $student['fname']; ?> <?php echo $student['lname']; ?>
							</label>
						</div>
					<?php endforeach; ?>

					<br>

					<a href="classes/new-student.php">Add a new student</a>
					<br>
					<button class="btn btn-primary" onclick="addToCart('checkout')">Register and checkout</button>
					<button class="btn btn-primary" onclick="addToCart()">Register and continue browsing</button>
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
		addToCart = function(destination){
			error = {};
			i = 0;
			completed = function(){
				if(i-- > 0 && JSON.stringify(error).length == 2){
					switch(destination){
						case 'checkout':
						window.location.href = "payment/checkout.php";
						break;
						default:
						window.history.back();
					}
				}
			}
			i = $('input.student:checked').length;
			$('input.student:checked').each(function(){
				$.post('backend/add-to-cart.php', {class: "<?php echo $class; ?>", type: "<?php echo $type; ?>", student: $(this).attr('id').replace('student-', '')}, function(response){
					if(response == "success"){

					} else {
						console.log("error");
						error[$(this).attr('name')] = response;
					}
					completed();
				});
			});
		}
	});
</script>
</body>

</html>