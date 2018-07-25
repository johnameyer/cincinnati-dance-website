<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?php if($base = getenv('CINCI_DANCE_BASE')): //include base tag only if defined in environment
?>
<base href="<?php echo $base; ?>">
<?php endif; ?>
<title>Cincinnati Dance and Movement Center<?php if(isset($page)) echo " - " . $page; ?></title>

<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="css/menu.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/mobile.css">

<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>