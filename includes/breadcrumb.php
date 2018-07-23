<?php
?>

<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="">Home</a></li>
		<?php foreach ($path as $path_elem): ?>
			<li class="breadcrumb-item"><a href="<?php echo $path_elem["path"]; ?>"><?php echo $path_elem["name"]; ?></a></li>
		<?php endforeach; ?>
		<li class="breadcrumb-item active" aria-current="page"><?php echo $page; ?></li>
	</ol>
</nav>
<br>