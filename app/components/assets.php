<section class="c-assets">
    <div class="container">
        <div class="grid">
            <h2 class="c-assets_title">
                <?=$page_item->title?>
            </h2>

<?php
    $i = 0;
    foreach($page_item->items as $item) {
?>
            <div class="c-assets_item">
                <p class="c-assets_item_icon" data-parallax="zoomIn" data-parallax-delay="<?=$i?>"><?=$item->icon?></p>
                <p data-parallax="fromB"><strong><?=$item->title?></strong></p>
                <p data-parallax="fromB"><?=$item->text?></p>
            </div>
<?php
        $i++;
    }
?>

        </div>
    </div>
</section>