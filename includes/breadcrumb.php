<nav aria-label="breadcrumb">
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="">Home</a></li>
		<?php foreach ($path as $path_elem): ?>
			<li class="breadcrumb-item">
				<?php if(isset($path_elem['path'])): ?>
					<a href="<?php echo $path_elem["path"]; ?>"><?php echo $path_elem["name"]; ?></a>
				<?php else: ?> 
					<?php echo $path_elem["name"]; ?>
				<?php endif; ?>
			</li>
		<?php endforeach; ?>
		<li class="breadcrumb-item active" aria-current="page"><?php echo $page; ?></li>
	</ol>
</nav>
<br>