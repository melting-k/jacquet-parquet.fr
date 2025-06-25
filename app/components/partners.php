<?php
    $partners = new Gallery('img/partners');
?>
<aside class="c-partners" js-carousel partners>
    <div class="container">
        <div class="grid">
            <div class="c-partners_bar"></div>
            <h2 class="c-partners_title" data-parallax="fadeIn">
                Nos partenaires premium
            </h2>
            <p class="c-partners_nav" data-parallax="fadeIn">
                <button class="c-partners_nav_button" js-carousel_prev>
                    <?=$icons->arrow?>
                </button>
                <button class="c-partners_nav_button" js-carousel_next>
                    <?=$icons->arrow?>
                </button>
            </p>
            <div class="c-partners_slideshow_wrapper" data-parallax="fadeIn">
                <div class="c-partners_slideshow">
<?php
    foreach($partners->images as $partner) {
?>
                    <div class="c-partners_slide" js-carousel_slide>
                        <?=$partner?>
                    </div>
<?php
    }
?>                    
                </div>
            </div>
        </div>
    </div>
</aside>