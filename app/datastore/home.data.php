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
                'title'     => "Nos Engagements",
                'items'     => (object) [
                    (object) [
                        'icon'      => $icons->plus,
                        'title'     => "Expertise",
                        'text'      => "Formé chez les Compagnons, 20 ans d’expérience dans le bois"
                    ],
                    (object) [
                        'icon'      => $icons->bulle,
                        'title'     => "Accompagnement",
                        'text'      => "Des conseils personnalisés et un suivi attentif de A à Z"
                    ],
                    (object) [
                        'icon'      => $icons->check,
                        'title'     => "Qualité",
                        'text'      => "Des finitions soignées et matériaux sélectionnés avec soin"
                    ],
                    (object) [
                        'icon'      => $icons->square,
                        'title'     => "Réactivité",
                        'text'      => "Des devis rapides et adaptés et un respect des délais annoncés"
                    ]
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
                'title'     => "Nos Savoir-faire",
                
                'items'     => (object) [
                    (object) [
                        'image' => (object) [
                            'url'   => "img/content/pose-de-parquets-a-toulouse.jpg",
                            'alt'   => "Pose de parquet neuf à Toulouse",
                            'icon'  => $icons->parquet
                        ],
                        'title' => "Pose de Parquets",
                        'text'  => "Transformez votre intérieur avec un parquet qui vous ressemble. Nous maîtrisons toutes les techniques de pose pour des parquets massifs, contrecollés ou stratifiés. Notre savoir-faire artisanal garantit un résultat durable et chaleureux qui valorise votre intérieur.",
                        'button'    => (object) [
                            'url'   => $NAV->pose->url,
                            'title' => $NAV->pose->title,
                            'icon'  => $icons->arrow,
                            'label' => "Découvrir nos parquets"
                        ]
                    ],
                    (object) [
                        'image' => (object) [
                            'url'   => "img/content/renovation-de-parquets-anciens-a-toulouse.jpg",
                            'alt'   => "Rénovation parquet ancien à Toulouse"
                        ],
                        'title' => "Rénovation de parquets anciens",
                        'text'  => "Redonnez vie à vos parquets anciens. Nous préservons le caractère de votre habitat en restaurant vos sols avec soin : réparation de lames, ponçage soigneux et finitions adaptées pour un résultat qui respecte l'authenticité de votre parquet tout en lui offrant une nouvelle jeunesse.",
                        'button'    => (object) [
                            'url'   => $NAV->renovation->url,
                            'title' => $NAV->renovation->title,
                            'icon'  => $icons->arrow,
                            'label' => "Rénover mon parquet"
                        ]
                    ],
                    (object) [
                        'image' => (object) [
                            'url'   => "img/content/creation-conception-terrasses-en-bois-toulouse.jpg",
                            'alt'   => "Création terrasse extérieure en bois à Toulouse"
                        ],
                        'title' => "Terrasses en bois",
                        'text'  => "Prolongez votre espace de vie à l’extérieur. Nos terrasses sur mesure en bois européen, exotique ou composite transforment votre jardin. Nous assurons une conception adaptée à votre extérieur avec des matériaux durables et une  pose experte pour profiter pleinement de votre espace extérieur.",
                        'button'    => (object) [
                            'url'   => $NAV->terrasses->url,
                            'title' => $NAV->terrasses->title,
                            'icon'  => $icons->arrow,
                            'label' => "Créer ma terrasse"
                        ]
                    ]
                ]
            ],

            // *** SCROLL

            (object) [
                'type'      => "scroll",

                'title'     => "Comment ça marche ?",

                'items'     => (object) [
                    (object) [
                        'title'     => "Premier contact",
                        'text'      => "Partagez vos idées et vos besoins avec notre équipe.<br>C’est le début de l’aventure !"
                    ],
                    (object) [
                        'title'     => "Visite technique",
                        'text'      => "Baptiste se déplace chez vous pour évaluer précisément le chantier et vous proposer des solutions adaptées."
                    ],
                    (object) [
                        'title'     => "Devis détaillé",
                        'text'      => "Recevez une proposition claire qui détaille les matériaux, techniques et délais pour vous permettre de décider en toute sérénité."
                    ],
                    (object) [
                        'title'     => "Réalisation",
                        'text'      => "Notre équipe intervient avec soin et respect de votre intérieur, pour garantir un résultat impeccable."
                    ],
                    (object) [
                        'title'     => "Réception",
                        'text'      => "Nous réceptionnons le chantier et vous partageons nos conseils d’entretien pour préserver la beauté de votre parquet ou terrasse."
                    ]
                ]
            ],
            
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