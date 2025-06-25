<?php

define ('FOLDER_ADMIN',"back-office/");

require realpath(__DIR__ . '/..').'/'.FOLDER_ADMIN.'includes/inc_config.php';

//*******************************
// ICONS SVG
//*******************************

$icons_folder = realpath(__DIR__ . '/../img/icons');
$icons_mag_folder = realpath(__DIR__ . '/../img/icons/mag');
$icons_array = glob($icons_folder.'/*.svg',GLOB_BRACE);
$icons_mag_array = glob($icons_mag_folder.'/*.svg',GLOB_BRACE);
$icons = new StdClass();
$icons_mag = new StdClass();

foreach($icons_array as $icon)
{
    $icon_name = str_replace($icons_folder.'/','',$icon);
    $icon_name = str_replace('.svg','',$icon_name);
    $icons->$icon_name = file_get_contents($icon);
}
foreach($icons_mag_array as $icon)
{
    $icon_name = str_replace($icons_mag_folder.'/','',$icon);
    $icon_name = str_replace('.svg','',$icon_name);
    $icons_mag->$icon_name = file_get_contents($icon);
}

//*******************************
// Balises Méta + Headers content
//*******************************

$META_author = $client_name = "Hippodrome BordeVieille";

if(isset($PAGE_name))
{
    switch ($PAGE_name) {
        case 'home':
            $META_title = "Hippodrome Borde-Vieille à Beaumont de Lomagne (82)";
            $META_description = "Bienvenue à l'Hippodrome de Beaumont de Lomagne. Courses hippiques, événements professionnels ou animations pour toute la famille, au cœur du Tarn-et-Garonne.";
            $META_robots = "index,follow";
            $HEADER_title = "Bienvenue à l'hippodrome";
            $HEADER_subtitle = "de Beaumont-de-Lomagne";
            $HEADER_img = "img/header/hippodrome-beaumont-de-lomagne.jpg";
            $HEADER_hero = false;
            break;
            
        case 'about':
            $META_title = "Découvrez notre hippodrome et nos activités pour tous ";
            $META_description = "Découvrez notre panel d'activités : courses hippiques pour les passionnés, événements d'entreprise et activités conviviales pour toute la famille !";
            $META_robots = "index,follow";
            $HEADER_title = "Des activités pour tous les";
            $HEADER_subtitle = "âges et tous les goûts";
            $HEADER_img = "img/header/decouvrir-hippodrome-beaumont-de-lomagne.jpg";
            $HEADER_hero = false;
            break;
        
        case 'pros':
            $META_title = "Séminaires et événements professionnels | Hippodrome Beaumont de Lomagne";
            $META_description = "Organisez des séminaires & événements professionnels qui sortent de l'ordinaire, dans un cadre unique, à l'Hippodrome de Beaumont de Lomagne.";
            $META_robots = "index,follow";
            $HEADER_title = "Organisez des séminaires";
            $HEADER_subtitle = "qui sortent de l'ordinaire";
            $HEADER_img = "img/header/evenements-professionnels-hippodrome-beaumont-de-lomagne.jpg";
            $HEADER_hero = false;
            break;
        
        case 'restauration':
            $META_title = "Notre offre de restauration | Hippodrome Beaumont de Lomagne";
            $META_description = "Découvrez l'offre de restauration de notre hippodrome : du restaurant panoramique au snack décontracté en toute simplicité, il y en a pour tous les goûts !";
            $META_robots = "index,follow";
            $HEADER_title = "Du restaurant panoramique";
            $HEADER_subtitle = "au snack décontracté";
            $HEADER_img = "img/header/offre-restaurant-hippodrome-beaumont-de-lomagne.jpg";
            $HEADER_hero = false;
            break;
        
        case 'courses':
            $META_title = "Calendrier des courses et des épreuves de qualification";
            $META_description = "Retrouvez le calendrier des courses passées et à venir à l'Hippodrome de Beaumont de Lomagne, ainsi que les dates des épreuves de qualification.";
            $META_robots = "index,follow";
            $HEADER_title = "Découvrez notre calendrier";
            $HEADER_subtitle = "de courses de trot";
            $HEADER_img = "img/header/calendrier-courses-et-epreuves-de-qualifications.jpg";
            $HEADER_hero = false;
            break;
        
        case 'events':
            $META_title = "Dates des événements à venir à l'Hippodrome Beaumont de Lomagne";
            $META_description = "Retrouvez tous les événements à venir à l'Hippodrome de Beaumont de Lomagne, et venez profiter d'un moment de détente en famille ou entre amis !";
            $META_robots = "index,follow";
            $HEADER_title = "Retrouvez les dates";
            $HEADER_subtitle = "de nos prochains événements";
            $HEADER_img = "img/header/evenements-familiaux-hippodrome-beaumont-de-lomagne.jpg";
            $HEADER_hero = false;
            break;
        
        case 'event':
            $META_robots = "index,follow";
            $HEADER_hero = true;
            break;

        case 'infos':
            $META_title = "Infos pratiques avant de vous rendre à l'Hippodrome";
            $META_description = "Retrouvez toutes les informations utiles pour vous rendre à l'Hippodrome de Beaumont de Lomagne : accès, adresse, tarifs, horaires d'ouverture et informations de contact.";
            $META_robots = "index,follow";
            $HEADER_title = "Notre adresse,";
            $HEADER_subtitle = "nos tarifs et plus encore";
            $HEADER_img = "img/header/infos-pratiques-tarifs-horaires-hippodrome-beaumont-de-lomagne.jpg";
            $HEADER_hero = false;
            break;

        case 'legals':
            $META_title = "Mentions légales et politique de confidentialité | Les Démurailleurs";
            $META_description = "Les mentions légales relatives à l'utilisation du site www.les-demurailleurs.fr, ainsi que notre politique de confidentialité à l'égard de vos données personnelles";
            $META_robots = "noindex,nofollow";
            $HEADER_title = "Mentions légales";
            $HEADER_subtitle = "et politique de confidentialité";
            $HEADER_hero = true;
            break;
            
        case 'erreur404':
            $META_title = "OUPS... Une erreur est survenue.";
            $META_description = "La page ou le contenu que vous recherchez n'existe plus ou a été déplacé. Utilisez notre plan de site pour retrouver les informations que vous recherchez";
            $META_robots = "noindex,nofollow";
            $HEADER_title = "Erreur 404";
            $HEADER_subtitle = null;
            $HEADER_hero = true;
            break;
            
        default:
            $META_description = '';
            $META_title = '';
            break;
    }
}


