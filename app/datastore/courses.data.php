<?php
return (object) [

    // CONTENT -- ALT

    (object) [
        'type' => "content-alt",
        'class' => "",

        'title' => "Assistez à une<br>course hippique",
        'text' => [
            "Plongez au cœur de la ferveur des courses de trot à l’Hippodrome de Beaumont-de-Lomagne ! Dans un cadre unique en pleine campagne, assistez aux courses où les plus grands drivers se disputent la victoire. Que vous soyez amateur de frissons ou simplement curieux, profitez de l’ambiance conviviale , partagez des moments en famille ou entre amis, et vibrez au rythme des paris et des exploits hippiques. Chaque journée de courses est une expérience à ne pas manquer.",
            "<strong>• Lieu : Hippodrome de Beaumont-de-Lomagne, Tarn-et-Garonne<br>
            • Discipline : Trot (monté et attelé)<br>
            • Piste : 1115m, corde à droite<br>
            • Départs : Cellules ou Autostart (2400m, 2550m, 2950m)<br>
            • 16 réunions annuelles<br>
            • Parking : Gratuit, 500 places</strong>"
        ],

        'image' => (object) [
            'url' => "img/courses/assistez-a-une-course-hippique.jpg",
            'alt' => "Assistez à une course hippique au sein de notre"
        ],

        'cta' => [
            (object) [
                'title' => "Courses de la saison",

                'link' => (object) [
                    'url' => '#courses',
                    'class' => 'scroll',
                    'title' => 'Courses de la saison',
                ]
            ],
            (object) [
                'title' => "Épreuves de qualification",

                'link' => (object) [
                    'url' => '#qualifs',
                    'class' => 'scroll',
                    'title' => 'Épreuves de qualification',
                ]
            ]
        ],
    ],

    // CARDS -- RACES

    (object) [
        'type' => "cards-list",

        'id' => "courses",

        'title'         => "Courses de la saison",
        'no_items'      => "Aucune course n'est disponible pour le moment.",
        'load_more'     => "Voir plus de courses",

        'items'         => $races,
        'items_total'   => $total_races,
        'cards_type'    => "card",
        'base_url'      => "",

        'items_type'  => "race",
        'class' => "--primary"
    ],

    // CARDS -- QUALIFS

    (object) [
        'type' => "cards-list",

        'id' => "qualifs",

        'title'         => "Épreuves de qualification",
        'no_items'      => "Aucune épreuve n'est disponible pour le moment.",
        'load_more'     => "Voir plus d'épreuves",

        'items'         => $qualifs,
        'items_total'   => $total_qualifs,
        'cards_type'    => "card",
        'base_url'      => "",

        'items_type'  => "qualif",
        'class' => "--secondary"
    ],


    (object) [
        'type' => "testimonials",
    ],
    
    
    (object) [
        'type' => "label",
    ],
];