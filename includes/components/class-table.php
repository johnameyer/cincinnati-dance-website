<?php
include_once 'includes/db.php';
$results = getClassByType($type);
?>
<br>
<table class="table table-responsive">
	<thead>
		<th scope="col">Class</th>
		<th scope="col">Days</th>
		<th scope="col">Times</th>
		<th scope="col">Ages</th>
		<th scope="col">Class Starts</th>
		<th scope="col">Brief Description</th>
		<th scope="col">Learn More</th>
	</thead>
	<tbody>
		<?php foreach($results as $item): ?>
		<tr>
			<td style="width: 20%">
				<?php echo $item["name"]; ?>
			</td>
			<td>
				<?php echo $item["days"]; ?>
			</td>
			<td>
				<?php echo $item["times"]; ?>
			</td>
			<td>
				<?php echo $item["ages"]; ?>
			</td>
			<td>
				<?php echo $item["class_starts"]; ?>
			</td>
			<td style="width: 40%">
				<?php echo $item["brief"]; ?>
			</td>
			<td>
				<a class="btn btn-primary" role="button" href="classes/info.php?<?php echo http_build_query(array("type"=>$type, "class"=>$item["id"])); ?>">More Information</a>
			</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>