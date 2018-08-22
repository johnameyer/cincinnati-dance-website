<div class="card" style="margin-top:30px; margin-bottom:30px">
	<img class="card-img-top" src="<?php echo $OBJ->img; ?>" alt="Card image cap">
	<div class="card-body">
		<h4 class="card-title"><?php echo $OBJ->name; ?></h4>
		<p class="card-text"><?php echo $OBJ->credit; ?></p>
		<a class="btn btn-primary" style="float:right;" role="button" href="gallery/galleria?<?php echo http_build_query(array("file"=>$OBJ->folder, "form"=>$OBJ->pattern, "title"=>$OBJ->name)); ?>">More Information</a>
	</div>
</div>