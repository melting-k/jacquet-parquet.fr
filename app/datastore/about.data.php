<?php
return (object) [

    // SCROLL INTRO
    
    (object) [

        'type' => "scroll",
        'class' => "",

        'title' => "Que faire<br>à l’Hippodrome ?",
        'text_1' => "L’Hippodrome de Beaumont-de-Lomagne est un lieu incontournable qui va bien au-delà des courses de trot. C’est un espace dynamique où les passionnés de chevaux, les familles et les amis se rassemblent pour partager des moments mémorables.",
        'text_2' => "Que vous souhaitiez vibrer au rythme des courses, organiser un événement ou profiter d’animations festives, l’hippodrome vous offre une palette d’activités variées à chaque visite.",
        

        'cta' => (object) [
            'title' => "Découvrez les<br>événements",

            'link'   => (object) [
                'url' => $NAV->events->url,
                'title' => $NAV->events->title
            ],
            'image' => (object) [
                'url' => "img/about/decouvrez-les-evenements.jpg",
                'alt' => "Découvrez nos prochains événements"
            ]
        ],

        'catch' => (object) [
            'title' => "Véritable poumon vert de la région, l’hippodrome propose des événements privés et des animations tout au long de l’année, <span>offrant une atmosphère conviviale pour tous les âges.</span>",
            'class' => "--alt",
            'image' => (object) [
                'url' => "img/about/evenements-prives-et-animations-pour-tous.jpg",
                'alt' => "Des événéments et des animations pour tous"
            ]
        ],

        'image' => (object) [
            'url' => "img/about/cheval-au-trot.jpg",
            'alt' => "Photo d'un cheval en train de trotter"
        ]
    ],

    // CONTENT

    (object) [
        'type' => "content",
        'class' => "",

        'title' => "<span>01.</span><br>Des courses aussi hippiques qu’épiques",
        'text' => "Assistez à des courses de trot palpitantes à l’Hippodrome de Beaumont-de-Lomagne. Avec 16 réunions annuelles, c’est l’endroit parfait pour vivre l’adrénaline des paris et découvrez l’univers captivant des chevaux. Depuis la grande tribune couverte, profitez d’une vue imprenable sur la piste et de l’ambiance unique qui anime chaque course. Que vous soyez passionné de sport hippique ou simple curieux, les courses à Beaumont-de-Lomagne sont une immersion authentique dans cet univers fascinant.",

        'cta' => false,

        'image' => (object) [
            'url' => "img/about/des-courses-hippiques-et-epiques.jpg",
            'alt' => "Des courses hippiques et épiques"
        ]
    ],

    // CONTENT--SWITCH

    (object) [
        'type' => "content",
        'class' => "--switch",

        'title' => "<span>02.</span><br>Des événements d’entreprise taillés sur mesure",
        'text' => "L’hippodrome ne se limite pas aux journées de course. Il offre également un cadre idéal pour organiser des événements professionnels. Nos espaces, tels que la salle Jean Dumouch et le hall des paris, accueillent vos séminaires, repas d’affaires et réceptions jusqu’à 300 personnes dans une ambiance conviviale et verdoyante. Avec une vue spectaculaire sur la piste, chaque occasion est bonne pour venir à l’hippodrome. Faites de votre événement d’entreprise une journée qui reste gravée dans les mémoires ! 
        <br><br>
        Le plus ? La possibilité de s’offrir une visite guidée dans les coulisses de l’hippodrome et profiter d’un bus suiveur en départ de course !",

        'cta' => (object) [
            'title' => "Découvrez nos événéments pour les entreprises",

            'link' => (object) [
                'url' => $NAV->pros->url,
                'title' => $NAV->pros->title,
            ],
            
            'image' => (object) [
                'url' => "img/about/evenements-professionnels-entreprises.jpg",
                'alt' => "Des événements professionnels pour les entreprises"
            ]
        ],
    ],

    // CONTENT

    (object) [
        'type' => "content",
        'class' => "",

        'title' => "<span>03.</span><br>Des animations conviviales pour tous les âges",
        'text' => "Enfin, l’hippodrome sait aussi divertir petits et grands avec des animations et des festivités pour tous les âges. En plus des courses, des journées spéciales avec structures gonflables, sulky à pédales, et stands de restauration gourmande viennent égayer vos sorties en famille. Profitez des événements festifs tout au long de l’année, et plongez dans l’ambiance conviviale de nos journées thématiques qui allient traditions et divertissement pour le plaisir de tous.
        <br><br>
        Le plus ? La possibilité de s’offrir une visite guidée dans les coulisses de l’hippodrome ! ",

        'cta' => false,

        'image' => (object) [
            'url' => "img/about/animations-conviviales-pour-tous-les-ages.jpg",
            'alt' => "Des animations conviviales pour toute la famille !"
        ]
    ],

    // CONTENT -- ALT

    (object) [
        'type' => "content-alt",
        'class' => "",

        'title' => "Une pause<br>gourmande ?",
        'text' => "Pour compléter votre expérience à l’Hippodrome, n’oubliez pas de faire une pause gourmande ! Explorez notre offre de restauration variée : il y en a pour tous les goûts.",

        'image' => (object) [
            'url' => "img/about/pause-gourmande-hippodrome-beaumont-de-lomagne.jpg",
            'alt' => "Faites une pause gourmande dans notre hippodrome"
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