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
</head>

<body>
	<?php include_once 'includes/menu.php'; ?>

	<?php include_once 'includes/header-image.php'; ?>

	<div class="drop-up">
		<div class="container-fluid body-container">
			<div class="body-inner">
				<div class="justify-content-md-center">
					<br>
					<form>
						<div class="form-group row">
							<label for="email" class="col-4 col-form-label">Email Address</label> 
							<div class="col-4">
								<input id="email" name="email" type="email" required="required" class="form-control here"> 
							</div>
							<div class="col-4">
								<button id="forgot-password" class="btn btn-primary">Reset password</button>
							</div>
						</div>
					</form>
				<br>
				<br>
				<p>
					When you click the button, your old password will be invalidated and we will send you a new password and instructions.
				</p>
				<p id="forgot-msg">
				</p>
				<br>
			</div>
		</div>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>

<script type="text/javascript">
	$(function(){
		$("form").validate({
			submitHandler: submit,
			rules: {
				"email": {
					required: true,
					email: true
				}
			}
		});
		function submit(){
			$('#forgot-password').attr('disabled','disabled');
			$('#forgot-msg').removeClass(['text-success', 'text-danger']).text('');
			$.post('backend/forgot-password.php', {email: $("#email").val()}, function(response){
				if(response == "success"){
					$("forgot-msg").addClass('text-success').text('Email sent');
				} else {
					$('#forgot-password').removeAttr('disabled');
					$("#forgot-msg").addClass('text-danger').text(response);
				}
			});
			return false;
		};
	});
</script>

</body>
</html>