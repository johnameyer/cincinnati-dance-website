<?php
set_include_path('../');

include_once('includes/validate.php');
include_once('includes/db.php');
include_once('includes/session.php');

$return = isset($_REQUEST["return"]) ? urldecode($_REQUEST["return"]) : "/";

if(isset($_REQUEST['email'])){ //new user just registered
	$email = validate_email($_REQUEST['email']);
	if($_REQUEST['password'] !== $_REQUEST['verify-password']){
		$error = 'Passwords do not match';
	}
	if(!isset($error)){

		$conn->begin_transaction();

		$options = ['cost' => 12];
		$password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT, $options);

		$query = $conn->prepare("INSERT INTO `user` (email, password) VALUES (?,?)");
		$query->bind_param('ss', $_REQUEST['email'], $password);//TODO form validation
		$query->execute();
		echo $conn->error;

		$foreign_key = $conn->insert_id;


		$query = $conn->prepare("INSERT INTO `contact` (`user`, `fname`, `lname`, `relationship`, `address`, `city`, `state`, `zip`, `contact_phone`, `emergency_phone`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
		$query->bind_param('issssssiss', $foreign_key, $_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST['relationship'], $_REQUEST['address'], $_REQUEST['city'], $_REQUEST['state'], $_REQUEST['zip'], $_REQUEST['contact-phone'], $_REQUEST['emergency-phone']);//TODO form validation
		$query->execute();
		echo $conn->error;

		$conn->commit();
		$conn->close();

		if(isset($foreign_key)){
			$_SESSION['id'] = $foreign_key;
			$_SESSION['email'] = $_REQUEST['email']; //TODO support return field
			header("Location: " . (getenv('CINCI_DANCE_BASE') ?: '/'));
			exit();
		}
	}
} else if(isset($_REQUEST["sign-in-email"])){ //user just signed in
	//TODO
	$email = $_REQUEST['sign-in-email'];
	$query = "SELECT contact.id, user.password FROM (contact INNER JOIN user ON contact.user=user.id) WHERE user.email='$email'";

	$result = mysqli_query($conn, $query);
	if ($result && mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		if(password_verify($_REQUEST['sign-in-password'], $row['password'])){
			$id = $row['id'];
		}
		$result->close();
	}

	if(isset($id)){
		$_SESSION['id'] = $id;
		$_SESSION['email'] = $email; //TODO support return field
		header("Location: " . (getenv('CINCI_DANCE_BASE') ?: '/'));
		exit();
	}
}

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
						<input type="hidden" id="sign-in-return" name="sign-in-return" value="<?php echo urlencode($return); ?>">

						<div class="form-group row">
							<div class="offset-4 col-8">
								<button name="submit" type="submit" class="btn btn-primary">Sign In</button>
							</div>
						</div>

						<div id="sign-in-msg" class="text-danger"></div>
					</form>
					<a id="to-sign-up" class="text-secondary">If you don't have an account, click here</a>
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
			window.location.replace("sign-up.php");
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
			console.log();
			$.post("backend/sign-in.php", $("form").serialize(), function(response){
				if(response == "success"){
					window.history.back();
				} else {
					$("#sign-in-msg").text(response);
				}
			});
		};
	});
</script>
</body>

</html>