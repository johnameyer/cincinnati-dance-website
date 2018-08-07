<?php
set_include_path('../');

include_once('includes/validate.php');

$page = 'Sign In or Register';
?>
<!doctype html>
<html lang="en">

<head>
	<?php include_once 'includes/head.php'; ?>

	<link rel="stylesheet" href="css/carousel.css">
	<link rel="stylesheet" href="css/awards.css">
	<link rel="stylesheet" href="css/actioncalls.css">
	<style type="text/css">
	.body-inner .btn-secondary {
		margin: 0px 5px;
	}
</style>
</head>

<body>
	<?php include_once 'includes/menu.php'; ?>

	<?php include_once 'includes/header-image.php'; ?>

	<div class="drop-up">
		<div class="container-fluid body-container">
			<div class="body-inner">
				<div class="justify-content-md-center">
					<br>
					<h2>Reset Your Password</h2>
					<p>Your password has been reset and now needs to be changed. Please enter your new password below:</p>
					<form method="POST">
						<div class="form-group row">
							<label for="password" class="col-4 col-form-label">Password</label> 
							<div class="col-8">
								<input id="password" name="password" type="password" required="required" class="form-control here">
							</div>
						</div>

						<div class="form-group row">
							<label for="verify-password" class="col-4 col-form-label">Verify Password</label> 
							<div class="col-8">
								<input id="verify-password" name="verify-password" type="password" required="required" class="form-control here">
							</div>
						</div>

						<div class="form-group row">
							<div class="offset-4 col-8">
								<button name="submit" type="submit" class="btn btn-primary">Sign In</button>
							</div>
						</div>

						<div id="reset-msg" class="text-danger"></div>
					</form>
				</div>

			</div>
		</dl>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>
<script type="text/javascript">
	$(function(){
		$("form").validate({
			submitHandler: submit,
			rules: {
				"sign-in-password": {
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
			$('button[name=submit]').attr('disabled', 'disabled');
			$.post("backend/reset-password.php", $("form").serialize(), function(response){
				if(response == "success"){
					window.history.back();
				} else {
					$('button[name=submit]').removeAttr('disabled');
					$("#reset-msg").text(response);
				}
			});
		}
	});
</script>
</body>
</html>