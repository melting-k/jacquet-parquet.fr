<section class="c-intro">
    <div class="container">
        <div class="grid">
            <div class="c-intro_content">
                <h2 class="c-intro_title" data-parallax="fromB">
                    <?=$page_item->title?>
                </h2>
                <p class="c-intro_text" data-parallax="fromB">
                    <?=$page_item->text?>
                </p>
            </div>
            <div class="c-intro_image" data-parallax="fadeIn">
                <img src="<?=$page_item->image->url?>" alt="<?=$page_item->image->alt?>">
                <?=$icons->logo_round?>
            </div>
        </div>
    </div>
</section>