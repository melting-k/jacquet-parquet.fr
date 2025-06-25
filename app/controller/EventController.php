<?php

// *** Récupération de l'article

if(isset($_GET['slug']))
{
    $slug = $_GET['slug'];
    $event = $EventManager->get($slug, 'event');
}

// Si aucun article n'est récupéré >> Renvoi à la home du mag
if(!$event || !isset($_GET['slug']))
{
    $tools->redirect($NAV->events->url,true);
}

// *** Meta Title & Description

$META_title = $event->title();
$META_description = $tools->createPreview($event->description(), 160);

$ogURL = SITE_FRONT_BASE.$NAV->event->url.$event->slug();
$ogIMG = SITE_FRONT_BASE.$event->cover();

$HEADER_title = $event->title();
$HEADER_subtitle = $site_infos->client_name();