//*******************************
// Navigation du site
//*******************************

$NAV = (object) [
    "home"  => (object) [
        "url"   => "",
        "title" => "Retour à l'accueil",
        "label" => "",
        "is_nav" => false,
        "is_nav_footer" => false
    ],

    "about"  => (object) [
        "url"   => "decouvrir-hippodrome-beaumont-de-lomagne/",
        "title" => "Découvrez notre hippodrome",
        "label" => "Découvrir",
        "is_nav" => true,
        "is_nav_footer" => true 
    ],

    "restauration"  => (object) [
        "url"   => "restaurant-hippodrome-beaumont-de-lomagne/",
        "title" => "Découvrez notre offre de restauration",
        "label" => "Restauration",
        "is_nav" => true,
        "is_nav_footer" => true  
    ],

    "courses"  => (object) [
        "url"   => "calendrier-courses-hippiques/",
        "title" => "Calendrier des courses et épreuves de qualification",
        "label" => "Calendrier des courses",
        "is_nav" => true,
        "is_nav_footer" => true   
    ],

    "pros"  => (object) [
        "url"   => "seminaires-et-evenements-professionnels/",
        "title" => "Organisez votre séminaire professionnel",
        "label" => "Évènements pros",
        "is_nav" => true,
        "is_nav_footer" => true   
    ],

    "events"  => (object) [
        "url"   => "animations-et-evenements-hippodrome-beaumont-de-lomagne/",
        "title" => "Nos événements et animations à venir",
        "label" => "Animations",
        "is_nav" => true,
        "is_nav_footer" => true   
    ],

    "event"  => (object) [
        "url"   => "evenement/",
        "title" => "Découvrir cet événement",
        "label" => "",
        "is_nav" => false,
        "is_nav_footer" => false   
    ],

    "infos"  => (object) [
        "url"   => "infos-pratiques-et-contact/",
        "title" => "Infos pratiques et contact",
        "label" => "Infos pratiques",
        "is_nav" => true,
        "is_nav_footer" => true   
    ],

    "legals"  => (object) [
        "url"   => "mentions-legales/",
        "title" => "Mentions légales et politique de confidentialité",
        "label" => "Mentions légales",
        "is_nav" => false,
        "is_nav_footer" => false 
    ],

    "pepponito"  => (object) [
        "url"   => "https://www.pepponito.fr/",
        "title" => "Création de sites internet à Toulouse",
        "label" => "Site par Pepponito",
        "is_nav" => false,
        "is_nav_footer" => false
    ],

    "pmu_app_apple"  => (object) [
        "url"   => "https://apps.apple.com/app/id369344998?mt=8",
        "title" => "Télécharger l'application PMU",
        "label" => "",
        "is_nav" => false,
        "is_nav_footer" => false
    ],

    "pmu_app_android"  => (object) [
        "url"   => "https://play.google.com/store/apps/details?id=fr.pmu.hippique",
        "title" => "Télécharger l'application PMU",
        "label" => "Site par Pepponito",
        "is_nav" => false,
        "is_nav_footer" => false
    ],

    "pmu_app"  => (object) [
        "url"   => "https://www.pmu.fr/turf/static/pmumobile/",
        "title" => "Télécharger l'application PMU",
        "label" => "",
        "is_nav" => false,
        "is_nav_footer" => false
    ]
];

//*******************************
// SHARING ELEMENTS
//*******************************

$ogURL = SITE_FRONT_BASE.$_SERVER['REQUEST_URI'];
$ogIMG = SITE_FRONT_BASE."/img/img-share.jpg";