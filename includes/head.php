<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

<?php if($base = getenv('CINCI_DANCE_BASE')): //include base tag only if defined in environment
?>
<base href="<?php echo $base; ?>">
<?php endif; ?>

<title>Cincinnati Dance and Movement Center</title>

<style>
    body{
        background-color:aliceblue;
        font-family:  serif;
    }
    .dropdown-item:active {
        background-color:bisque !important;
    }
    .nav-link{
        color: white;
    }

</style>
