<?php

// ========================================================
// Définition des variables utiles à l'échelle globale 
// Les rends accessibles depuis n'importe quelle fonction
// ========================================================

global $addScriptDeclaration, $infos, $new_com; 

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html, charset=UTF-8" />
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!-- SEO  -->
    <title>Administration | <?=$infos->client_name()?></title>
    <meta name="description" content="Administration Blog" />
    <meta name="author" content="Benjamin Tronchet" />
    <meta name="robots" content="noindex,nofollow"/>
    <base href="<?=SITE_ADMIN_BASE?>">
    
    <!-- FAVICON -->
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/favicon.ico" type="image/x-icon">
    
    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,700" rel="stylesheet"> 
    
    <!-- CSS  -->
    <!-- build:css(app/back-office) css/style.min.css -->
    <!-- Bootstrap -->
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <!-- nprogress -->
    <link href="../../node_modules/nprogress/nprogress.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../../node_modules/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../../node_modules/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <!-- Dropzone -->
    <link href="../../node_modules/dropzone/dist/dropzone.css" rel="stylesheet">
    <!-- Animate -->
    <link href="../../node_modules/animate.css/animate.min.css" rel="stylesheet">
    <!-- Custom -->
    <link href="css/app.css" type="text/css" rel="stylesheet" media="screen,projetion" />
    <!-- endbuild -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>