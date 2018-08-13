<?php
set_include_path('../');

include_once 'includes/db.php';
include_once 'includes/session.php';
require_once 'includes/admin-check.php';

$students = array();

$data = getData();

header('Content-Type: text/csv');
header('Content-Disposition: filename="data.csv"');
$cols = array(
'fname' => 'Student First Name',
'lname' => 'Student Last Name',
'medical_info' => 'Medical Info',
'birth_date' => 'Birth Date',
'age' => 'Age',
'grade' => 'Grade',
'school_district' => 'School District',
'contact_fname' => 'Contact First Name',
'contact_lname' => 'Contact Last Name',
'relationship' => 'Relationship',
'contact_phone' => 'Contact Phone',
'emergency_phone' => 'Emergency Phone',
'address' => 'Address',
'city' => 'City',
'state' => 'State',
'zip' => 'Zipcode',
'email' => 'Email',
'name' => 'Class Name',
'status' => 'Payment Status'
);

function mapData(&$item, $index){
	$result = array();
	global $cols;
	foreach (array_keys($cols) as $col) {
		array_push($result, $item[$col]);
	}
	$item = $result;
}

array_walk($data, 'mapData');

$fp = fopen('php://output', 'w');
fputcsv($fp, array_values($cols));
foreach ( $data as $line ) {
    fputcsv($fp, $line);
}
fclose($fp);
?>