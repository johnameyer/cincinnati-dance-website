<?php
$my_file = 'file.log';
$handle = fopen($my_file, 'a') or die('Cannot open file:  '.$my_file);

fwrite($handle, "Notify:" . json_encode($_REQUEST) . "\n");
?>
<?php
// STEP 1: read POST data
// Reading POSTed data directly from $_POST causes serialization issues with array data in the POST.
// Instead, read raw POST data from the input stream.
$raw_post_data = file_get_contents('php://input');
$raw_post_array = explode('&', $raw_post_data);
$myPost = array();
foreach ($raw_post_array as $keyval) {
	$keyval = explode ('=', $keyval);
	if (count($keyval) == 2)
		$myPost[$keyval[0]] = urldecode($keyval[1]);
}
// read the IPN message sent from PayPal and prepend 'cmd=_notify-validate'
$req = 'cmd=_notify-validate';
if (function_exists('get_magic_quotes_gpc')) {
	$get_magic_quotes_exists = true;
}
foreach ($myPost as $key => $value) {
	if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
		$value = urlencode(stripslashes($value));
	} else {
		$value = urlencode($value);
	}
	$req .= "&$key=$value";
}

// Step 2: POST IPN data back to PayPal to validate
$ch = curl_init('https://ipnpb.sandbox.paypal.com/cgi-bin/webscr');
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
// In wamp-like environments that do not come bundled with root authority certificates,
// please download 'cacert.pem' from "https://curl.haxx.se/docs/caextract.html" and set
// the directory path of the certificate as shown below:
// curl_setopt($ch, CURLOPT_CAINFO, dirname(__FILE__) . '/cacert.pem');
if ( !($res = curl_exec($ch)) ) {
	error_log("Got " . curl_error($ch) . " when processing IPN data");
	curl_close($ch);
	exit;
}
curl_close($ch);
?>
<?php
// inspect IPN validation result and act accordingly
if (strcmp ($res, "VERIFIED") == 0) {
  // The IPN is verified, process it:
  // check whether the payment_status is Completed
  // check that txn_id has not been previously processed
  // check that receiver_email is your Primary PayPal email
  // check that payment_amount/payment_currency are correct
  // process the notification
  // assign posted variables to local variables
	set_include_path('../');
	include_once('includes/db.php');

	$item_name = $_POST['item_name'];
	$item_number = $_POST['item_number'];
	$payment_status = $_POST['payment_status'];
	$payment_amount = $_POST['mc_gross'];
	$payment_currency = $_POST['mc_currency'];
	$txn_id = $_POST['txn_id'];
	$receiver_email = $_POST['receiver_email'];
	$payer_email = $_POST['payer_email'];

	$contact_id = $_POST['custom'];
  // IPN message values depend upon the type of notification sent.
  // To loop through the &_POST array and print the NV pairs to the screen:
	if(strcmp($receiver_email,"cincinnatidanceandmovement-facilitator@gmail.com")!=0 && strcmp($receiver_email, "cincinnatidanceandmovement@gmail.com")!=0){
		exit();
	}

	$in_table = getPaymentByTransaction($txn_id);

	$payment_amount = floatval($payment_amount);
	$number_paid_for = intval($payment_amount / 25);

	$payment_id = -1;

	if(!$in_table) {
		$query = "INSERT INTO `payment` (transaction_id, number_paid_for, amount_paid, status) VALUES (?, ?, ?, ?)";
		$query = $conn->prepare($query);
		$query->bind_param('siss', $txn_id, $number_paid_for, $payment_amount, $payment_status);//TODO form validation
		$query->execute();

		$payment_id = $conn->insert_id;
	} else {
		$query = "UPDATE `payment` SET number_paid_for=?, amount_paid=?, status=? WHERE transaction_id=?";
		$query = $conn->prepare($query);
		$query->bind_param('isss', $number_paid_for, $payment_amount, $payment_status, $txn_id);//TODO form validation
		$query->execute();

		$query = "SELECT id FROM payment WHERE transaction_id='$txn_id'";

		$result = $conn->query($query);
		if ($result && mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			$payment_id = $row['id'];
		}

	}

	if($in_table['status'] != 'Completed' && $payment_status == 'Completed'){
		$query = "UPDATE student_class SET payment=? WHERE student_class.id IN ( SELECT id FROM (SELECT student_class.id FROM `student_class` INNER JOIN `student` ON student_class.student=student.id WHERE student.contact=? ORDER BY id ASC LIMIT ? ) tmp );";
		$query = $conn->prepare($query);
		$query->bind_param('iii', $payment_id, $contact_id, $number_paid_for);//TODO form validation
		$query->execute();

		
	}

} else if (strcmp($res, "INVALID") == 0) {
  // IPN invalid, log for manual investigation
	echo "The response from IPN was: <b>" .$res ."</b>";
}
?>