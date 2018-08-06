<?php
set_include_path('../');
$page = "Tuition/Fees";
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
					<div class="row justify-content-md-center">
						<div class="col-md-10 col-md-offset-1">
							<?php
							$path = array(array("name" => "Student"));
							include_once 'includes/breadcrumb.php';
							?>

							<h1>2018-2019 Tuition and Payment Policies</h1>
							<br>
							<p class="lead">Quick Reference for Monthly Tuition Payment (When calculating Multiple Class Discount, please start with longest class first.)</p>
							<div class="table-responsive" style="margin:auto; display:block;">
								<table class="table">
									<thead>
										<th scope="col">Classes Per Week</th>
										<th scope="col">30 Minute Class</th>
										<th scope="col">45 Minute Class</th>
										<th scope="col">60 Minute Class</th>
										<th scope="col">75 Minute Class</th>
									</thead>
									<tbody>
										<tr><td>1st Class</td><td>$40.00</td><td>$47.00</td><td>$54.00</td><td>$60.00</td></tr>
										<tr><td>2nd Class</td><td>$36.00</td><td>$42.30</td><td>$48.60</td><td>$54.00</td></tr>									
										<tr><td>3rd Class</td> <td>$32.00</td> <td>$37.60</td> <td>$43.20</td> <td>$48.00</td></tr>
										<tr><td>4th Class</td> <td>$28.00</td> <td>$32.90</td> <td>$37.80</td> <td>$42.00</td></tr>
										<tr><td>5th Class</td>  <td>$24.00</td> <td>$28.20</td> <td>$32.40</td> <td>$36.00</td></tr>
										<tr><td>6th or More</td> <td>$20.00</td> <td>$23.50</td> <td>$27.00</td> <td>$30.00</td></tr>
										<tr><td colspan="5"></td></tr>
									</tbody>
								</table>
							</div>
							<h5>Registration Fee:</h5>
							<p>
								There is one $25 registration fee per student due at the time of registering for class. If a student pays
								more than one $25 registration fee online while registering for multiple classes (a $25 registration fee is required online for each
								class), the additional registration fee payments will be credited to the student’s tuition. In other words, if a student registers for
								four classes online and pays four $25 registration fees for a total of $100, $75 of that payment will be applied to tution.
							</p>
							<h5>Pay-In-Advance Discount:</h5>
							<p>Students who pre-pay their entire tuition one month in advance of the September start date
								also receive an additional 10% discount on top of any other discounts.
							</p>
							<hr>
							<h5 style="text-align:center"> Additional discounts and expenses are listed <a href="data/payment_policies.pdf" target="_blank">here.</a></h5>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include_once 'includes/footer.php'; ?>

		<?php include_once 'includes/javascript.php'; ?>
	</body>

</html>