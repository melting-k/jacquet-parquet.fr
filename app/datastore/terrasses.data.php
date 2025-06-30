<?php
return (object) [

    // *** NEW SECTION

    (object) [
        'class'    => "--dark",
        'components'    => (object) [

            // *** HEADER

            (object) [
                'type'      => "header",

                'title'     => "Terrasses<br> en bois",
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
                'title'     => "Un espace extérieur<br>qui vous ressemble",
                'text'      => "Votre jardin mérite autant d'attention que votre intérieur. Chez Baptiste Jacquet, nous créons des terrasses et plages de piscine sur-mesure qui s'intègrent harmonieusement à votre environnement et votre style de vie.
                <br><br>
                Notre équipe conçoit et réalise des espaces extérieurs à la fois pratiques et esthétiques, pensés pour durer dans le temps. 
                La terrasse en bois est bien plus qu'un simple aménagement extérieur - c'est un véritable prolongement de votre habitat, un espace de vie supplémentaire où profiter des beaux jours en famille ou entre amis.",

                'image'     => (object) [
                    'url'       => "img/intro/terrasse-exterieure-en-bois.jpg",
                    'alt'       => "Installation d'une terrasse extérieure en bois"
                ]
            ],
        ]
    ],

    (object) [
        'class'    => "--light",
        'components'    => (object) [
            
            // *** QUOTE

            (object) [
                'type'      => "quote",
                'image'     => (object) [
                    'url'       => "img/quote/interieur-maison-design-parquet-neuf.jpg",
                    'alt'       => "Photo d'un intérieur de maison moderne et design avec un parquet en bois neuf"
                ],
                'text'      => "<p>$icons->logo_round</p>"
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