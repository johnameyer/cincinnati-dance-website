<?php
set_include_path('../');

$return = isset($_REQUEST["return"]) ? urldecode($_REQUEST["return"]) : "/";

if(isset($_REQUEST['name'])){ //new user just registered
	$options = ['cost' => 12];
	$password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT, $options);

	$query = $conn->prepare("INSERT INTO `user` (email, password) VALUES (?,?)");
	$query->bind_param('ss', $_REQUEST['email'], $password);//TODO form validation
	$query->execute();
	echo $conn->error;

	$foreign_key = $conn->insert_id;


	$query = $conn->prepare("INSERT INTO `contact` (`user`, `name`, `relationship`, `address`, `city`, `state`, `zip`, `contact_phone`, `emergency_phone`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);");
	$query->bind_param('isssssiss', $foreign_key, $_REQUEST['name'], $_REQUEST['relationship'], $_REQUEST['address'], $_REQUEST['city'], $_REQUEST['state'], $_REQUEST['zip'], $_REQUEST['contact-phone'], $_REQUEST['emergency-phone']);//TODO form validation
	$query->execute();
	echo $conn->error;

	$conn->close();

	//set session & redirect
} else if(isset($_REQUEST["email"])){ //user just signed in
	//TODO

	//set session and redirect
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
					<h2><?php echo $page ?></h2>

					<!-- insert tabs here -->
					<form>
						<div class="form-group row">
							<label for="name" class="col-4 col-form-label">Name</label> 
							<div class="col-8">
								<input id="name" name="name" placeholder="Jane Doe" type="text" required="required" class="form-control here">
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
								<button name="submit" type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
					</form>
				</dl>
			</div>
		</div>
	</div>
</div>

<?php include_once 'includes/footer.php'; ?>

<?php include_once 'includes/javascript.php'; ?>
</body>

</html>