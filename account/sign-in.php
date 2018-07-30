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
</head>

<body>
	<?php include_once 'includes/menu.php'; ?>

	<?php include_once 'includes/header-image.php'; ?>

	<div class="drop-up">
		<div class="container-fluid body-container">
			<div class="body-inner">
				<div class="justify-content-md-center">
					<h2>Sign In</h2>
					<form method="POST">
						<div class="form-group row">
							<label for="sign-in-email" class="col-4 col-form-label">Email Address</label> 
							<div class="col-8">
								<input id="sign-in-email" name="sign-in-email" type="email" required="required" class="form-control here"> 
							</div>
						</div>
						<div class="form-group row">
							<label for="sign-in-password" class="col-4 col-form-label">Password</label> 
							<div class="col-8">
								<input id="sign-in-password" name="sign-in-password" type="password" required="required" class="form-control here">
							</div>
						</div>

						<div class="form-group row">
							<div class="offset-4 col-8">
								<button name="submit" type="submit" class="btn btn-primary">Sign In</button>
							</div>
						</div>

						<div id="sign-in-msg" class="text-danger"></div>
					</form>
					<a id="to-sign-up" class="text-primary">If you don't have an account, click here</a>
				</div>

			</div>
		</dl>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>
<script type="text/javascript">
	$(function(){
		$("#to-sign-up").click(function(){
			window.location.replace("account/sign-up.php");
		});
		$("form").validate({
			submitHandler: submit,
			rules: {
				"sign-in-email": {
					required: true,
					email: true
				},
				"sign-in-password": {
					required: true,
					minlength: 8
				}
			}
		});
		function submit(){
			$('button[name=submit]').attr('disabled','true');
			$.post("backend/sign-in.php", $("form").serialize(), function(response){
				if(response == "success"){
					window.history.back();
				} else {
					$('button[name=submit]').removeAttr('disabled');
					$("#sign-in-msg").text(response);
				}
			});
		};
	});
</script>
</body>

</html>