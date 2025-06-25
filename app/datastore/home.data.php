<?php
return (object) [
    (object) [

        // SCROLL INTRO

        'type' => "scroll",
        'class' => "",

        'title' => "Bienvenue à<br>l’Hippodrome de<br>Beaumont-de-Lomagne",
        'text_1' => "Un lieu mythique et incontournable pour tous les amateurs de courses hippiques et les curieux en quête d’une journée inoubliable. Notre hippodrome (labellisé Equures) vous invite à découvrir une ambiance unique, où la convivialité et l’exaltation des courses se rencontrent",
        'text_2' => "Que vous soyez passionné de paris, en quête d’une sortie en famille, ou désireux de profiter de la douceur de notre cadre verdoyant, chez nous, il y a toujours une place pour vous.",
        

        'cta' => (object) [
            'title' => "Découvrez les<br>prochaines courses",

            'link'   => (object) [
                'url' => $NAV->courses->url,
                'title' => $NAV->courses->title
            ],
            'image' => (object) [
                'url' => "img/home/decouvrez-les-prochaines-courses.jpg",
                'alt' => "Découvrez les prochaines courses à vivre à l'Hippodrome BordeVieille"
            ]
        ],

        'catch' => (object) [
            'title' => "Ne faites pas que regarder la course : <span>vivez-la</span>",
            'class' => "",
            'image' => (object) [
                'url' => "img/home/vivez-la-course.jpg",
                'alt' => "Vivez des courses intenses à l'Hippodrome de Beaumont de Lomagne"
            ]
        ],

        'image' => (object) [
            'url' => "img/home/cheval-au-trot.jpg",
            'alt' => "Photo d'un cheval en train de trotter"
        ]
    ],

    // IMAGE 

    (object) [
        'type' => "image",

        'image' => (object) [
            'url' => "img/home/course-hippique.jpg",
            'alt' => "Photo d'une course hippique avec un cheval tirant un chariot et son cavalier"
        ]
    ],

    // TEXT 

    (object) [
        'type' => "text",

        'title' => "Près de 150 ans de passion du cheval",
        'text'  => "Fondé en 1875, l’association des courses de Beaumont-de-Lomagne a traversé les âges, témoin de l’évolution du monde hippique et de la passion locale pour les courses de chevaux. Initialement installé en bord de ville, il a été déplacé en 1925 à son emplacement actuel à Bordevieille, devenant au fil du temps une véritable institution.<br>
        En 100 ans, ses tribunes, sa piste en sable rose et ses installations ont évolué au rythme des plus grands champions qui sont venus en terre lomagnole écrire quelques unes des plus belles pages du grand livre du trot internationnal : Eléazar, Idéal du Gazeau, Ourasi, Timoko ou encore Aubrion du Gers."
    ],

    // ASSETS

    (object) [
        'type' => "assets",
        'bar' => true,

        'title' => "Que faire<br>à l’hippodrome ?",
        'items'  => [
            (object) [
                'image' => (object) [
                    'url' => 'img/home/courses-hippiques.jpg',
                    'alt' => 'Courses hippiques'
                ],
                'title' => "Courses hippiques",
                'text' => "Venez vibrer au rythme des courses, où l’excitation des paris se mêle au spectacle impressionnant des trotteurs en action."
            ],
            (object) [
                'image' => (object) [
                    'url' => 'img/home/animations-et-festivites.jpg',
                    'alt' => 'Animations et festivités'
                ],
                'title' => "Animations et festivités",
                'text' => "Découvrez tout au long de l’année des animations familiales, fêtes et spectacles dans une ambiance conviviale et décontractée."
            ],
            (object) [
                'image' => (object) [
                    'url' => 'img/home/evenements-professionnels.jpg',
                    'alt' => 'Événements professionnels'
                ],
                'title' => "Événements professionnels",
                'text' => "Organisez vos séminaires dans un cadre unique et profitez du restaurant panoramique pour un moment gourmand avec vue sur la piste."
            ]
        ]
    ],

    // CONTENT -- SWITCH -- SECONDARY

    (object) [
        'type' => "content",
        'class' => "--switch--secondary",

        'title' => "Une piste de référence pour des compétitions d’envergure",
        'text' => "Véritable institution du trot, notre hippodrome appartient au pôle régional B. La piste, homologuée en 2009, offre deux options de départ : 2400 ou 2950m pour l’autostart, et 2550m pour les départs aux cellules. Avec sa largeur de 20m, ses lignes droites de 400m et une ligne d’arrivée de 250m, elle est idéale pour offrir un spectacle intense et palpitant. Des courses PMU régulières, dont certaines avec le célèbre Tiercé Quarté Quinté+, garantissent une expérience inoubliable pour les amateurs. La piste intérieure, rénovée en 2019, permet également aux professionnels de s’entraîner dans des conditions optimales grâce à ses 800 mètres de longueur, en vue de préparer les chevaux pour leur prochain engagement.",

        'cta' => (object) [
            'title' => "Calendrier des courses",

            'link' => (object) [
                'url' => $NAV->courses->url,
                'title' => $NAV->courses->title,
            ],
            
            'image' => (object) [
                'url' => "img/home/calendrier-des-courses-de-hippodrome.jpg",
                'alt' => "Photo d'une course de chevaux dans l'hippodrome de Beaumont de Lomagne"
            ]
        ],
    ],

    // SCROLL ALT

    (object) [
        'type' => "scroll",
        'class' => "--secondary",

        'title' => "Nos réunions Premium",
        'text_1' => "Durant l’ensemble des réunions Premium, le PMU vous invite à le rejoindre sur son stand implanté dans le hall des paris de l’hippodrome. Le commercial présent sur place vous proposera à la fois de découvrir les jeux mais aussi de participer à diverses opérations : concours de pronostics, quiz, tirages aux sorts…",
        'text_2' => "Ainsi que bien d’autres animations pour vous faire gagner de nombreux cadeaux ou des paris gratuits. Vous aurez la possibilité de jouer avec votre smartphone en téléchargeant l’application PMU+, et en profitant d’une offre exceptionnelle de 20 € offert !",

        'app' => true,
        

        'cta' => (object) [
            'title' => "Télécharger<br>l'application",
            
            'link'   => (object) [
                'url' => $NAV->pmu_app->url,
                'title' => $NAV->pmu_app->title,
                'blank' => true
            ],
            'image' => (object) [
                'url' => "img/home/telecharger-application-pmu.jpg",
                'alt' => "Téléchargez l'application PMU pari hippique"
            ]
        ],

        'catch' => (object) [
            'title' => "L’équipe de l’association des courses de Beaumont-de-Lomagne vous attend sur l’hippodrome <span>pour vous présenter un véritable spectacle de courses inédites.</span>",
            'class' => "--alt",
            'image' => (object) [
                'url' => "img/home/un-spectacle-de-courses-inedites.jpg",
                'alt' => "Un spectacle unique et des courses hippiques inédites"
            ]
        ],

        'image' => (object) [
            'url' => "img/home/cavalier-course-hippique.jpg",
            'alt' => "Photo d'un cavalier en train d'atteler son cheval"
        ]
    ],

    // ASSETS -- ALT

    (object) [
        'type' => "assets-alt",
        'bar' => false,

        'title' => "OFFRE FIDÉLITÉ CLIENTS de l’hippodrome et PMU<br>POUR 2 PERSONNES",
        'subtitle' => "*Visite guidée et Bus suiveur seulement sur les dates prédéfinies",
        'items'  => [
            (object) [
                'title' => "Argent",
                'class' => "",
                'text_1' => "<strong>Entrée gratuite</strong><br>
                <strong>Boisson offerte</strong><br>
                (hors champagne)",
                'text_2' => "<strong>
                    Visite guidée<br>
                    Bus suiveur*
                </strong>"
            ],
            (object) [
                'title' => "Or",
                'class' => "",
                'text_1' => "<strong>Entrée gratuite<br> 
                Boisson offerte</strong>",
                'text_2' => "<strong>
                    Visite guidée<br>
                    Bus suiveur*
                </strong>"
            ],
            (object) [
                'title' => "Club",
                'class' => "",
                'text_1' => "<strong>Entrée gratuite<br> 
                Boisson offerte<br>
                Repas Offert</strong>",
                'text_2' => "<strong>
                    Visite guidée<br>
                    Bus suiveur*
                </strong>"
            ]
        ]
    ],

    // IMAGE 

    (object) [
        'type' => "image",

        'image' => (object) [
            'url' => "img/home/course-hippique-avec-chariot.jpg",
            'alt' => "Photo d'une course hippique avec un chariot et un cavalier"
        ]
    ],

    // CONTENT -- ALT

    (object) [
        'type' => "content-alt",
        'class' => "",

        'title' => "Que manger à l’Hippodrome ?",
        'text' => [
            "Lors des jours de courses, venez découvrir nos différents espaces de restauration : le restaurant panoramique, avec une vue imprenable sur la piste, propose une cuisine raffinée dans un cadre moderne et confortable. Pour un repas plus décontracté, profitez d’un délicieux menu entrée-plat-dessert à prix tout doux dans notre brasserie, ou d’un régressif sandwich-frites dans notre snack et sa belle terrasse extérieure.",
            "<strong>Notre incontournable ? Un bar panoramique avec vue sur les pistes, pour un apéritif autour d’une planche de charcuterie et/ou d’un verre de champagne.</strong>"
        ],

        'image' => (object) [
            'url' => "img/home/que-manger-dans-notre-hippodrome.jpg",
            'alt' => "Que manger à l'Hippodrome Beaumont de Lomagne ?"
        ],

        'cta' => [
            (object) [
                'title' => "Découvrez notre offre de restauration",

                'link' => (object) [
                    'url' => $NAV->restauration->url,
                    'title' => $NAV->restauration->title,
                ]
            ]
        ],
    ],

    // CONTENT -- PRIMARY

    (object) [
        'type' => "content",
        'class' => "--primary",

        'title' => "L’Hippodrome de Beaumont-de-Lomagne propose bien plus que des courses.",
        'text' => "Vivez des moments uniques avec nos événements spéciaux, que ce soit pour vos séminaires et repas d’entreprise ou pour satisfaire les amateurs d’aventure avec des baptêmes de sulky. Les plus jeunes profiteront des structures gonflables et du sulky à pédales lors des journées dédiées aux familles.",

        'cta' => (object) [
            'title' => "Consultez notre agenda",

            'link' => (object) [
                'url' => $NAV->events->url,
                'title' => $NAV->events->title,
            ],
            
            'image' => (object) [
                'url' => "img/home/un-hippodrome-avec-bien-plus-que-des-courses.jpg",
                'alt' => "Photo d'un événement se tenant à l'hippodrome de Beaumont de Lomagne"
            ]
        ],
    ],

    (object) [
        'type' => "testimonials",
    ],
    (object) [
        'type' => "partners",
    ],
    (object) [
        'type' => "label",
    ],
];