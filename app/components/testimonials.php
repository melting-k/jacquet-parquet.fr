<aside class="c-testimonials" js-carousel>
    <div class="container">
        <div class="grid">
            <div class="c-testimonials_bar"></div>
            <h2 class="c-testimonials_title" data-parallax="fadeIn">
                Ils vous le diront<br>encore mieux que nous…
            </h2>
            <p class="c-testimonials_nav" data-parallax="fadeIn">
                <button class="c-testimonials_nav_button" js-carousel_prev>
                    <?=$icons->arrow?>
                </button>
                <button class="c-testimonials_nav_button" js-carousel_next>
                    <?=$icons->arrow?>
                </button>
            </p>
            <div class="c-testimonials_slideshow_wrapper" data-parallax="fadeIn">
                <div class="c-testimonials_slideshow">
<?php
    foreach($testimonials as $testimonial) {
?>
                    <div class="c-testimonials_slide" js-carousel_slide>
                        <h3 class="c-testimonials_slide_title">
                            <?=$testimonial->name?>
                        </h3>
                        <img src="img/stars-avis.png" alt="Note : 5 étoiles" class="c-testimonials_slide_stars">
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