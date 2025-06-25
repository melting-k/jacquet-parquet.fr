<?php
return (object) [
    

    // CONTENT

    (object) [
        'type' => "content",
        'class' => "",

        'title' => "Notre offre de restauration",
        'text' => "
            <strong class='u-text--big'>VOUS AVEZ...</strong>
            <p class='u-list'>
                Envie de vous détendre avec une vue imprenable sur la piste ?<br>
                Venez savourer un repas raffiné dans notre restaurant panoramique ! 
            </p>
            <p class='u-list'>
                Soif d’une pause gourmande tout en suivant l’action ?<br>
                Notre bar panoramique est le meilleur endroit pour déguster une planche de charcuterie en sirotant une coupe de champagne. 
            </p>
            <p class='u-list'>
                Faim d’un repas convivial et rapide ?<br>
                Notre brasserie vous attend pour un moment de détente dans une ambiance décontractée !
            </p>
            <p class='u-list'>
                Un petit creux à combler ?<br>
                Notre snack et sa terrasse extérieure vous proposent des sandwichs savoureux pour une pause rapide et gourmande !
            </p>
        ",

        'cta' => false,

        'image' => (object) [
            'url' => "img/restauration/notre-offre-de-restauration.jpg",
            'alt' => "Découvrez l'offre de restauration de l'hippodrome"
        ]
    ],

    

    // CONTENT -- ALT -- SECONDARY

    (object) [
        'type' => "content-alt",
        'class' => "--secondary",

        'title' => "Restaurant panoramique",
        'text' => [
            "Notre restaurant panoramique est l’endroit idéal pour allier plaisir gustatif et spectacle des courses. Avec sa vue imprenable sur la piste, vous serez aux premières loges pour suivre l’action tout en savourant une cuisine raffinée, élaborée avec des produits de qualité. Ouvert les jours de courses, nous vous accueillons dès 12h00 et jusqu’à la fin des épreuves. Une expérience unique où tradition et modernité se rencontrent, idéale pour une sortie en famille ou entre amis.",
            "<strong>Pour vos séminaires d’entreprise, que diriez-vous de sortir de l’ordinaire ? Nous vous accueillons dans notre restaurant avec jusqu’à 150 places assises. Vous êtes plus nombreux ? Contactez-nous : nous avons d’autres espaces pour vous, jusqu’à 300 personnes.</strong>"
        ],

        'image' => (object) [
            'url' => "img/restauration/restaurant-panoramique-hippodrome-bordevieille.jpg",
            'alt' => "Découvrez le restaurant panoramique de l'hippodrome Beaumont de Lomagne"
        ],

        'cta' => [
            (object) [
                'title' => "Réservez pour garantir votre place au plus près de l’action !",

                'link' => (object) [
                    'url' => $NAV->infos->url,
                    'title' => $NAV->infos->title,
                ]
            ]
        ],
    ],

    // CONTENT -- SECONDARY

    (object) [
        'type' => "content",
        'class' => "--secondary",

        'title' => "Bar panoramique",
        'text' => "Le bar panoramique est un lieu convivial, parfait pour ceux qui souhaitent se plonger dans l’ambiance des courses tout en profitant d’une coupe de champagne. Situé au cœur de l’hippodrome, cet espace offre une vue directe sur la piste, vous permettant de suivre la compétition en direct. 
        <br><br>
        Venez vivre une expérience conviviale et authentique dans un cadre moderne, à la fois raffiné et accueillant !",

        'cta' => false,

        'image' => (object) [
            'url' => "img/restauration/bar-panoramique-hippodrome-beaumont-de-lomagne.jpg",
            'alt' => "Découvrez notre bar panoramique"
        ]
    ],

    // CONTENT -- SECONDARY -- SWITCH

    (object) [
        'type' => "content",
        'class' => "--switch--secondary",

        'title' => "Brasserie",
        'text' => "Notre brasserie est l’endroit parfait pour un moment de détente en famille ou entre amis dans une ambiance décontractée. Située au cœur de l’hippodrome, vous pourrez y croiser les drivers, jockeys et entraîneurs, rendant l’expérience encore plus immersive. Accessible les jours de courses, nous vous y proposons une restauration rapide et conviviale, idéale pour profiter d’un repas sans se détourner de l’action sur la piste.
        <br><br>
        Venez savourer un moment convivial au cœur de l’action, dans une ambiance décontractée où turfistes et passionnés se retrouvent !",

        'cta' => false,

        'image' => (object) [
            'url' => "img/restauration/brasserie-hippodrome-beaumont-de-lomagne.jpg",
            'alt' => "Découvrez la brasserie de l'hippodrome"
        ]
    ],

    (object) [
        'type' => "testimonials",
    ],
    (object) [
        'type' => "label",
    ],
];