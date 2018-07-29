<?php
//TODO use bindParams for all
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
	$sql_result = $conn->query($query);
	$result = NULL;
	if ($sql_result && mysqli_num_rows($sql_result) > 0) {
		$result = mysqli_fetch_assoc($sql_result);
		$result = array_merge($result, getClassContent($id));
		$sql_result->close();
	}
	$conn->close();
	return $result;
}

function getByType($type) {
	$conn = connect();
	$query = "SELECT * FROM `class` WHERE type LIKE'%$type%';";
	$sql_result = $conn->query($query);
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

function checkForPaymentDuplicate($txn_id){//TODO just be a return transaction and use truthy value as indicating duplication

	$conn = connect();

	if (!$conn) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}

	$query = "SELECT id from `payment` WHERE transaction_id='$txn_id'";

	$result = $conn->query($query);
	
	$conn->close();
	if ($result && mysqli_num_rows($result) > 0) {
		$result->close();
		return true;
	}
	return false;
}

function getStudentClassesByContact($contact_id){
	$conn = connect();

	$student_classes = array();
	$query = "SELECT student.fname, student.lname, class.name as 'class-name', student_class.has_paid, payment.status FROM (`student` INNER JOIN `student_class` ON student_class.student=student.id INNER JOIN `payment` ON student_class.payment=payment.id INNER JOIN `class` ON student_class.class=class.id) WHERE student.contact='$contact_id'";

	$result = $conn->query($query);
	if ($result && mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			array_push($student_classes, $row);
		}
		$result->close();
	}
	$conn->close();
	return $student_classes;
}

function getStudentsByContact($contact_id){
	$conn = connect();

	$students = array();
	$query = "SELECT student.fname, student.lname, (SELECT COUNT(student_class.id) FROM `student_class` WHERE student_class.student=student.id) AS count FROM `student` WHERE student.contact='$contact_id'";

	$result = $conn->query($query);
	if ($result && mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			array_push($students, $row);
		}
		$result->close();
	}
	$conn->close();
	return $students;
}

function getStudentsByContactWithClassStatus($contact_id, $class_id){
	$conn = connect();

	$query = "SELECT student.id, student.fname, student.lname, (SELECT COUNT(*) FROM `student_class` WHERE student_class.student=student.id AND student_class.class='$class_id') AS in_class FROM `student` WHERE student.contact='$contact_id'";

	$students = array();
	$sql_result = $conn->query($query);
	if ($sql_result && mysqli_num_rows($sql_result) > 0) {
		while($row = mysqli_fetch_assoc($sql_result)) {
			array_push($students, $row);
		}
		$sql_result->close();
	}
	$conn->close();
	return $students;
}

$conn = connect();

?>