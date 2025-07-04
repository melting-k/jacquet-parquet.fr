<aside class="c-aside--alt">
    <div class="container">
        <div class="grid">
            <div class="c-aside_wrapper">
                <div class="grid">
                    <h2 class="c-aside_title" data-parallax="fromB">
                        <?=$page_item->title?>
                    </h2>
                    <p class="c-aside_text" data-parallax="fromB">
                        <?=$page_item->text?>
                    </p>
                    <div class="c-aside_carousel" js-carousel pose>
                        <div class="c-aside_carousel_slideshow_wrapper" data-parallax="fadeIn">
                            <div class="c-aside_carousel_slideshow"  js-carousel_track>
<?php
    foreach($page_item->carousel as $slide) {
?>
                                <div class="c-aside_carousel_slide" js-carousel_slide>
                                    <img src="<?=$slide->image->url?>" alt="<?=$slide->image->alt?>">
                                    <p class="c-aside_carousel_slide_text">
                                        <strong><?=$slide->title?></strong>
                                        <br><br>
                                        <?=$slide->text?>
                                    </p>
                                </div>
<?php
    }
?>                    
                            </div>
                            <div class="c-aside_carousel_dots"  js-carousel_track>
<?php
    foreach($page_item->carousel as $slide) {
?>
                                <div class="c-aside_carousel_dots_item" js-carousel_slide js-carousel_dot></div>
<?php
    }
?>                    
                            </div>
                        </div>
                        <p class="c-aside_carousel_nav" data-parallax="fadeIn">
                            <button class="c-aside_carousel_nav_button" js-carousel_prev>
                                <?=$icons->arrow?>
                            </button>
                            <button class="c-aside_carousel_nav_button" js-carousel_next>
                                <?=$icons->arrow?>
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</aside>