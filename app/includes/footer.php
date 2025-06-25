    
    <footer class="p-footer">
        <div class="container">
            <div class="grid">
                <p class="p-footer_logo">
                    <?php include "img/logo-footer.svg"; ?>
                </p>
                <ul class="p-footer_nav">
<?php
    foreach($NAV as $key => $item) {
        if($item->is_nav_footer) {
?>
                    <li class="p-footer_nav_item">
                        <a href="<?=$item->url?>" title="<?=$item->title?>"><?=$item->label?></a>
                    </li>
<?php
        }
    }
?>
                </ul>
                <p class="p-footer_address">
                    <?=$site_infos->adresses()['street']?><br>
                    <?=$site_infos->adresses()['complement']?><br>
                    <?=$site_infos->adresses()['zipcode']?> <?=$site_infos->adresses()['city']?> 
                    <br><br>
                    Tél : <span data-phone=""><?=$site_infos->phone_number()?></span><br>
                    E-mail : <span data-email=""><?=$site_infos->site_email()?></span>
                    <br><br>
                    <a href="<?=$NAV->infos->url?>" title="<?=$NAV->infos->title?>" class="u-button">Contact</a>

                </p>
            </div>
        </div>
        <aside class="p-footer_legals">
            <div class="container">
                <div class="grid">
                    <div class="p-footer_legals_bar"></div>
                    <p class="p-footer_legals_text">
                        Copyright <?=date('Y',time())?> <span class="hidden-sm--max">-</span><br class="hidden-sm--min"> Hippodrome Beaumont-de-Lomagne <span class="hidden-sm--max">-</span><br class="hidden-sm--min"> Tous droits réservés <br>
                        <a href="<?=$NAV->legals->url?>" title="<?=$NAV->legals->title?>"><?=$NAV->legals->label?></a> <span class="hidden-sm--max">-</span><br class="hidden-sm--min"> <a href="<?=$NAV->pepponito->url?>" title="<?=$NAV->pepponito->title?>" target="_blank"><?=$NAV->pepponito->label?></a>
                    </p>
                    <p class="p-footer_legals_images">
                        <img src="img/jouons-responsable.png" alt="Jouons responsable !">
                        <img src="img/interdit-aux-mineurs.png" alt="Les jeux d'argent sont interdits aux mineurs">
                        <img src="img/avertissement-jeux-argent.jpg" alt="Avertissement sur les dangers des jeux d'argent">
                    </p>
                </div>
            </div>
        </aside>
    </footer>

    <!-- <div class="u-cookies">
        <div class="u-cookies_box">
            <div class="u-cookies_content">
                <p class="u-cookies_content_text">Notre site internet utilise des cookies pour mesurer son audience. Vous pouvez les accepter, ou définir vous mêmes vos <a href="#head" onclick="tarteaucitron.userInterface.openPanel();" data-accept-cookies class="u-text--underline no-anchor">paramètres personnalisés</a>.</p>
                <div class="u-cookies_content_buttons">
                    <button onclick="tarteaucitron.userInterface.respondAll(true);" class="u-cookies_close" data-accept-cookies><span>Accepter</span></button>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="tarteaucitron/tarteaucitron.js"></script>
    <!-- build:js(app) js/script.min.js -->
    <script type="text/javascript" src="js/form-mail-contact.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/cookies.js"></script>
    <!-- endbuild -->

    <!-- END WRAPPER -->
  </body>
</html>
