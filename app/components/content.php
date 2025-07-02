<article class="c-content">
    <div class="container">
        <div class="grid">

<?php 
    if(property_exists($page_item,'title')) { 
?>
            <h2 class="c-content_title" data-parallax="fromB">
                <?=$page_item->title?>
            </h2>
<?php 
    } 
    foreach($page_item->items as $item) {
?>
            <section class="c-content_item">
                <div class="grid">
                    <figure class="c-content_item_img" data-parallax="fadeIn">
                        <img src="<?=$item->image->url?>" alt="<?=$item->image->alt?>">
                        <?=$item->image->icon ?? ''?>
                    </figure>
                    <div class="c-content_item_texts">
                        <h3 class="c-content_item_title" data-parallax="fromB">
                            <?=$item->title?>
                        </h3>
                        <p class="c-content_item_text" data-parallax="fromB">
                            <?=$item->text?>
                        </p>
<?php
    if(property_exists($item,'button')) {
?>
                        <p class="c-content_item_button" data-parallax="fromB">
                            <a class="u-button" href="<?=$item->button->url?>" title="<?=$item->button->title?>">
                                <?=$item->button->label?> <?=$item->button->icon?>
                            </a>
                        </p>
<?php
    }
    if(property_exists($item,'assets')) {
?>
                        <div class="c-content_item_assets">
                            <h3 class="c-content_item_title" data-parallax="fromB">
                                Les plus
                            </h3>
                            <div class="c-content_item_assets_items">
<?php
        foreach($item->assets as $asset) {
?>
                                <p class="c-content_item_asset">
                                    <span data-parallax="zoomIn"><?=$icons->plus?></span> 
                                    <strong data-parallax="fromR"><?=$asset?></strong>
                                </p>
<?php
        }
?>
                            </div>
                        </div>
<?php
    }
    if(property_exists($item,'essences')) {
?>
                        <div class="c-content_item_essences">
                            <h3 class="c-content_item_title" data-parallax="fromB">
                                Essences disponibles
                            </h3>
                            <div class="c-content_item_essences_items">
<?php
        $i = 0;
        foreach($item->essences as $essence) {
?>
                                <p class="c-content_item_essence" data-parallax="fromB" data-parallax-delay="<?=$i?>">
                                    <span><?=$essence->title?></span>
                                    <img src="<?=$essence->image?>" alt="<?=$essence->title?>">
                                </p>
<?php
        $i++;
        }
?>
                            </div>
                        </div>
<?php
    }
?>
                    </div>
                </div>
            </section>
<?php
    }
?>


        </div>
    </div>
</article>