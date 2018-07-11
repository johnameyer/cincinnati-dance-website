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
        <?php

        class staff {
            public $name;
            protected $img;
            protected $description;

            public function __construct($namer)
            {
                $name = $namer;
                $img = "https://placeholdit.imgix.net/~text?txtsize=38&txt=400%C3%97400&w=400&h=400";
                $description = "Lorem Ipsum etc";    
            }
        }


        $crew = array(new staff('heck'), new staff('heck'), new staff('heck'));

        for ($x = 0; $x <= count($crew) - 1; $x++) {
            echo $crew[$x]->name;

        }
        ?>
    </head>

    <body>
        <?php include_once 'includes/menu.php'; ?>

        <div class="drop-up">
            <div class="container-fluid body-container">
                <div class="body-inner">
                    <div class="row justify-content-md-center">
                        <div class="col-md-10 col-md-offset-1" id="cardbox">
                            <br>

                            <h1>Our Crew</h1>

                            <?php
                                $LEFT = false;
                                $file = file_get_contents('../data/staff.json');
                                $json = json_decode($file);
                                foreach($json as $OBJ):
                            ?>
                                <?php $LEFT = !$LEFT; ?>
                                <?php include 'includes/components/staff-card.php' ?>
                            <?php endforeach ?>
                        </div>
                    </div>
                </div>

                <?php include_once 'includes/footer.php'; ?>

                <?php include_once 'includes/javascript.php'; ?>
                </body>

            </html>