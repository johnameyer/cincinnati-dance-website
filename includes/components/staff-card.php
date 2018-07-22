        <div class="col-md-6">
<div class="card" style="margin-top:30px; margin-bottom:30px">
    <div class="row ">
        <?php if($LEFT): ?>
        <div class="col-md-4">
            <img src="<?php echo $OBJ->photoLink; ?>" class="w-100">
        </div>
        <?php endif; ?>
        <div class="col-md-8">
            <div class="card-block px-3">
                <h4 class="card-title"><?php echo $OBJ->name; ?></h4>
                <?php $exploded = explode("\n", $OBJ->bio);
                    foreach($exploded as $section):
                ?>
                    <p class="card-text"><?php echo $section; ?></p>
                <?php endforeach; ?>
            </div>
        </div>
        <?php if(!$LEFT): ?>
        <div class="col-md-4">
            <img src="<?php echo $OBJ->photoLink; ?>" class="w-100">
        </div>
        <?php endif; ?>
    </div>
</div>
</div>