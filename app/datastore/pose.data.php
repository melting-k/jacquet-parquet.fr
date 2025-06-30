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

    // *** NEW SECTION

    (object) [
        'class'    => "--light",
        'id'       => "main",
        'components'    => (object) [
            
            // *** INTRO

            (object) [
                'type'      => "intro",
                'title'     => "Un travail soigné pour un résultat durable",
                'text'      => "Le parquet apporte chaleur et authenticité à votre intérieur. Nous mettons notre savoir-faire artisanal au service de votre habitat pour une pose dans les règles de l’art : chaque étape est réalisée avec soin, de la préparation du support aux finitions, en passant par la pose elle-même.
                <br><br>
                Nous adaptons notre approche aux spécificités de votre logement – configuration, usage des pièces, présence d’un chauffage au sol – pour vous garantir non seulement un résultat esthétique, mais aussi une durabilité optimale. Un parquet bien posé vous accompagnera longtemps.",

                'image'     => (object) [
                    'url'       => "img/intro/pose-parquet-neuf.jpg",
                    'alt'       => "Pose d'un parquet neuf dans une maison"
                ]
            ],

            // *** IMAGE

            (object) [
                'type'      => "image",

                'icon'      => $icons->parquet,

                'image'     => (object) [
                    'url'       => "img/image/salon-avec-parquet-points-de-hongrie-et-batons-rompus.jpg",
                    'alt'       => "Photo d'un salon moderne, avec parquet en points de hongrie et bâtons rompus"
                ]
            ],
        ]
    ],

    // *** NEW SECTION

    (object) [
        'class'    => "--dark",
        'id'       => "main",
        'components'    => (object) [
    
            
        ]
    ],
    
    // *** NEW SECTION
 
    (object) [
        'class'    => "--light",
        'components'    => (object) [
                        
            // *** QUOTE

            (object) [
                'type'      => "quote",
                'image'     => (object) [
                    'url'       => "img/quote/parquet-flottant-bois.jpg",
                    'alt'       => "Photo d'un parquet en bois"
                ],
                'title'     => "Fourniture de parquets de qualité",
                'text'      => "En plus de la pose, nous proposons une sélection rigoureuse de parquets pour votre projet. Grâce à notre réseau de fournisseurs et à notre expérience, nous vous donnons accès à des parquets de qualité supérieure, adaptés à vos besoins et à votre budget. Nous privilégions les parquets français certifiés, garantissant qualité, durabilité et respect de l’environnement. "
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