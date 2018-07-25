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

					<!-- insert tabs here -->
					<ul class="nav nav-tabs" id="signin-signup" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="sign-in-tab" data-toggle="tab" href="#sign-in" role="tab" aria-controls="sign-in" aria-selected="true">Sign In</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="sign-up-tab" data-toggle="tab" href="#sign-up" role="tab" aria-controls="sign-up" aria-selected="false">Sign Up</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="sign-in" role="tabpanel" aria-labelledby="sign-in-tab">
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
							</form>
						</div>
						<div class="tab-pane fade" id="sign-up" role="tabpanel" aria-labelledby="sign-up-tab">
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
							</form>
						</div>
					</div>
					
				</dl>
			</div>
		</div>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>
</body>

</html>