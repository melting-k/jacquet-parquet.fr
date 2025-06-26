<?php

//*******************************
// ICONS SVG
//*******************************

$icons_folder = realpath(__DIR__ . '/../img/icons');
$icons_array = glob($icons_folder.'/*.svg',GLOB_BRACE);
$icons = new StdClass();

foreach($icons_array as $icon)
{
    $icon_name = str_replace($icons_folder.'/','',$icon);
    $icon_name = str_replace('.svg','',$icon_name);
    $icons->$icon_name = file_get_contents($icon);
}

//*******************************
// Balises Méta + Headers content
//*******************************

$META_author = $client_name = "Jacquet Parquet";
define('SITE_FRONT_BASE','http://localhost:3000/jacquet-parquet.fr/app/');

if(isset($PAGE_name))
{
    switch ($PAGE_name) {
        case 'home':
            $META_title = "Baptiste Jacquet - Artisan parqueteur à Toulouse";
            $META_description = "Avec plus de 20 ans d'expérience d'artisan parqueteur, Baptiste Jacquet réalise la pose et rénovation de tous types de parquets et terrasses extérieures bois.";
            $META_robots = "index,follow";
            $HEADER_title = "BAPTISTE JACQUET<br>Artisan - Parqueteur";
            $HEADER_subtitle = "Pose, rénovation de parquets et terrasses en bois.<br>Un savoir-faire authentique depuis 20 ans.";
            $HEADER_img = "img/header/baptiste-jacquet-artisan-parqueteur-toulouse.jpg";
            break;
            
        case 'pose':
            $META_title = "Pose de tous types de parquets à Toulouse - Baptiste Jacquet";
            $META_description = "Baptiste Jacquet, c'est avant tout un savoir-faire artisanal pour la pose de parquets massifs, contrecollés ou stratifiés qui subliment votre intérieur.";
            $META_robots = "index,follow";
            $HEADER_title = "Pose<br>de parquets";
            $HEADER_subtitle = "Un savoir-faire artisanal pour des parquets massifs, contrecollés ou stratifiés qui subliment votre intérieur";
            $HEADER_img = "img/header/pose-de-parquets-toulouse.jpg";
            $HEADER_hero = false;
            break;
        
        case 'renovation':
            $META_title = "Rénovation de parquets anciens à Toulouse - Baptiste Jacquet";
            $META_description = "Rénovez et redonnez vie et caractère à vos parquets anciens en faisant appel à un artisan qualifié, au savoir-faire artisanal reconnu.";
            $META_robots = "index,follow";
            $HEADER_title = "Rénovation de parquets anciens";
            $HEADER_subtitle = "Redonnez vie et caractère à vos parquets d’époque avec notre savoir-faire artisanal";
            $HEADER_img = "img/header/renovation-parquets-anciens-toulouse.jpg";
            $HEADER_hero = false;
            break;
        
        case 'terrasses':
            $META_title = "Installation terrasses en bois à Toulouse - Baptiste Jacquet";
            $META_description = "Faites appel à Baptiste Jacquet pour l'installation d'une terrasse bois, qui créera un espace extérieur durable et convivial dans votre maison.";
            $META_robots = "index,follow";
            $HEADER_title = "Terrasses en bois";
            $HEADER_subtitle = "Créez un espace extérieur convivial et durable qui prolonge votre habitat";
            $HEADER_img = "img/header/installation-terrasse-bois-toulouse.jpg";
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
        "is_nav" => false
    ],

    "pose"  => (object) [
        "url"   => "pose-de-parquets-toulouse/",
        "title" => "Pose tous types de parquets à Toulouse",
        "label" => "Pose de parquets",
        "is_nav" => true
    ],

    "renovation"  => (object) [
        "url"   => "renovation-parquets-anciens-toulouse/",
        "title" => "Rénovation de vos parquets anciens ou d'époque",
        "label" => "Rénovation de parquets anciens",
        "is_nav" => true
    ],

    "terrasses"  => (object) [
        "url"   => "installation-renovation-terrasses-bois-toulouse/",
        "title" => "Installation de terrasses extérieures bois",
        "label" => "Terrasses en bois et composite",
        "is_nav" => true
    ],

    "legals"  => (object) [
        "url"   => "mentions-legales/",
        "title" => "Mentions légales et politique de confidentialité",
        "label" => "Mentions légales",
        "is_nav" => false
    ],

    "pepponito"  => (object) [
        "url"   => "https://www.pepponito.fr/",
        "title" => "Création de sites internet à Toulouse",
        "label" => "Site par Pepponito",
        "is_nav" => false
    ],

    "instagram"  => (object) [
        "url"   => "https://www.instagram.com/parquet_jacquet_toulouse/",
        "title" => "Suivez nous sur Instagram",
        "label" => "",
        "is_nav" => false
    ]
];

//*******************************
// STATIC DATAS 
//*******************************

include realpath(__DIR__).'/Gallery.php';
include realpath(__DIR__ . '/..').'/instagram/instagramAPI.class.php';

$partners = new Gallery('img/partners');

$instagram = new InstagramAPI();
$instagram->save_session(20);

$testimonials = include realpath(__DIR__.'/../datastore/testimonials.data.php');
$architects = include realpath(__DIR__.'/../datastore/architects.data.php');
$footer = include realpath(__DIR__.'/../datastore/footer.data.php');

//*******************************
// SHARING ELEMENTS
//*******************************

$ogURL = SITE_FRONT_BASE.$_SERVER['REQUEST_URI'];
$ogIMG = SITE_FRONT_BASE."/img/img-share.jpg";