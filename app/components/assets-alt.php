<section class="c-assets--alt">
    <div class="container">
        <div class="grid">
            <h2 class="c-assets_title" data-parallax="fadeIn">
                <?=$page_item->title?>
            </h2>
            <div class="c-assets_items">

<?php
    $i = 0;
    foreach($page_item->items as $item) {
?>
                <div class="c-assets_item">
                    <p class="c-assets_item_image" data-parallax="zoomIn50" data-parallax-delay="<?=$i?>">
                        <img src="<?=$item->image->url?>" alt="<?=$item->image->alt?>">
                    </p>
                    <p data-parallax="fromB"><strong><?=$item->title?></strong></p>
                    <p data-parallax="fromB"><?=$item->text?></p>
                </div>
<?php
        $i++;
    }
?>
            </div>
        </div>
    </div>
</section>