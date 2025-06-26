<aside class="c-scroll<?=$page_item->class?>" js-hscroll>
    <div class="container">
        <div class="grid">
            <div class="c-scroll_wrapper" js-hscroll_wrapper>
                <div class="c-scroll_view" js-hscroll_view>
                    <div class="c-scroll_intro">
                        <h2 class="c-scroll_title" data-parallax="fadeIn">
                            <?=$page_item->title?>
                        </h2>
                        <div class="c-scroll_text">
                            <p class="c-scroll_text_item" data-parallax="fadeIn">
                                <?=$page_item->text_1?>
                            </p>
                            <p class="c-scroll_text_item" data-parallax="fadeIn">
                                <?=$page_item->text_2?>
                            </p>
<?php
    if(property_exists($page_item,'app')) {
?>
                            <p class="c-scroll_text_app">
                                Disponible sur : 
                                <a href="<?=$NAV->pmu_app_android->url?>" title="<?=$NAV->pmu_app_android->title?>" target="_blank">
                                    <?=$icons->play_store?>
                                </a>
                                <a href="<?=$NAV->pmu_app_apple->url?>" title="<?=$NAV->pmu_app_apple->title?>" target="_blank">
                                    <?=$icons->apple_store?>
                                </a>
                            </p>
<?php
    }
?>
                        </div>
                    </div>

<?php
    if($page_item->cta->link) {
?>
                    <a href="<?=$page_item->cta->link->url?>" title="<?=$page_item->cta->link->title?>" <?=property_exists($page_item->cta->link,'blank') ? 'target="_blank"' : ''?> class="c-scroll_cta" data-parallax="fadeIn">
                        <img src="<?=$page_item->cta->image->url?>" alt="<?=$page_item->cta->image->alt?>" data-parallax="fadeIn">
                        <h3 class="c-scroll_cta_title">
                            <?=$page_item->cta->title?>
                        </h3>
                        <span class="c-scroll_cta_button">
                            <?=$icons->arrow?>
                        </span>
                    </a>
<?php
    } else {
?>
                    <img src="<?=$page_item->cta->image->url?>" alt="<?=$page_item->cta->image->alt?>" class="c-scroll_cta_image" data-parallax="fadeIn">
<?php
    }
?>

                    <div class="c-scroll_catch<?=$page_item->catch->class?>">
                        <h3 class="c-scroll_catch_title" data-parallax="fadeIn">
                            <?=$page_item->catch->title?>
                        </h3>
                        <img src="<?=$page_item->catch->image->url?>" alt="<?=$page_item->catch->image->alt?>" data-parallax="fadeIn">
                    </div>
                    <img src="<?=$page_item->image->url?>" alt="<?=$page_item->image->alt?>" class="c-scroll_image" data-parallax="fadeIn">
                </div>
                <div class="c-scroll_scrollbar">
                    <div class="c-scroll_scrollbar_bar" js-hscroll_scrollbar></div>
                </div>
            </div>
            <div class="c-scroll_scroller" js-hscroll_scroller>
            </div>
        </div>
    </div>
</aside>