<?php
    // ========================================================
    // Inclusion du Main Controller
    // ======================================================== 

    include_once realpath(__DIR__ . '/..').'/controller/MainController.php';
    $manager = new TagManager($db);

    $listTags = $manager->lists();

    // Récupération de chaque tag
    
    $tableau_tags = [];
    $tableau_tri = [];
    foreach($listTags as $tag)
    {
        $tableau_tags[] = [
            "label" => html_entity_decode($tag->title()),
            "value" => html_entity_decode($tag->title()),
            "id"    => $tag->id_tag()
        ];
            
        $tableau_tri[] = $tag->title();
    }

    sort($tableau_tri);
    array_multisort($tableau_tags,$tableau_tri);

    // AFFICHAGE DU TABLEAU POUR RÉCUPÉRATION EN JS
    echo json_encode($tableau_tags);