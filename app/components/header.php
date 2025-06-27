<header class="c-header" id="head">
    <div class="c-header_background parallax" data-css="opacity,transform" data-start="1,scale(1)" data-end="0,scale(1.1)" data-anchor="#head">
        <img src="<?=$page_item->image->url?>" alt="<?=$page_item->image->alt?>">
    </div>
    <div class="container">
        <div class="grid">
            <div class="c-header_content">
                <h1 class="c-header_title">
                    <?=$page_item->title?>
                    <span class="c-header_title_sub"><?=$page_item->subtitle?></span>
                </h1>
                <p class="c-header_scroll">
                    <a href="#main">
                        <?=$icons->arrow?>
                    </a>
                </p>
            </div>
        </div>
    </div>
</header>