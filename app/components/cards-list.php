<div cards_wrapper data-article_url="<?=$page_item->base_url?>" data-default_num="<?=$number_items?>" class="c-card_wrapper<?=$page_item->class?>" id="<?=$page_item->id?>">
    <div class="container">
        <div class="grid">
            <h2 class="c-card_wrapper_title">
                <?=$page_item->title?>
            </h2>
        </div>
    </div>
    <div class="container">
        <div class="grid">
            <div filter_items data-key="type" data-value="<?=$page_item->items_type?>"></div>
            <div filter_items data-key="card_type" data-value="<?=$page_item->cards_type?>"></div>
            <div class="c-card_container" cards_container total_items="<?=$page_item->items_total?>">
<?php
    if(!empty($page_item->items))
    {
        foreach($page_item->items as $item)
        {
            include realpath(__DIR__).'/'.$page_item->cards_type.'.php';  
        }
    }
    else
    {
?>
                <p class="c-card_empty">
                    <?=$page_item->no_items?>
                </p>
<?php
    }   
?>
            </div>
        </div>
    </div>
    <div class="c-card_loadbutton">
        <button class="u-button--border hidden" data-number="<?=$number_items_load?>" load_items>
            <span><?=$page_item->load_more?></span>
        </button>
    </div>
</div>