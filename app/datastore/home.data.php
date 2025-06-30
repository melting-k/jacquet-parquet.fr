<?php
return (object) [

    // *** NEW SECTION

    (object) [
        'class'    => "",
        'components'    => (object) [

            // *** HEADER

            (object) [
                'type'      => "header",
                
                'title'     => "BAPTISTE JACQUET<br>Artisan - Parqueteur",
                'subtitle'  => "Pose, rénovation de parquets et terrasses en bois.<br>Un savoir-faire authentique depuis 20 ans.",
                'image'     => (object) [
                    'url'       => "img/header/baptiste-jacquet-artisan-parqueteur-toulouse.jpg",
                    'alt'       => "Baptiste Jacquet - Pose & rénovation parquets et terrases bois à Toulouse"
                ]
            ],
        ]
    ],

    // *** NEW SECTION

    (object) [
        'class'    => "--dark",
        'id'       => "main",
        'components'    => (object) [
            
            // *** INTRO

            (object) [
                'type'      => "intro",
                'title'     => "Le bois, notre passion depuis toujours",
                'text'      => "Chez Baptiste Jacquet, le travail du bois est plus qu’un métier : c’est une véritable vocation. Formé chez les Compagnons du Devoir, Baptiste met son expertise et sa passion au service de vos projets depuis plus de 20 ans à Toulouse et sa région.
                <br><br>
                Nous savons que votre habitat vous est précieux. C’est pourquoi notre équipe s’engage à vous proposer un travail soigné et durable pour tous vos projets de parquets et terrasses. Que vous fassiez construire votre maison ou que vous rénoviez votre appartement, nous vous accompagnons avec professionnalisme et une attention aux détails qui fait toute la différence.",

                'image'     => (object) [
                    'url'       => "img/intro/pose-de-parquet-colle.jpg",
                    'alt'       => "Pose d'un parquet collé à Toulouse"
                ]
            ],
            
            // *** QUOTE

            (object) [
                'type'      => "quote",
                'image'     => (object) [
                    'url'       => "img/quote/parquet-flottant-bois.jpg",
                    'alt'       => "Photo d'un parquet en bois"
                ],
                'text'      => "$icons->double_arrow Le bois est une matière noble, naturelle et précieuse. Notre métier est de le mettre en valeur pour qu’il vous accompagne au quotidien, année après année. $icons->double_arrow
                <br><br>
                Baptiste Jacquet"
            ],
            
            // *** ASSETS

            (object) [
                'type'      => "assets",
            ],
        ]
    ],

    // *** NEW SECTION

    (object) [
        'class'    => "--light",
        'components'    => (object) [
            
            // *** IMAGE

            (object) [
                'type'      => "image",

                'image'     => (object) [
                    'url'       => "img/image/terrasse-avec-parquet-en-bois.jpg",
                    'alt'       => "Photo d'une terrasse avec parquet en bois"
                ]
            ],
        ]
    ],

    // *** NEW SECTION (FOOTER)

    (object) [
        'class'    => "",
        'components'    => (object) [
            (object) [
                'type'      => "architects",
            ],
            (object) [
                'type'      => "partners",
            ],
            (object) [
                'type'      => "testimonials",
            ],
            (object) [
                'type'      => "instagram",
            ],
            (object) [
                'type'      => "footer",
            ]
        ]
    ]
];