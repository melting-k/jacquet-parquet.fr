<div class="c-card <?=$item->is_past()?>" card>
    <header class="c-card_head">
        <strong class="c-card_date">
            <?=$item->date_fr()?> à <?=$item->race_hour()?>
        </strong>
        <strong class="c-card_category">
            <?=RACES_CATEGORIES[$item->category()]?>
        </strong>
    </header>
    <h2 class="c-card_title">
        <?=$item->title() ? $item->title() : ($item->category() == "race" ? "Course du " : "Épreuve du ").$item->date_fr('long')." à ".$item->race_hour()?>
    </h2>
<?php
    if($item->program()) {
?>
    <p class="c-card_button">
        <a href="<?=$item->program()?>" class="u-button" target="_blank">
            Programme de l'épreuve <?=$icons->download?>
        </a>
    </p>
<?php
    }
?>
</div>