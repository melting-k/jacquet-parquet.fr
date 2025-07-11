<?php
return (object) [

    // *** NEW SECTION

    (object) [
        'class'    => "",
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
                'title'     => "Préserver l’âme<br>de votre parquet",
                'text'      => "Un parquet ancien raconte une histoire que nous nous attachons à préserver. Vous avez fait le choix de rénover une maison ou un appartement à Toulouse et sa région ? Nous sommes là pour redonner tout son éclat à votre parquet.
                <br><br>
                Notre équipe experte répare ou remplace les lames endommagées, ponce l’ensemble avec précision et applique une nouvelle finition pour que vous retrouviez le caractère et l’authenticité de votre parquet tout en lui offrant une seconde jeunesse. En somme, le charme de l’ancien avec la qualité du neuf.",

                'image'     => (object) [
                    'url'       => "img/intro/renovation-parquet-ancien.jpg",
                    'alt'       => "Rénovation d'un parquet d'époque dans une maison toulousaine"
                ]
            ],

            // *** CAROUSEL

            (object) [
                'type'  => "carousel",
                'title' => "Notre process<br>de rénovation",

                'items'  => (object) [
                    (object) [
                        'title'     => "Diagnostic",
                        'text'      => "Evaluation de l’état de votre parquet, identification des lames à remplacer et des travaux nécessaires."
                    ],
                    (object) [
                        'title'     => "Réparations",
                        'text'      => "Remplacement des lames endommagées ou instables et correction des défauts structurels."
                    ],
                    (object) [
                        'title'     => "Ponçage",
                        'text'      => "Élimination méthodique des anciennes finitions et mise à niveau de l’ensemble de la surface pour homogénéiser."
                    ],
                    (object) [
                        'title'     => "Finitions",
                        'text'      => "Application de vitrification, huile ou teinte selon vos préférences pour protéger et sublimer votre parquet."
                    ]
                ]
            ],

            // *** QUOTE

            (object) [
                'type'      => "quote",
                'image'     => (object) [
                    'url'       => "img/quote/interieur-de-maison-avec-parquet-renove.jpg",
                    'alt'       => "Photo d'un intérieur de maison avec un parquet rénové"
                ],
                'text'      => "$icons->double_arrow Rénover plutôt que remplacer, c'est adopter une démarche écologique et économique qui préserve l’âme et l’histoire de votre maison. $icons->double_arrow"
            ],

            // *** CAROUSEL

            (object) [
                'type'  => "carousel",
                'title' => "Quelques exemples...",

                'images'  => new Gallery('img/realisations')
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