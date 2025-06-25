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
    include 'controller/MainController.php';

?>

<!DOCTYPE html>
    <html lang="fr">
    <?php include 'includes/head.php'; ?>
    <body id="top-page" class="<?=$PAGE_name?>">
        <div class="u-transition <?=$classAnimation?>">
            
        </div>
        
        <?php
            include 'includes/nav.php';

            if($HEADER_hero) {
                include 'includes/hero.php';
            } else {
                include 'includes/header-classic.php';
            }
        ?>