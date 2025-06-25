<?php
    // *** Inclusion Main Controller
    
    include '../includes/helper.php';

    include '../controller/MainController.php';

    // *** Récupération des variables post

    $current = (int) $_POST['current'];
    $number = (int) $_POST['number'];
    $url = $_POST['base_url'];
    $type = $_POST['type'];
    $card_type = $_POST['card_type'];
    
    if(in_array($type,['race','qualif'])) {
        $items = $RaceManager->lists($type,true,$number,$current);
    }

    if($type === 'event') {
        $items = $EventManager->lists(true, $number_items,$current);
    }

    foreach($items as $item)
    {
        include realpath(__DIR__ . '/..').'/components/'.$card_type.'.php';
    }