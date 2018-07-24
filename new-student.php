<?php
set_include_path('../');

include_once 'includes/db.php';

if(isset($_REQUEST['name'])){ //was redirected here from new-account
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
} else {
	$email = "jack10042@gmail.com";
	$query = "SELECT contact.id FROM (contact INNER JOIN user ON contact.user=user.id) WHERE user.email='$email'";

	$result = mysqli_query($conn, $query);
	if ($result && mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$foreign_key = $row['id'];
		$result->close();
	}
}

if(!isset($foreign_key)){
	//redirect
}

$type = urldecode($_GET["type"]);
$class = urldecode($_GET["class"]);

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

					<form action="classes/register.php">
						<div class="form-group row">
							<label for="name" class="col-4 col-form-label">Name</label> 
							<div class="col-8">
								<input id="name" name="name" placeholder="Jane Doe" type="text" required="required" class="form-control here">
							</div>
						</div>
						<div class="form-group row">
							<label for="birth" class="col-4 col-form-label">Date of Birth</label> 
							<div class="col-8">
								<input id="birth" name="birth" type="text" class="form-control here" required="required">
							</div>
						</div>
						<div class="form-group row">
							<label for="age" class="col-4 col-form-label">Age</label> 
							<div class="col-8">
								<input id="age" name="age" type="text" required="required" class="form-control here">
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

						<input type="hidden" id="type" name="type" value="<?php echo $type; ?>">
						<input type="hidden" id="class" name="class" value="<?php echo $class; ?>">
						<input type="hidden" id="user" name="user" value="<?php echo $foreign_key; ?>">
						<!--div class="form-group">
							<label for="exampleInputPassword1">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
						</div-->
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