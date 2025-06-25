<a href="<?=$NAV->event->url.$item->slug()?>" title="<?=$NAV->event->title?>" class="c-card--event <?=$item->is_past()?>" card>
    <figure class="c-card_image">
        <img src="<?=$item->cover()?>" alt="<?=$item->title()?>">
        <span class="c-card_circle"><?=$icons->arrow?></span>
    </figure>
    <header class="c-card_head">
        <strong class="c-card_date">
            <?=$item->date_fr()?> à <?=$item->hour_event()?>
        </strong>
    </header>
    <h2 class="c-card_title">
        <?=$item->title()?>
    </h2>
    <div class="c-card_desc">
        <?=$tools->createPreview($item->description(),140)?>
    </div>
</a>