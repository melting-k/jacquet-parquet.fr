<?php
return (object) [
    
    // ASSETS -- ALT

    (object) [
        'type' => "assets-alt",
        'bar' => false,

        'title' => "Infos pratiques",
        'subtitle' => false,
        'items'  => [
            (object) [
                'title' => "Tarifs courses",
                'class' => "--alt",
                'text_1' => "<strong>Tarif normal : 6€<br>
                avec les programme couleur</strong>",
                'text_2' => "<strong>Gratuit jusqu’à 18 ans</strong>"
            ],
            (object) [
                'title' => "Courses",
                'class' => "--alt",
                'text_1' => "<strong>Courses de trot</strong>",
                'text_2' => "<a href='".$NAV->courses->url."' title='".$NAV->courses->title."' class='u-button'>Calendrier des courses</a>"
            ],
            (object) [
                'title' => "Événements",
                'class' => "--alt",
                'text_1' => "<strong>Animations et spectacles variés toute l’année.</strong>",
                'text_2' => "<a href='".$NAV->events->url."' title='".$NAV->events->title."' class='u-button'>Agenda des événements</a>"
            ]
        ]
    ],
    
    // ICONS

    (object) [
        'type' => "icons",
        'items'  => [
            (object) [
                'icon' => $icons->handicap,
                'title' => "Accès handicapé aux<br>pistes et au restaurant"
            ],
            (object) [
                'icon' => $icons->seminaire,
                'title' => "Séminaires jusqu’à<br>300 personnes"
            ],
            (object) [
                'icon' => $icons->restauration,
                'title' => "Restauration sur place<br>(vue panoramique)"
            ],
            (object) [
                'icon' => $icons->agenda,
                'title' => "Évènements et<br>animations toute<br>l’année"
            ],
            (object) [
                'icon' => $icons->parking,
                'title' => "Parking gratuit<br>de 500 places"
            ],
        ]
    ],

    // SCROLL INTRO

    (object) [

        'type' => "scroll",
        'class' => "",

        'title' => "Comment venir à<br>l’hippodrome ?",
        'text_1' => "<strong class='u-text--big'>COORDONNÉES</strong>
        <br><br>
        ".$site_infos->adresses()['street']."<br>
        ".$site_infos->adresses()['complement']."<br>
        ".$site_infos->adresses()['zipcode']." ".$site_infos->adresses()['city']." 
        <br><br>
        <strong>Tél : ".$site_infos->phone_number()."</strong><br>
        <strong>E-mail : <span data-email>".$site_infos->site_email()."</strong></span>",

        'text_2' => "<strong class='u-text--big'>HORAIRES</strong>
        <br><br>
        Consultez notre calendrier des courses et nos événements pour en savoir plus !",
        

        'cta' => (object) [
            'title' => "",

            'link'   => false,
            'image' => (object) [
                'url' => "img/infos/comment-venir-ou-contacter-notre-hippodrome.jpg",
                'alt' => "Comment venir à l'hippodrome ou prendre contact avec nous ?"
            ]
        ],

        'catch' => (object) [
            'title' => "Véritable poumon vert de la région, l’hippodrome propose des événements privés et des animations tout au long de l’année, <span>offrant une atmosphère conviviale pour tous les âges.</span>",
            'class' => "--alt",
            'image' => (object) [
                'url' => "img/infos/organisation-seminaires-professionnels.jpg",
                'alt' => "Des événéments professionnels et séminaires d'entreprises"
            ]
        ],

        'image' => (object) [
            'url' => "img/infos/cheval.jpg",
            'alt' => "Photo d'un cheval vu de face"
        ]
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