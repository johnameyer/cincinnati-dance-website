<?php
set_include_path('../');

include_once 'includes/session.php';

if(!isset($_SESSION['contact-id'])){
	header("Location: " . (getenv('CINCI_DANCE_BASE') ?: '/'));
	exit();
}

$page = 'Register a New Student';
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

					<form method="POST">
						<div class="form-group row">
							<label for="fname" class="col-4 col-form-label">First Name</label> 
							<div class="col-8">
								<input id="fname" name="fname" placeholder="Jane" type="text" required="required" class="form-control here">
							</div>
						</div>
						<div class="form-group row">
							<label for="lname" class="col-4 col-form-label">Last Name</label> 
							<div class="col-8">
								<input id="lname" name="lname" placeholder="Doe" type="text" required="required" class="form-control here">
							</div>
						</div>
						<div class="form-group row">
							<label for="birth" class="col-4 col-form-label">Date of Birth</label> 
							<div class="col-8">
								<input id="birth" name="birth" placeholder="2001-12-31" type="text" class="form-control here" required="required">
							</div>
						</div>
						<div class="form-group row">
							<label for="school-district" class="col-4 col-form-label">School / District (if minor)</label> 
							<div class="col-8">
								<input id="school-district" name="school-district" type="text" class="form-control here">
							</div>
						</div>
						<div class="form-group row">
							<label for="medical" class="col-4 col-form-label">Pertinent Medical Information</label> 
							<div class="col-8">
								<textarea id="medical" name="medical" cols="40" rows="5" class="form-control"></textarea>
							</div>
						</div> 
						<!--div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div-->
						<div class="form-group row">
							<div class="offset-4 col-8">
								<button name="submit" type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
						<div id="new-student-msg" class="text-danger"></div>
					</form>
				</dl>
			</div>
		</div>
	</div>
</div>
<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>

<script type="text/javascript">
	$(function(){
		$("#to-sign-in").click(function(){
			window.location.replace("sign-in.php");
		});
		$("form").validate({
			submitHandler: submit,
			rules: {
				fname: {
					required: true,
					alpha: true
				},
				lname: {
					required: true,
					alpha: true
				},
				birth: {
					required: true,
					date: true
				},
				"school-district": {
					required: true,
					minlength: 2
				}
			}
		});
		function submit(){
			console.log();
			$.post("backend/new-student.php", $("form").serialize(), function(response){
				if(response == "failure"){
					$("#new-student-msg").text(response);
				} else {
					window.history.back();
				}
			});
		};
	});
</script>
</body>

</html>