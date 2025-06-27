<?php
return (object) [

    // *** NEW SECTION

    (object) [
        'class'    => "--dark",
        'components'    => (object) [

            // *** HEADER

            (object) [
                'type'      => "header",

                'title'     => "Terrasses en bois",
                'subtitle'  => "Créez un espace extérieur convivial et durable qui prolonge votre habitat",
                'image'     => (object) [
                    'url'       => "img/header/installation-terrasse-bois-toulouse.jpg",
                    'alt'       => "Faites installer votre terrasse bois à Toulouse"
                ]
            ],
        ]
    ],

    (object) [
        'class'    => "--dark",
        'id'       => "main",
        'components'    => (object) [
            
            // *** INTRO

            (object) [
                'type'      => "intro",
            ],
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