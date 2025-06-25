<?php

spl_autoload_register(function ($classname) {
    require(realpath(__DIR__ . '/..').'/'.FOLDER_ADMIN.'models/'.$classname.'.php');
});

// ========================================================
// Connexion à la base de données
// ======================================================== 

$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8mb4', DB_USER, DB_PASS);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

// *** Instanciation des classes

$EventManager = new EventManager($db);
$RaceManager = new RaceManager($db);
$InfosManager = new InfosManager($db);
$LegalsManager = new LegalsManager($db);
$tools = new Tools();

// *** Variables utiles pour les éléments contribuables : nombre à afficher, nombre total, liste d'articles publiés, dernier article à la une

$site_infos = $InfosManager->get(1,'infos');
$site_legals = $LegalsManager->get(1,'legals');

$number_items = 8;
$number_items_load = 4;

$races = $RaceManager->lists('race',true, $number_items);
$qualifs = $RaceManager->lists('qualif',true, $number_items);
$events = $EventManager->lists(true, $number_items);

$total_races = count($RaceManager->lists('race'));
$total_qualifs = count($RaceManager->lists('qualif'));
$total_events = count($EventManager->lists());


if(isset($PAGE_name)) {
    switch($PAGE_name) {
        case 'event' :
            include realpath(__DIR__).'/EventController.php';
        break;
    }
}