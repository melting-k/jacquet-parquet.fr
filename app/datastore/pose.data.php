<?php
return (object) [

    // *** NEW SECTION

    (object) [
        'class'    => "--light",
        'components'    => (object) [

            // *** HEADER

            (object) [
                'type'      => "header",

                'title'     => "Pose<br>de parquets",
                'subtitle'  => "Un savoir-faire artisanal pour des parquets massifs, contrecollés ou stratifiés qui subliment votre intérieur",
                'image'     => (object) [
                    'url'       => "img/header/pose-de-parquets-toulouse.jpg",
                    'alt'       => "Pose tous types de parquets à Toulouse"
                ]
            ],
        ]
    ],

    (object) [
        'class'    => "--light",
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