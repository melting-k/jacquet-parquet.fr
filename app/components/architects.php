<section class="c-architects">
    <div class="container">
        <div class="grid">
            <div class="c-architects_content">
                <h2 class="c-architects_title" data-parallax="fromL">
                    <?=$architects->title?>
                </h2>
                <p class="c-architects_text" data-parallax="fromL">
                    <?=$architects->text?>
                </p>
            </div>
            <div class="c-architects_right">
                <div class="c-architects_assets">
<?php
    foreach($architects->list as $item) {
?>
                    <div class="c-architects_assets_item">
                        <span class="c-architects_assets_icon" data-parallax="zoomIn">
                            <?=$item->icon?>
                        </span>
                        <p data-parallax="fromB">
                            <?=$item->title?>
                        </p>
                    </div>
<?php
    }
?>
                </div>
                <p class="c-architects_icon" data-parallax="fromB">
                    <?=$architects->icon?>
                </p>
                <p class="c-architects_button" data-parallax="fromB">
                    <button class="u-button--light" data-action="open_contact">
                        Travailler Ensemble
                    </button>
                </p>
            </div>
        </div>
    </div>
</section>