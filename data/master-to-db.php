<?php
set_include_path('../');

include_once 'includes/db.php';

mkdir('./class/');

$file = 'master-sheet.csv';
$csv = array_map('str_getcsv', file($file));
array_walk($csv, function(&$a) use ($csv) {
	$a = array_combine($csv[0], $a);
	$a["Nice name"] = urlencode($a['Name']);
});
array_shift($csv);
var_dump($csv);

foreach($csv as $item){
	{
		$query = $conn->prepare("INSERT INTO `class` (id, name, days, times, ages, class_starts, class_ends, image, type, priority) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?);");
		$query->bind_param('issssssssi', $item['Id'], $item['Name'], $item['Days'], $item['Times'], $item['Ages'], $item['Class starts'], $item['Class ends'], $item['Image'], $item['Type'], $item['Priority']);
		$query->execute();
		$error = $conn->error;
		if(strlen($error)){
			echo json_encode($error) . '<br>';
		}
	}

	{
		$query = $conn->prepare("UPDATE `class` SET name=?, days=?, times=?, ages=?, class_starts=?, class_ends=?, image=?, type=?, priority=? WHERE id=?");
		$query->bind_param('ssssssssii', $item['Name'], $item['Days'], $item['Times'], $item['Ages'], $item['Class starts'], $item['Class ends'], $item['Image'], $item['Type'], $item['Priority'], $item['Id']);
		$query->execute();
		if(strlen($error)){
			echo json_encode($error) . '<br>';
		}
	}
	file_put_contents('./class/' . $item['Id'] . '.json', json_encode(array('tuition' => $item['Tuition'], 'notes' => $item['Notes'], 'brief' => $item['Brief'], 'description' => $item['Full'])));
}