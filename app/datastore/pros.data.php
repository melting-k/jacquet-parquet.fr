<?php
return (object) [
    
    // CONTENT

    (object) [
        'type' => "content",
        'class' => "",

        'title' => "Nos événements professionnels",
        'text' => "
            <strong class='u-text--big'>VOUS ÊTES...</strong>
            <p class='u-list'>
                À la recherche d’un cadre d’exception pour votre séminaire ?<br>
                Notre hippodrome allie prestige et nature dans un écrin de verdure unique.
            </p>
            <p class='u-list'>
                Désireux d’offrir une expérience mémorable à vos collaborateurs ?<br>
                Plongez dans l’univers hippique avec nos visites guidées et animations sur mesure !
            </p>
            <p class='u-list'>
                En quête d’un espace modulable ?<br>
                Nos salles accueillent vos équipes jusqu’à 300 personnes.
            </p>
        ",

        'cta_multiple' => (object) [
            'title' => "Retrouvez plus d’informations sur nos plaquettes 2025 !",

            'links' => (object) [
                (object) [
                    'label' => "Nos offres pour les pros",
                    'url' => 'docs/plaquette-commerciale.pdf',
                    'title' => 'Découvrez nos offres pour les pros',
                ],
                (object) [
                    'label' => "Devenir partenaire",
                    'url' => 'docs/plaquette-partenariat.pdf',
                    'title' => "Devenir partenaire de l'Hippodrome",
                ],
            ],
            
            'image' => (object) [
                'url' => "img/pros/piste-de-course-hippodrome-beaumont-de-lomagne.jpg",
                'alt' => "Photo de la piste de course de l'hippodrome Beaumont de Lomagne"
            ]
        ],
    ],

    
    // ASSETS

    (object) [
        'type' => "assets",
        'bar' => true,

        'title' => "Nos espaces <br>et capacités",
        'items'  => [
            (object) [
                'image' => (object) [
                    'url' => 'img/pros/espaces-modulables.jpg',
                    'alt' => 'Des espaces modulables'
                ],
                'title' => "Des espaces modulables",
                'text' => "L’Hippodrome Beaumont-de-Lomagne vous propose plusieurs espaces et s’adapte à vos besoins avant tout."
            ],
            (object) [
                'image' => (object) [
                    'url' => 'img/pros/salle-jean-dumouch.jpg',
                    'alt' => 'La belle salle Jean Dumouch'
                ],
                'title' => "La belle salle Jean Dumouch",
                'text' => "De 106m², idéale jusqu’à 100 personnes en configuration cocktail."
            ],
            (object) [
                'image' => (object) [
                    'url' => 'img/pros/hall-des-paris.jpg',
                    'alt' => 'Le hall des paris'
                ],
                'title' => "Le hall des paris",
                'text' => "De 450m² pour vos grands événements jusqu’à 300 personnes."
            ]
        ]
    ],
    
    // ASSETS -- ALT

    (object) [
        'type' => "assets-alt",
        'bar' => true,

        'title' => "Choisissez la formule qui vous correspond",
        'subtitle' => false,
        'items'  => [
            (object) [
                'title' => "Séminaire",
                'class' => "",
                'text_1' => "<strong>à partir de <br>
                65€ / personne</strong>",
                'text_2' => false
            ],
            (object) [
                'title' => "Repas d'entreprise",
                'class' => "",
                'text_1' => "<strong>à partir de <br>
                35€ / personne</strong>",
                'text_2' => false
            ],
            (object) [
                'title' => "Arbre de Noël",
                'class' => "",
                'text_1' => "<strong>à partir de <br>
                20€ / personne</strong>",
                'text_2' => false
            ]
        ]
    ],

    // IMAGE 

    (object) [
        'type' => "image",

        'image' => (object) [
            'url' => "img/pros/une-experience-unique-pour-votre-entreprise.jpg",
            'alt' => "Proftez d'une expérience unique pour votre entreprise"
        ]
    ],

    // TEXT 

    (object) [
        'type' => "text",

        'title' => "Une expérience unique",
        'text'  => "Rendez votre séminaire inoubliable en profitant des atouts de notre hippodrome ! 
        <br><br>
        Les jours de courses, combinez travail et découverte : vivez l’effervescence des courses en direct, suivez la compétition au plus près grâce à notre bus suiveur, initiez-vous aux paris avec nos experts ou sponsorisez même une course. Toute l’année, plongez dans les coulisses de l’hippodrome avec une visite guidée et découvrez l’univers fascinant des courses hippiques. Une expérience fédératrice qui marquera les esprits de vos collaborateurs !
        <br><br>
        <strong>Exemples d’animations :</strong> <br>
        • Visite guidée : départ 5 min après chaque fin de course. Découvrez l’hippodrome avec notre visite guidée exclusive des lieux, suivie d’une expérience palpitante de course depuis notre loge !<br>
        • Bus suiveur : Départ 15 min avant le départ de la course. Vivez la course au plus près avec notre bus suiveur, vous offrant une perspective unique et immersive sur l’hippodrome ! RDV ensuite au point de rencontre (oriflamme)."
    ],
];