<?php
//TODO use bindParams for all

define('REQUIRED_VARS', TRUE);

@include_once 'vars.php';

function connect(){
	$servername = getenv("MYSQL_SERVER_NAME") ?: "127.0.0.1";
	$username = getenv("MYSQL_USERNAME") ?: "root";
	$password = getenv("MYSQL_PASSWORD") ?: "";
	$dbname =  getenv("MYSQL_SCHEMA_NAME") ?:"cinci_dance";

	//Create connection
	$conn = new MySQLi($servername, $username, $password, $dbname, 3306);

	if (!$conn) {
		echo "Error: Unable to connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}
	return $conn;
}

function getClassById($id) {
	$conn = connect();
	$query = "SELECT * FROM `class` WHERE id='$id';";
	$sql_result = $conn->query($query);
	$result = NULL;
	if ($sql_result && $sql_result->num_rows > 0) {
		$result = $sql_result->fetch_assoc();
		$result = array_merge($result, getClassContent($id));
		$sql_result->close();
	}
	$conn->close();
	return $result;
}

function getClassByType($type) {
	$conn = connect();
	$query = "SELECT * FROM `class` WHERE type LIKE'%$type%' ORDER BY priority ASC, name ASC;";
	$sql_result = $conn->query($query);
	$result = array();
	if ($sql_result && $sql_result->num_rows > 0) {
		while($row = $sql_result->fetch_assoc()) {
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

function getPaymentByTransaction($txn_id){
	$query = "SELECT * FROM `payment` WHERE `transaction_id`='$txn_id'";

	$conn = connect();
	$sql_result = $conn->query($query);

	$result = NULL;
	if ($sql_result && $sql_result->num_rows > 0 && $row = $sql_result->fetch_assoc()) {
		$result = $row;
		$sql_result->close();
	}

	$conn->close();
	return $result;
}

function getUserByEmail($type) {
	$conn = connect();
	$query = "SELECT * FROM `user` WHERE email='$type';";
	$sql_result = $conn->query($query);
	$result = NULL;
	if ($sql_result && $sql_result->num_rows > 0 && $row = $sql_result->fetch_assoc()) {
		$result = $row;
		$sql_result->close();
	}
	$conn->close();
	return $result;
}

function getStudentClassesByContact($contact_id){
	$conn = connect();

	$student_classes = array();
	$query = "SELECT student, class, student.fname, student.lname, class.name as 'class-name', student_class.has_paid, payment.status FROM (`student` INNER JOIN `student_class` ON student_class.student=student.id LEFT JOIN `payment` ON student_class.payment=payment.id INNER JOIN `class` ON student_class.class=class.id) WHERE student.contact='$contact_id'";

	$sql_result = $conn->query($query);
	if ($sql_result && $sql_result->num_rows > 0) {
		while($row = $sql_result->fetch_assoc()) {
			array_push($student_classes, $row);
		}
		$sql_result->close();
	}
	$conn->close();
	return $student_classes;
}

function getUnpaidClassesByContact($contact_id){
	$conn = connect();

	$student_classes = array();
	$query = "SELECT class.name as 'class-name', student_class.has_paid, payment.status FROM (`student` INNER JOIN `student_class` ON student_class.student=student.id LEFT JOIN `payment` ON student_class.payment=payment.id INNER JOIN `class` ON student_class.class=class.id) WHERE student.contact='$contact_id' AND ( student_class.has_paid=0 OR payment.status NOT LIKE 'Completed')";

	$sql_result = $conn->query($query);
	if ($sql_result && $sql_result->num_rows > 0) {
		while($row = $sql_result->fetch_assoc()) {
			array_push($student_classes, $row);
		}
		$sql_result->close();
	}
	$conn->close();
	return $student_classes;
}

function getStudentsByContact($contact_id){
	$conn = connect();

	$students = array();
	$query = "SELECT student.fname, student.lname, TIMESTAMPDIFF (YEAR, student.birth_date, CURDATE()) AS age, (SELECT COUNT(student_class.id) FROM `student_class` WHERE student_class.student=student.id) AS count FROM `student` WHERE student.contact='$contact_id'";

	$sql_result = $conn->query($query);
	if ($sql_result && $sql_result->num_rows > 0) {
		while($row = $sql_result->fetch_assoc()) {
			array_push($students, $row);
		}
		$sql_result->close();
	}
	$conn->close();
	return $students;
}

function getStudentsByContactWithClassStatus($contact_id, $class_id){
	$conn = connect();

	$query = "SELECT student.id, student.fname, student.lname, TIMESTAMPDIFF (YEAR, student.birth_date, CURDATE()) AS age, (SELECT COUNT(*) FROM `student_class` WHERE student_class.student=student.id AND student_class.class='$class_id') AS in_class FROM `student` WHERE student.contact='$contact_id'";

	$students = array();
	$sql_result = $conn->query($query);
	if ($sql_result && $sql_result->num_rows > 0) {
		while($row = $sql_result->fetch_assoc()) {
			array_push($students, $row);
		}
		$sql_result->close();
	}
	$conn->close();
	return $students;
}

function deleteStudentClass($student_id, $class_id){
	$conn = connect();

	$query = $conn->prepare("DELETE FROM student_class WHERE student=? AND class=?");
	$query->bind_param('ii', $student_id, $class_id);
	$query->execute();
	return $conn->error;
}

$conn = connect();

?>