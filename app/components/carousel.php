<article class="c-content--alt<?=$page_item->class?>">
    <div class="container">
        <div class="grid">
            <div class="c-content_text">
                <h2 class="c-content_title" data-parallax="fadeIn">
                    <?=$page_item->title?>
                </h2>
                <div class="c-content_desc" data-parallax="fadeIn">
<?php
if(is_array($page_item->text)) {
    foreach($page_item->text as $text) {
?>
                    <p class="c-content_desc_text">
                        <?=$text?>
                    </p>
<?php
    }
} else {
?>
                    <?=$page_item->text?>
<?php
}
?>
                </div>
<?php
foreach($page_item->cta as $cta) {
?>
                <a href="<?=$cta->link->url?>" title="<?=$cta->link->title?>" class="c-content_button <?=property_exists($cta->link,'class') ? $cta->link->class : ''?>" data-parallax="fadeIn">
                    <p class="c-content_button_title">
                        <?=$cta->title?>
                    </p>
                    <span class="c-content_button_arrow">
                        <?=$icons->arrow?>
                    </span>
                </a>
<?php
}
?>
            </div>
            <div class="c-content_image">
                <img src="<?=$page_item->image->url?>" alt="<?=$page_item->image->alt?>" data-parallax="fadeIn">
            </div>
        </div>
    </div>
</article>