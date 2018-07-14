<?php
set_include_path('../');
?>
<!doctype html>
<html lang="en">

<head>
	<?php include_once 'includes/head.php'; ?>

	<link rel="stylesheet" href="css/carousel.css">
	<link rel="stylesheet" href="css/awards.css">
	<link rel="stylesheet" href="css/actioncalls.css">
</head>

<body>
    <?php include_once 'includes/menu.php'; ?>
    
    <?php include_once 'includes/header-image.php'; ?>

	<div class="drop-up">
		<div class="container-fluid body-container">
			<div class="body-inner">
				<div class="justify-content-md-center">
                        <h1>Preschool classes</h1>

                        <p> Our preschool classes are designed to introduce basic dance technique, with a focus on developing gross motor skills, musicality, and dance fundamentals in a fun and encouraging environment.  Dress code is dancewear (leotard and tights for girls, shorts and a close-fitting T-shirt for boys) and ballet shoes (pink for girls, black for boys.)  Hair secured back from face and no dangling jewelry please. </p>

                        <br>
                        
                        <table class="table table-responsive">
                            <thead>
                                <th scope="col">Class</th>
                                <th scope="col">Days</th>
                                <th scope="col">Times</th>
                                <th scope="col">Ages</th>
                                <th scope="col">Class Starts</th>
                                <th scope="col">Class Ends</th>
                                <th scope="col">Tuition</th>
                                <th scope="col">Notes</th>
                            </thead>
                            <tbody>
                            <?php
                                $file = file_get_contents('../data/preschool-data.json');
								$json = json_decode($file);
								$i = 0;
                                foreach($json as $OBJ):
                                ?>
									<tr>
                                        <td>
                                            <?php echo $OBJ->title; ?>
                                        </td>
                                        <td>
                                            <?php echo $OBJ->daysOfWeek; ?>
                                        </td>
                                        <td>
                                            <?php echo $OBJ->time; ?>
                                        </td>
                                        <td>
                                            <?php echo $OBJ->ages; ?>
                                        </td>
                                        <td>
                                            <?php echo $OBJ->startDate; ?>
                                        </td>
                                        <td>
                                            <?php echo $OBJ->endDate; ?>
                                        </td>
                                        <td>
                                            <?php echo $OBJ->tuition; ?>
                                        </td><td>
                                            <?php echo $OBJ->notes; ?>
                                        </td>
                                    </tr>
								<?php endforeach; ?>
                            </tbody>
                        </table>
					</div>
			</div>
		</div>
	</div>

	<?php include_once 'includes/footer.php'; ?>

	<?php include_once 'includes/javascript.php'; ?>
</body>

</html>