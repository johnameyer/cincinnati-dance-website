<?php

ini_set('display_errors', '1');

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "cinci_dance";

//Create connection
$conn = new MySQLi($servername, $username, $password, $dbname,3306);

if (!$conn) {
	echo "Error: Unable to connect to MySQL." . PHP_EOL;
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	exit;
}

/*
$query="select form,reps,weight,date,user.name as user,machine.name as machine from (session left outer join user on session.user=user.id left outer join machine on session.machine=machine.id) ORDER BY date DESC;";

$result = mysqli_query($conn, $query);
if ($result && mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    }
$result->close();
}

$query = $conn->prepare("INSERT INTO `test`.`session`(form,reps,machine,user,weight) VALUES (?,?,?,?,?)");
$a=$_REQUEST['goodform']=='1'?0:1;
$query->bind_param('iiiii',$a,$_REQUEST['reps'],$_REQUEST['machine'],$_REQUEST['user'],$_REQUEST['weight']);
$query->execute();
echo $conn->error;

$conn->close();
?>
</table>
</div>
*/
function checkForPaymentDuplicate($txn_id){
	$servername = "127.0.0.1";
	$username = "root";
	$password = "";
	$dbname = "cinci_dance";

	$conn = new MySQLi($servername, $username, $password, $dbname,3306);

	if (!$conn) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}

	$query = "SELECT id from `payment` WHERE transaction_id='$txn_id'";

	$result = mysqli_query($conn, $query);
	
	$conn->close();
	if ($result && mysqli_num_rows($result) > 0) {
		$result->close();
		return true;
	}
	return false;
}
?>