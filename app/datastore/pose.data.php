<?php
return (object) [

    // *** NEW SECTION

    (object) [
        'class'    => "",
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
            
            // *** ASIDE

            (object) [
                'type'      => "aside",
                'title'     => "L’élégance intemporelle des Points de Hongrie et Bâtons Rompus",
                'text'      => "Vous rêvez d’un parquet au caractère unique et raffiné ? Nos poses en Point de Hongrie et Bâtons Rompus sublimeront votre intérieur avec élégance. Ces techniques historiques, signatures des plus beaux parquets, sont notre spécialité. Confiez-nous votre projet pour un résultat d’exception qui valorisera durablement votre habitat.",
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
        'components'    => (object) [
    
            // *** CONTENT

            (object) [
                'type'      => "content",
                
                'items'     => (object) [
                    (object) [
                        'image' => (object) [
                            'url'   => "img/content/pose-parquet-massif-toulouse.jpg",
                            'alt'   => "Pose de parquet massif à Toulouse"
                        ],
                        'title' => "Parquet massif",
                        'text'  => "Le parquet massif représente l’excellence et l’authenticité. Entièrement constitué de bois noble, il traverse les générations grâce à sa possibilité d’être rénové plusieurs fois.",

                        'assets'    => (object) [
                            "Noblesse du matériau",
                            "Robustesse dans le temps ",
                            "Authentique et élégant",
                            "Rénovable"
                        ],

                        'essences' => (object) [
                            (object) [
                                'title' => "Chêne français",
                                'image' => "img/essences/chene.png"
                            ],
                            (object) [
                                'title' => "Pin",
                                'image' => "img/essences/pin.png"
                            ],
                            (object) [
                                'title' => "Hêtre",
                                'image' => "img/essences/hetre.png"
                            ],
                            (object) [
                                'title' => "Frêne",
                                'image' => "img/essences/frene.png"
                            ]
                        ]
                    ],

                    (object) [
                        'image' => (object) [
                            'url'   => "img/content/installation-parquet-contrecolle-toulouse.jpg",
                            'alt'   => "Pose de parquet contrecollé à Toulouse"
                        ],
                        'title' => "Parquet Contrecollé",
                        'text'  => "Le parquet contrecollé combine une couche de bois noble en surface avec des couches techniques qui lui confèrent une bonne stabilité.",

                        'assets'    => (object) [
                            "Compatible avec le chauffage au sol",
                            "Des teintes et des aspects pour tous les projets",
                            "Grande stabilité",
                            "Excellent rapport qualité-prix"
                        ],

                        'essences' => (object) [
                            (object) [
                                'title' => "Chêne",
                                'image' => "img/essences/chene.png"
                            ]
                        ]
                    ],

                    (object) [
                        'image' => (object) [
                            'url'   => "img/content/parquet-revetement-stratifie-toulouse.jpg",
                            'alt'   => "Pose de parquet revêtement stratifié à Toulouse"
                        ],
                        'title' => "Revêtement stratifié",
                        'text'  => "Les stratifiés actuels offrent un réalisme étonnant qui reproduit fidèlement l’aspect du bois, tout en proposant une bonne résistance à l’usure quotidienne.",

                        'assets'    => (object) [
                            "Résistant aux rayures et aux chocs",
                            "Entretien facile et rapide",
                            "Solution économique et durable",
                            "Idéal pour les espaces à fort passage"
                        ],

                        'essences' => (object) [
                            (object) [
                                'title' => "Imitations bois variés",
                                'image' => "img/essences/imitations-bois.png"
                            ],
                            (object) [
                                'title' => "Finitions mates",
                                'image' => "img/essences/pin.png"
                            ],
                            (object) [
                                'title' => "Hêtre",
                                'image' => "img/essences/hetre.png"
                            ],
                            (object) [
                                'title' => "Finitions brillantes",
                                'image' => "img/essences/frene.png"
                            ]
                        ]
                    ]
                ]
            ],
        ]
    ],
    
    // *** NEW SECTION
 
    (object) [
        'class'    => "--light",
        'components'    => (object) [

            // *** ASIDE

            (object) [
                'type'      => "aside-alt",
                'title'     => "Nos méthodes de pose : collée, clouée, flottante",
                'text'      => "Nous étudions attentivement votre sol existant (chape, ancien parquet, lambourdes…) et vous conseillons sur la méthode de pose la plus adaptée à votre situation. Notre objectif est de vous garantir un résultat esthétique mais aussi technique, pour un parquet qui durera dans le temps.",

                'carousel'  => (object) [
                    (object) [
                        'title' => "Pose collée",
                        'text'  => "Idéale pour parquets massifs et contrecollés. Parfaite sur chape plane et sèche.",
                        'image' => (object) [
                            'url'   => "img/aside/pose-de-parquet-collee.jpg",
                            'alt'   => "Pose de parquet collée"
                        ]
                    ],
                    (object) [
                        'title' => "Pose clouée",
                        'text'  => "Méthode traditionnelle, réalisée sur lambourdes ou plancher existant. Offre une sensation unique sous le pied.",
                        'image' => (object) [
                            'url'   => "img/aside/pose-de-parquet-clouee.jpg",
                            'alt'   => "Pose de parquet clouée"
                        ]
                        ],
                    (object) [
                        'title' => "Pose Flottante",
                        'text'  => "Idéale pour parquets contrecollés et stratifiés.",
                        'image' => (object) [
                            'url'   => "img/aside/pose-de-parquet-flottante.jpg",
                            'alt'   => "Pose de parquet flottante"
                        ]
                    ]
                ]
            ],

            // *** ASSETS

            (object) [
                'type'      => "assets-alt",
                'title'     => "Des finitions qui révèlent<br class='hidden-sm--max'> la beauté du bois",
                'items'     => (object) [
                    (object) [
                        'image'      => (object) [
                            'url'       => "img/assets/finition-parquet-vitrification.jpg",
                            'alt'       => "Vitrification de parquet"
                        ],
                        'title'     => "VITRIFICATION",
                        'text'      => "Protection durable et résistante contre les tâches et l’usure quotidienne. Disponible en différents niveaux de brillance, du mat profond au brillant éclatant."
                    ],
                    (object) [
                        'image'      => (object) [
                            'url'       => "img/assets/finition-parquet-huilage.jpg",
                            'alt'       => "Finition de parquet huilage"
                        ],
                        'title'     => "HUILAGE",
                        'text'      => "Pénètre le bois pour le nourrir en profondeur, tout en préservant son aspect naturel et sa respiration. Offre un toucher chaleureux et un entretien facile par zones."
                    ],
                    (object) [
                        'image'      => (object) [
                            'url'       => "img/assets/finition-parquet-teinte.jpg",
                            'alt'       => "Parquet finition teintée"
                        ],
                        'title'     => "TEINTE",
                        'text'      => "Personnalisez la couleur de votre parquet pour l’accorder parfaitement à votre décoration, du ton clair et lumineux aux nuances plus profondes et caractérisées."
                    ]
                ]
            ],
                        
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
                        
            // *** ASIDE

            (object) [
                'type'      => "aside-logos",
                
                'title'     => "Des parquets certifiés responsables",
                'text'      => "Notre sélection est rigoureuse : nous vous proposons des parquets répondant aux normes et labels les plus exigeants, gage de qualité et de respect de l’environnement : ",
                'icon'      => $icons->logo_round,
                'logos'     => 'img/aside/certifications'
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