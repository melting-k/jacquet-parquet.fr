<?php
return (object) [

    // *** NEW SECTION

    (object) [
        'class'    => "--light",
        'components'    => (object) [

            // *** HEADER

            (object) [
                'type'      => "header",
                
                'title'     => "Rénovation de parquets anciens",
                'subtitle'  => "Redonnez vie et caractère à vos parquets d’époque avec notre savoir-faire artisanal",
                'image'     => (object) [
                    'url'       => "img/header/renovation-parquets-anciens-toulouse.jpg",
                    'alt'       => "Rénovez votre parquet ancien à Toulouse"
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