<aside class="c-testimonials" js-carousel>
    <div class="container">
        <div class="grid">
            <p class="c-testimonials_nav" data-parallax="fadeIn">
                <button class="c-testimonials_nav_button" js-carousel_prev>
                    <?=$icons->arrow?>
                </button>
                <button class="c-testimonials_nav_button" js-carousel_next>
                    <?=$icons->arrow?>
                </button>
            </p>
            <div class="c-testimonials_slideshow_wrapper" data-parallax="fadeIn">
                <div class="c-testimonials_slideshow"  js-carousel_track>
<?php
    foreach($testimonials as $testimonial) {
?>
                    <div class="c-testimonials_slide" js-carousel_slide>
                        <p class="c-testimonials_slide_text">
                            <?=$testimonial->text?>
                        </p>
                    </div>
<?php
    }
?>                    
                </div>
            </div>
        </div>
    </div>
</aside>