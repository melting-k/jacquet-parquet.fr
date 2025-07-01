<aside class="c-aside--logos">
    <div class="container">
        <div class="grid">
            <div class="c-aside_wrapper">
                <p class="c-aside_icon" data-parallax="zoomIn50">
                    <?=$page_item->icon?>
                </p>
                <h2 class="c-aside_title" data-parallax="fromB">
                    <?=$page_item->title?>
                </h2>
                <p class="c-aside_text" data-parallax="fromB">
                    <?=$page_item->text?>
                </p>
                <div class="c-aside_logos" js-carousel pose>
                    <div class="c-aside_logos_slideshow" js-carousel_track>
<?php
$images = new Gallery($page_item->logos);
foreach($images->images as $image) {
?>
                        <p class="c-aside_logos_slide" js-carousel_slide data-parallax="fadeIn"><?=$image?></p>
<?php
}
?>
                    </div>
                    <p class="c-aside_logos_nav" data-parallax="fadeIn">
                        <button class="c-aside_logos_nav_button" js-carousel_prev>
                            <?=$icons->arrow?>
                        </button>
                        <button class="c-aside_logos_nav_button" js-carousel_next>
                            <?=$icons->arrow?>
                        </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
</aside>