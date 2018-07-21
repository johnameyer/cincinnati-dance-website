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
                        <script>document.getElementById("navtap").className = "nav-link active"</script>

                        <h2>Tap Classes</h2>

                        <div class="row">
                            <div class="col-md-8">
                                <p>Our Tap program is a comprehensive program (beginners through advanced) that covers the range of tap styles, from vintage Broadway-style
                                    tap to the newest trends in rhythm tap, under the direction of award-winning tap master Ms. Tina Marie Prentosito. Beginning tappers learn
                                    correct tap technique and terminology under the tutelage of Ms. Imani (who trained for over a decade with Ms. Tina), and intermediate and
                                    advanced students take class with Ms. Tina. Dress code is dancewear of any type for girls (leotard and tights, unitard, leggings and dance top,
                                    etc.) and dancewear or exercise wear for boys (shorts/warm-ups and T-shirt, etc.) No pants that cover the shoes, no hair in face, no dangling
                                    jewelry. Any style tap shoes are permitted for class. For performances, shoe requirements vary, so please see notes.</p>
                                <p>Students taking more than one class per week are eligible for our multiple class discounts, which are as follows: 2nd class 10% discount, 3rd class
                                    20% discount, 4th class 30% discount, 5th class 40% discount, 6th or more 50% discount. (calculated starting with longest class first, and going
                                    down to shortest class) Tuition listed is full price, not including multi-class discounts.</p>

                                <br>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img src="img/classes/tap.jpg" class="card-img-top" alt="tap picture">
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
                                $file = file_get_contents('../data/tap-data.json');
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