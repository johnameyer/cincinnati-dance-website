<?php
set_include_path('../');

$return = isset($_REQUEST["return"]) ? urldecode($_REQUEST["return"]) : "/";

$page = 'Sign In or Register';
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
					<form method="POST">
						<h2>Sign Up</h2>

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
							<label for="relationship" class="col-4 col-form-label">Relationship to student(s)</label> 
							<div class="col-8">
								<input id="relationship" name="relationship" placeholder="Mother" type="text" aria-describedby="relationshipHelpBlock" class="form-control here"> 
								<span id="relationshipHelpBlock" class="form-text text-muted">help</span>
							</div>
						</div>
						<div class="form-group row">
							<label for="address" class="col-4 col-form-label">Address</label> 
							<div class="col-8">
								<input id="address" name="address" type="text" required="required" class="form-control here">
							</div>
						</div>
						<div class="form-group row">
							<label for="city" class="col-4 col-form-label">City</label> 
							<div class="col-8">
								<input id="city" name="city" type="text" required="required" class="form-control here">
							</div>
						</div>
						<div class="form-group row">
							<label for="state" class="col-4 col-form-label">State</label> 
							<div class="col-8">
								<input id="state" name="state" type="text" required="required" class="form-control here">
							</div>
						</div>
						<div class="form-group row">
							<label for="zip" class="col-4 col-form-label">Zipcode</label> 
							<div class="col-8">
								<input id="zip" name="zip" type="text" required="required" class="form-control here">
							</div>
						</div>
						<div class="form-group row">
							<label for="contact-phone" class="col-4 col-form-label">Contact Phone Number</label> 
							<div class="col-8">
								<input id="contact-phone" name="contact-phone" placeholder="555-5555" type="tel" aria-describedby="contact-phoneHelpBlock" required="required" class="form-control here"> 
								<span id="contact-phoneHelpBlock" class="form-text text-muted">Number to call with important info; for example, to notify of a class cancellation</span>
							</div>
						</div>
						<div class="form-group row">
							<label for="emergency-phone" class="col-4 col-form-label">Emergency Phone Number</label> 
							<div class="col-8">
								<input id="emergency-phone" name="emergency-phone" placeholder="555-5555" type="tel" aria-describedby="emergency-phoneHelpBlock" required="required" class="form-control here"> 
								<span id="emergency-phoneHelpBlock" class="form-text text-muted">To be used in case of emergency if we can’t reach you at your contact phone</span>
							</div>
						</div>
						<div class="form-group row">
							<label for="email" class="col-4 col-form-label">Email Address</label> 
							<div class="col-8">
								<input id="email" name="email" type="email" aria-describedby="emailHelpBlock" required="required" class="form-control here"> 
								<span id="emailHelpBlock" class="form-text text-muted">To access your account, as well as for announcements and scheduling changes such as snow days</span>
							</div>
						</div>
						<div class="form-group row">
							<label for="password" class="col-4 col-form-label">Password</label> 
							<div class="col-8">
								<input id="password" name="password" type="password" required="required" class="form-control here">
							</div>
						</div>
						<div class="form-group row">
							<label for="verify-password" class="col-4 col-form-label">Confirm Password</label> 
							<div class="col-8">
								<input id="verify-password" name="verify-password" type="password" required="required" class="form-control here">
							</div>
						</div> 
						<input type="hidden" id="return" name="return" value="<?php echo urlencode($return); ?>">

						<div class="form-group row">
							<div class="offset-4 col-8">
								<button name="submit" type="submit" class="btn btn-primary">Sign Up</button>
							</div>
						</div>
						<div id="sign-up-msg" class="text-danger"></div>
					</form>

					<a id="to-sign-in" class="text-secondary">If you already have an account, click here</a>
				</div>
			</div>
		</dl>
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
				relationship: {
					alpha: true
				},
				address: {
					minlength: 2
				},
				city: {
					minlength: 2
				},
				state: {
					minlength: 2
				},
				zip: {
					number: true
				},
				"contact-phone": {
					phone: true
				},
				"emergency-phone": {
					phone: true
				},
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 8
				},
				"verify-password": {
					required: true,
					equalTo: "#password"
				}
			}
		});
		function submit(){
			console.log();
			$.post("backend/sign-up.php", $("form").serialize(), function(response){
				if(response == "success"){
					window.history.back();
				} else {
					$("#sign-up-msg").text(response);
				}
			});
		};
	});
</script>
</body>

</html>