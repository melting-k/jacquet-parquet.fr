<section class="c-image">
    <div class="c-image_wrapper" data-parallax="fadeIn">
        <img src="<?=$page_item->image->url?>" alt="<?=$page_item->image->alt?>" class="parallax" data-css="transform" data-start="translateY(0%)" data-end="translateY(-20%)">
    </div>
    <?=$page_item->icon ?? ''?>
</section>