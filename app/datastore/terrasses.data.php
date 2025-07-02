<?php
return (object) [

    // *** NEW SECTION

    (object) [
        'class'    => "",
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

    // *** NEW SECTION

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

    // *** NEW SECTION

    (object) [
        'class'    => "--light",
        'components'    => (object) [

            // *** CONTENT

            (object) [
                'type'      => "content",
                
                'items'     => (object) [
                    (object) [
                        'image' => (object) [
                            'url'   => "img/content/terrasse-exterieure-en-bois-europeen-traite.jpg",
                            'alt'   => "Terrasse extérieure en bois européen traité"
                        ],
                        'title' => "Terrasse en bois européen traité",
                        'text'  => "Les bois européens traités offrent un excellent rapport qualité-prix. Grâce au traitement autoclave, ces essences locales deviennent parfaitement adaptées à un usage extérieur durable.",

                        'assets'    => (object) [
                            "Bon rapport qualité-prix",
                            "Bonne durabilité (15 à 25 ans)",
                            "Choix écologique et local (PEFC)"
                        ]
                    ],

                    (object) [
                        'image' => (object) [
                            'url'   => "img/content/terrasse-exterieure-en-bois-exotique.jpg",
                            'alt'   => "Terrasse extérieure en bois exotique"
                        ],
                        'title' => "Terrasse en bois exotique",
                        'text'  => "Les bois exotiques comme l’ipé ou le massaranduba se distinguent par leur exceptionnelle résistance naturelle aux intempéries, aux insectes et au temps, sans aucun traitement chimique.",

                        'assets'    => (object) [
                            "Durabilité exceptionnelle (25 à 50 ans)",
                            "Naturellement imputrescible",
                            "Entretien minimal"
                        ]
                    ],

                    (object) [
                        'image' => (object) [
                            'url'   => "img/content/terrasse-en-composite.jpg",
                            'alt'   => "Terrasse extérieure en bois composite"
                        ],
                        'title' => "Terrasse en composite",
                        'text'  => "Le bois composite allie l’esthétique du bois à une facilité d’entretien incomparable, offrant une excellente résistance aux intempéries, aux UV et aux tâches.",

                        'assets'    => (object) [
                            "Aucun entretien nécessaire",
                            "Résistant aux tâches et décolorations",
                            "Aspect bois réaliste et esthétique"
                        ]
                    ],
                ]
            ],
            
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