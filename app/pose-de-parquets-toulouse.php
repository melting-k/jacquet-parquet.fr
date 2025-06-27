<?php 

$PAGE_name = 'pose';
include 'includes/inc-header.php'; 

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
