<?php 

$PAGE_name = 'infos';
include 'includes/header.php'; 

?>
<section id="main">
    <?php
        $page = include realpath(__DIR__).'/datastore/'.$PAGE_name.'.data.php';

        foreach($page as $page_item) {
            include "components/$page_item->type.php";
        }
    ?>
</section>

<?php 
    include 'includes/footer.php'; 
?>
