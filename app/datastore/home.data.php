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
            ],
            
            // // *** QUOTE

            // (object) [
            //     'type'      => "quote",
            // ],
            
            // // *** ASSETS

            // (object) [
            //     'type'      => "assets",
            // ],
        ]
    ],

    // *** NEW SECTION (FOOTER)

    (object) [
        'class'    => "",
        'components'    => (object) [
            // (object) [
            //     'type'      => "architects",
            // ],
            // (object) [
            //     'type'      => "partners",
            // ],
            // (object) [
            //     'type'      => "testimonials",
            // ],
            // (object) [
            //     'type'      => "instagram",
            // ],
            (object) [
                'type'      => "footer",
            ]
        ]
    ]
];