<article class="c-carousel" js-carousel>
    <div class="container">
        <div class="grid">
            <h2 class="c-carousel_title" data-parallax="fromB">
                <?=$page_item->title?>
            </h2>
            <p class="c-carousel_nav" data-parallax="fadeIn">
                <button class="c-carousel_nav_button" js-carousel_prev>
                    <?=$icons->arrow?>
                </button>
                <button class="c-carousel_nav_button" js-carousel_next>
                    <?=$icons->arrow?>
                </button>
            </p>
            <div class="c-carousel_slideshow_wrapper" data-parallax="fadeIn">
                <div class="c-carousel_slideshow"  js-carousel_track>
<?php
    if(property_exists($page_item,'items')) {
        $i = 1;
        foreach($page_item->items as $item) {
?>
                    <div class="c-carousel_slide" js-carousel_slide>
                        <p class="c-carousel_slide_number">
                            <?=$i?>
                        </p>
                        <p class="c-carousel_slide_text">
                            <strong><?=$item->title?></strong>
                            <br><br>
                            <?=$item->text?>
                        </p>
                    </div>
<?php
        $i++;
        }
    }
    elseif(property_exists($page_item,'images')) {
        foreach($page_item->images->images as $image) {
?>
                    <div class="c-carousel_slide--image" js-carousel_slide>
                        <?=$image?>
                    </div>
<?php
        }
    }
?> 
                </div>
            </div>
        </div>
    </div>
</article>