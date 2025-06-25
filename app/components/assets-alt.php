<section class="c-assets--alt">
    <div class="container">
        <div class="grid">
            <?=$page_item->bar ? "<div class='c-assets_bar'></div>" : ""?>
            <h2 class="c-assets_title" data-parallax="fromB">
                <?=$page_item->title?>
            </h2>
<?php
    if($page_item->subtitle) {
?>
            <p class="c-assets_subtitle">
                <?=$page_item->subtitle?>
            </p>
<?php
    }
?>            
            <div class="c-assets_formules">
<?php
    $i = 0;
    foreach($page_item->items as $item) {
?>
                <div class="c-assets_formule" data-parallax="fromB" data-parallax-delay="<?=$i?>">
                    <h3 class="c-assets_formule_title<?=$item->class?>">
                        <span><?=$item->title?></span>
                    </h3>
                    <div class="c-assets_formule_text">
                        <p><?=$item->text_1?></p>
                    </div>
<?php
        if($item->text_2) {
?>
                    <div class="c-assets_formule_text">
                        <p><?=$item->text_2?></p>
                    </div>
<?php
        }
?>
                </div>
<?php
        $i++;
    }
?>
            </div>
        </div>
    </div>
</section>