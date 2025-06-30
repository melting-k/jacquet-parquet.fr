<section class="c-quote">
    <img src="<?=$page_item->image->url?>" alt="<?=$page_item->image->alt?>" data-parallax="fadeIn">
    <div class="container">
        <div class="grid">
<?php
    if(property_exists($page_item,'title')) {
?>
            <div class="c-quote_content--alt">
                <h2 class="c-quote_title" data-parallax="fromB">
                    <?=$page_item->title?>
                </h2>
                <p class="c-quote_text" data-parallax="fromB">
                    <?=$page_item->text?>
                </p>
            </div>
<?php
    } else {
?>
            <div class="c-quote_content" data-parallax="fadeIn">
                <?=$page_item->text?>
            </div>
<?php
    }
?>
        </div>
    </div>
</section>