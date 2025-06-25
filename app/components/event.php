
<article class="c-event">
    <div class="container">
        <div class="grid">
            <figure class="c-event_header">
                <img src="<?=$event->cover()?>" alt="Illustration de l'événement <?=$event->title();?>">
            </figure>
            <p class="c-event_date">
                Le <?=$event->date_fr(); ?> à <?=$event->hour_event(); ?>
            </p>
            <h2 class="c-event_title">
                <?=$event->title()?>
            </h2>
            <div class="c-event_desc">
                <?=$event->description()?>
            </div>
            <div class="c-event_social">
                <p class="c-event_social_text">
                    Partager cet événement :
                </p>
                <div class="c-event_social_links">
                    <a href="https://twitter.com/share?url=<?=urlencode($ogURL)?>"
                        class="c-event_social_link twitter" target="_blank">
                        <?=$icons_mag->twitter?>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?=urlencode($ogURL)?>"
                        class="c-event_social_link facebook" target="_blank">
                        <?=$icons_mag->facebook?>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?=urlencode($ogURL)?>"
                        class="c-event_social_link linkedin" target="_blank">
                        <?=$icons_mag->linkedin?>
                    </a>
                </div>
            </div>
            <div class="c-event_back">
                <button class="u-button" history-back><?=$icons->arrow?> Retour aux événements</button>
            </div>
        </div>
    </div>
</article>