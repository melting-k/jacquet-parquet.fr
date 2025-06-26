<?php 

$PAGE_name = 'home';
include 'includes/inc-header.php'; 

?>

<section id="main">
<?php
    $page = include realpath(__DIR__).'/datastore/'.$PAGE_name.'.data.php';

    foreach($page as $section) {
?>
    
    <section class="u-section<?=$section->class?>">
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
