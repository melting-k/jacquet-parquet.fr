<?php 
    session_start();

    // ==================================================
    // ***** ANIMATION PART
    // ==================================================

    $classAnimation = 'first';

    if(isset($_SESSION['animation']) && $_SESSION['animation'] == "done") {
        $classAnimation = 'active';
    }

    if(isset($_SESSION['animation']) && $_SESSION['animation'] == "none") {
        $classAnimation = 'under';
    }

    include 'includes/helper.php';

?>

<!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="format-detection" content="telephone=no">
        <base href="<?=SITE_FRONT_BASE?>">

        <!-- SEO  -->
        <title><?php echo $META_title; ?></title>
        <meta name="description" content="<?php echo $META_description; ?>" />

        <meta name="author" content="<?php echo $META_author; ?>" />
        <meta name="robots" content="<?php echo $META_robots; ?>" />

        <!-- FAVICON -->
        <link rel="shortcut icon" href="img/icons/icone.png" type="image/png">
        <link rel="icon" href="img/icons/icone.png" type="image/png">

        <!-- SOCIAL MEDIA SHARING -->

        <meta property="og:url"                content="<?php echo $ogURL; ?>" />
        <meta property="og:type"               content="article" />
        <meta property="og:title"              content="<?php echo $META_title; ?>" />
        <meta property="og:description"        content="<?php echo $META_description; ?>" />
        <meta property="og:image"              content="<?php echo $ogIMG; ?>"/>

        <!-- CSS  -->
        <!-- build:css(app) css/style.min.css -->
        <link href="css/app.css" type="text/css" rel="stylesheet" media="screen,projection" />
        <!-- endbuild -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body id="top-page" class="<?=$PAGE_name?>">

        <div class="u-transition <?=$classAnimation?>">
            
        </div>
        
        <?php
            include 'components/nav.php';
        ?>