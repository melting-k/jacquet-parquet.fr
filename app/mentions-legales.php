<?php 

$PAGE_name = 'legals';
include 'includes/inc-header.php'; 

$LEGALS_client_societe = "Jacquet Parquet";
$LEGALS_client_name = "Baptiste Jacquet";
$LEGALS_client_role = "Gérant";
$LEGALS_client_statut = "SARL";
$LEGALS_client_nom_dirigeant = "Baptiste Jacquet";
$LEGALS_client_rcs = "RCS de Toulouse";
$LEGALS_client_siren = "519491138";
$LEGALS_client_siegesocial = "474 Chemin des Téoulets - 31330 Merville";
$LEGALS_client_mail  = "contact@jacquet-parquet.fr";
$LEGALS_client_tel  = "05 61 99 84 79";
$LEGALS_client_url  = "www.jacquet-parquet.fr";
?>

<section id="content">
<?php
    $page = include realpath(__DIR__).'/datastore/'.$PAGE_name.'.data.php';

    foreach($page as $section) {
?>
    
    <section class="u-section<?=$section->class?>" id="<?=$section->id ?? ''?>">
<?php
            foreach($section->components as $page_item) {
                include "components/$page_item->type.php";
            }
?>
    </section>
    
<?php
    }
?>
</section>

<?php 
    include 'includes/inc-footer.php'; 
?>
