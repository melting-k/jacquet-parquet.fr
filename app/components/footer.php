<footer class="c-footer">
    <div class="container">
        <div class="grid">
            <div class="c-footer_coords">
                <p class="c-footer_logo">
                    <?php include 'img/logo-footer.svg' ?>
                </p>
                <p class="c-footer_coords_text">
                    <?=$footer->coords->text?>
                </p>
                <p class="c-footer_social">
                    <a href="<?=$NAV->instagram->url?>" title="<?=$NAV->instagram->title?>" target="_blank">
                        <?=$icons->instagram?>
                    </a>
                </p>
            </div>
            <div class="c-footer_text">
                <h2 class="c-footer_text_title">
                    <?=$footer->text->title?>
                </h2>
                <p class="c-footer_text_text">
                    <?=$footer->text->text?>
                </p>
                <p class="c-footer_text_button">
                    <button class="u-button--light" data-action="open_contact">
                        <?=$footer->text->button?>
                    </button>
                </p>
            </div>
            <div class="c-footer_mentions">
                <span>Copyright <?=date('Y',time())?> Baptiste Jacquet</span>
                <span>Tous droits réservés</span>
                <a href="<?=$NAV->legals->url?>" title="<?=$NAV->legals->title?>"><?=$NAV->legals->label?></a>
                <a href="<?=$NAV->pepponito->url?>" title="<?=$NAV->pepponito->title?>" target="_blank"><?=$NAV->pepponito->label?></a>
            </div>
        </div>
    </aside>
</footer>
