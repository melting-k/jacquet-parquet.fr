<section class="c-assets">
    <div class="container">
        <div class="grid">
            <?=$page_item->bar ? "<div class='c-assets_bar'></div>" : ""?>
            <h2 class="c-assets_title" data-parallax="fromB">
                <?=$page_item->title?>
            </h2>
            <div class="c-assets_items">
<?php
    $i = 0;
    foreach($page_item->items as $item) {
?>
                <div class="c-assets_item">
                    <img src="<?=$item->image->url?>" alt="<?=$item->image->alt?>">
                    <h3 class="c-assets_item_title" data-parallax="fromB" data-parallax-delay="<?=$i?>">
                        <?=$item->title?>
                    </h3>
                    <p class="c-assets_item_text" data-parallax="fromB" data-parallax-delay="<?=$i?>">
                        <?=$item->text?>
                    </p>
                </div>
<?php
        $i++;
    }
?>
            </div>
        </div>
    </div>
</section>