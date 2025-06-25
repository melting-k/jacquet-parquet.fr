<?php
return (object) [

    // CARDS -- EVENTS

    (object) [
        'type' => "cards-list",

        'id' => "events",

        'title'         => "Nos événements",
        'no_items'      => "Aucun événement n'est disponible pour le moment.",
        'load_more'     => "Voir plus d'événements",

        'items'         => $events,
        'items_total'   => $total_events,
        'cards_type'    => "card-event",
        'base_url'      => "",

        'items_type'  => "race",
        'class' => "--primary"
    ],

    (object) [
        'type' => "testimonials",
    ],
    
    (object) [
        'type' => "label",
    ],
];