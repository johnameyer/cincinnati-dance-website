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

                        <?php include_once 'includes/class-nav.php'; ?>
                        <script>document.getElementById("navbal").className = "nav-link active"</script>

                        <h2>Ballet classes</h2>

                        <div class="row">
                            <div class="col-md-8">
                                <p>Our Ballet Program is a leveled classical ballet program (beginners through pre-professional) under the direction of Ms. Mary Anne Schaeper (BA
                                    and MA in Dance, UC College-Conservatory of Music) with a strong focus on correct technique while experiencing “la joie de danse” (the joy of
                                    dance). Dress code is black leotard and pink tights (for girls) and black tights/leggings and close-fitting white t-shirt (for boys.) Pink split-sole
                                    ballet shoes for girls and black split-sole ballet shoes for boys. Hair in a bun and no jewelry. All students are welcomed in our ballet program,
                                    but for upper levels, an informal audition is usually required (such as participating in a class to determine correct level placement.) Please
                                    contact us with any questions.</p>
                                <p>
                                    Please note that many of our upper-level ballet students take multiple ballet classes (and/or other classes we offer) per week, and are therefore
                                    eligible for our multiple class discounts, which are as follows: 2 nd class 10% discount, 3 rd class 20% discount, 4 th class 30% discount, 5 th class 40%
                                    discount, 6 th class or more 50% discount. (calculated starting with longest class first, and going down to shortest class) Tuition listed is full price,
                                    not including multi-class discounts.</p>

                                <br>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="img/classes/ballet.jpg" class="card-img-top" alt="ballet picture">
                                </div>
                            </div>
                        </div>

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
                                $file = file_get_contents('../data/ballet-data.json');
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