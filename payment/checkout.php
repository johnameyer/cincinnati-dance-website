<?php
set_include_path('../');

include_once 'includes/db.php';
include_once 'includes/session.php';

$classes = array();

if(isset($_SESSION['email'])){
	$email = $_SESSION['email'];
	$query = "SELECT student.fname, student.lname, student_class.class FROM (`contact` INNER JOIN `user` ON contact.user=user.id INNER JOIN `student` ON student.contact=contact.id INNER JOIN `student_class` ON student.id=student_class.student) WHERE user.email='$email'";

	$result = mysqli_query($conn, $query);
	if ($result && mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			array_push($classes, $row);
		}
		$result->close();
	}
}

$page = "Checkout";
?>

<?php foreach($classes as $class){
	var_dump($class);
}
?>


<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="item_name" value="Class Registration">
	<input type="hidden" name="quantity" value="<?php echo count($classes); ?>">
	<input type="hidden" name="hosted_button_id" value="2QX8BND8KZ55C">
	<input type="image" src="https://www.sandbox.paypal.com/en_US/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.sandbox.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>