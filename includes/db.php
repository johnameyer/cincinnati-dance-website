<?php

ini_set('display_errors', '1');

function connect(){
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
	return $conn;
}



function getById($id) {
	$conn = connect();
	$query = "SELECT * FROM `class` WHERE id='$id';";
	$sql_result = mysqli_query($conn, $query);
	$result = NULL;
	if ($sql_result && mysqli_num_rows($sql_result) > 0) {
		$result = mysqli_fetch_assoc($sql_result);
		$result = array_merge($result,getClassContent($id));
		$sql_result->close();
	}
	$conn->close();
	return $result;
}

function getByType($type) {
	$conn = connect();
	$query = "SELECT * FROM `class` WHERE type='$type';";
	$sql_result = mysqli_query($conn, $query);
	$result = array();
	if ($sql_result && mysqli_num_rows($sql_result) > 0) {
		while($row = mysqli_fetch_assoc($sql_result)) {
			$row = array_merge($row,getClassContent($row["id"]));
			array_push($result, $row);
		}
		$sql_result->close();
	}
	$conn->close();
	return $result;
}

function getClassContent($id){
	return json_decode(file_get_contents("../data/class/$id.json"), true);
}

$conn = connect();


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
?>