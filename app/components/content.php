<article class="c-content<?=$page_item->class?>">
    <div class="container">
        <div class="grid">
            <div class="c-content_wrapper">
                <div class="c-content_text">
                    <h2 class="c-content_title" data-parallax="fadeIn">
                        <?=$page_item->title?>
                    </h2>
                    <div class="c-content_desc" data-parallax="fadeIn">
                        <?=$page_item->text?>
                    </div>
                </div>
<?php
    if(property_exists($page_item,'cta_multiple')) {
?>
                <div class="c-content_cta--multiple" data-parallax="fadeIn">
                    <img src="<?=$page_item->cta_multiple->image->url?>" alt="<?=$page_item->cta_multiple->image->alt?>">
                    <h3 class="c-content_cta_title">
                        <?=$page_item->cta_multiple->title?>
                    </h3>
                    <p class="c-content_cta_links">
<?php
        foreach($page_item->cta_multiple->links as $cta) {
?>
                        <a href="<?=$cta->url?>" title="<?=$cta->title?>" class="u-button" target="_blank">
                            <?=$cta->label?> <?=$icons->download?>
                        </a>
<?php
        }
?>
                    </p>
                </div>
<?php
    } elseif($page_item->cta) {
?>
                <a href="<?=$page_item->cta->link->url?>" title="<?=$page_item->cta->link->title?>" class="c-content_cta" data-parallax="fadeIn">
                    <img src="<?=$page_item->cta->image->url?>" alt="<?=$page_item->cta->image->alt?>">
                    <h3 class="c-content_cta_title">
                        <?=$page_item->cta->title?>
                    </h3>
                    <span class="c-content_cta_button">
                        <?=$icons->arrow?>
                    </span>
                </a>
<?php
    } else {
?>
                <div class="c-content_image">
                    <img src="<?=$page_item->image->url?>" alt="<?=$page_item->image->alt?>" data-parallax="fadeIn">
                </div>
<?php
    }
?>
            </div>
        </div>
    </div>
</article>