<?php
set_include_path('../');

include_once 'includes/db.php';
include_once 'includes/session.php';
require_once 'includes/login-check.php';

$class = getClassById($_REQUEST['class']);

$students = array();

if(isset($_SESSION['contact-id'])){
	$contact_id = $_SESSION['contact-id'];
	$class_id = $class['id'];
	$students = getStudentsByContactWithClassStatus($contact_id, $class_id);
}

$page = "Register for " . $class["name"];
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
					<h2><?php echo $class["name"]; ?></h2>

					<p>Select students to register for this class:</p>
					<?php foreach ($students as $student): ?>
						<div class="form-check">
							<input <?php echo $student['in_class'] ? 'disabled' : ''; ?> class="form-check-input student" type="checkbox" value="" name="<?php echo $student['fname']; ?>" id="student-<?php echo $student['id']; ?>">
							<label class="form-check-label" for="student-<?php echo $student['id']; ?>">
								<?php echo $student['fname']; ?> <?php echo $student['lname']; ?> <?php echo $student['in_class'] ? '(Already registered for this)' : ''; ?>
							</label>
						</div>
					<?php endforeach; ?>

					<br>

					<a class="btn btn-secondary" href="classes/new-student.php">Add a new student</a>
					<?php if($students): ?>
						<br>
						<br>
						<button class="btn btn-primary" onclick="addToCart('checkout')">Register and checkout</button>
						<button class="btn btn-primary" onclick="addToCart('')">Register and continue browsing</button>
					<?php endif ?>
					<div id="register-msg" class="text-danger"></div>
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
			if(i == 0){
				$('#register-msg').text('Please select one student to register');
			}
			$('input.student:checked').each(function(){
				$.post('backend/add-to-cart.php', {class: "<?php echo $class['id']; ?>", student: $(this).attr('id').replace('student-', '')}, function(response){
					if(response == "success"){

					} else {
						console.log("error");
						$('#register-msg').text($('#register-msg').text() + "," + response);
					}
					completed();
				});
			});
		}
	});
</script>
</body>

</html>