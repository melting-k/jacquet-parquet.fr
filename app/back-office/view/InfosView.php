<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';

// *** Récupération des données temporaires si elles existent

if(!empty($_SESSION['temp_data']))
{
    $infos = new Infos($_SESSION['temp_data']);
}

?>
<!-- start content  -->
<div class="row settings">
    <form id="enregistrer-settings" action="<?=SITE_ADMIN_BASE.'infos/edit/'?>" method="post" class="col-xs-12" enctype="multipart/form-data" is-checked>
        <div class="page-title">
            <div class="title_left">
                <h3>Informations générales</h3> 
            </div>
            <div class="title_right">
                <div class="col-xs-12 form-group pull-right text-right">
                    <a href="" class="btn btn-danger">Annuler</a>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
            </div>
        </div>
        <!-- end header -->
        <!-- start Site informations -->
        <div class="row">
            <div class="col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                      <!-- start content-->   
                        <div class="form-horizontal form-label-left">
                            <div class="col-xs-12">
                                <h3 class="category_title"><strong>Site internet</strong></h3>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Nom du site *
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <input type="hidden" name="id_infos" value="<?=$infos->id_infos()?>">
                                    <input type="text" name="required[client_name]" data-required="Vous devez renseigner un nom pour votre site" class="form-control" value="<?=$infos->client_name()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Nom de domaine * 
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                <input type="text" name="required[site_domain]" data-required="Vous devez renseigner le nom de domaine de votre site internet" class="form-control" placeholder="nom-domaine.fr" value="<?=$infos->site_domain()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    URL du site internet * 
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                <input type="text" name="required[url][site_url]" data-required="Vous devez renseigner l'URL de votre site internet" class="form-control" placeholder="https://www.mon-site.com/" value="<?=$infos->site_url()?>">
                                </div>
                            </div>

                            <hr>

                            <div class="col-xs-12">
                                <h3 class="category_title"><strong>Coordonnées</strong></h3>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Adresse e-mail générale *
                                </label>
                                <div class="col-sm-4 col-xs-12 form-group form-checker">
                                    <input name="required[mail][site_email]" data-required="Vous devez renseigner une adresse e-mail" class="form-control" type="text" placeholder="contact@mon-site.com" value="<?=$infos->site_email()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Numéro de téléphone
                                </label>
                                <div class="col-sm-4 col-xs-12 form-group form-checker">
                                    <input name="phone[phone_number]" class="form-control" type="text" placeholder="0x xx xx xx xx" value="<?=$infos->phone_number()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Adresse postale
                                </label>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="form-group form-checker">
                                        <input name="adresses[street]" class="form-control" type="text" placeholder="Numéro et nom de rue" value="<?=$infos->adresses()['street'] ?? ''?>">
                                    </div>
                                    <div class="form-group form-checker">
                                        <input name="adresses[complement]" class="form-control" type="text" placeholder="Complément d'adresse" value="<?=$infos->adresses()['complement'] ?? ''?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 form-group form-checker">
                                            <input name="adresses[zipcode]" class="form-control" type="text" placeholder="Code postal" value="<?=$infos->adresses()['zipcode'] ?? ''?>">
                                        </div>
                                        <div class="col-xs-12 col-sm-8 form-group form-checker">
                                            <input name="adresses[city]" class="form-control" type="text" placeholder="Ville" value="<?=$infos->adresses()['city'] ?? ''?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Horaires d'ouverture
                                </label>
                                <div class="addable col-sm-6 col-xs-12">
                                    <div class="addable_container">
<?php
    if($infos->opening_hours())
    {
        foreach($infos->opening_hours() as $key => $hour)
        {
?>
                                        <div class="addable_items row">
                                            <div class="col-xs-12 col-sm-4 form-group form-checker">
                                                <input name="opening_hours[<?=$key?>][days]" class="form-control content" type="text" placeholder="Du lundi au vendredi / Lundi" value="<?=$hour['days']?>">
                                            </div>
                                            <div class="col-xs-12 col-sm-4 form-group form-checker">
                                                <input name="opening_hours[<?=$key?>][hours]" class="form-control content" type="text" placeholder="9h - 12h / 14h 18h" value="<?=$hour['hours']?>">
                                            </div>
                                            <?=$key != 0 ? '<span class="fa fa-trash red delete-item"></span>' : ''?>
                                        </div>
<?php
        }
    }
    else
    {
?>
                                        <div class="addable_items row">
                                            <div class="col-xs-12 col-sm-4 form-group form-checker">
                                                <input name="opening_hours[0][days]" class="form-control content" type="text" placeholder="Du lundi au vendredi / Lundi" value="">
                                            </div>
                                            <div class="col-xs-12 col-sm-4 form-group form-checker">
                                                <input name="opening_hours[0][hours]" class="form-control content" type="text" placeholder="9h - 12h / 14h 18h" value="">
                                            </div>
                                        </div>
<?php
    }
?>                                        
                                    </div>
                                    <button class="btn btn-success add-item" type="button">Ajouter une ligne</button>
                                </div>
                            </div>

                            <hr>

                            <div class="col-xs-12">
                                <h3 class="category_title"><strong>Réseaux sociaux</strong></h3>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    <i class="fa fa-facebook"></i> | Facebook 
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <input type="text" name="url[social_links][facebook]" class="form-control" placeholder="https://www.facebook.com/nom_utilisateur" value="<?=$infos->social_links()['facebook'] ?? ''?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    <i class="fa fa-instagram"></i> | Instagram
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <input type="text" name="url[social_links][instagram]" class="form-control" placeholder="https://www.instagram.com/nom_utilisateur" value="<?=$infos->social_links()['instagram'] ?? ''?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    <i class="fa fa-twitter"></i> | Twitter
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <input type="text" name="url[social_links][twitter]" class="form-control" placeholder="https://www.twitter.com/nom_utilisateur" value="<?=$infos->social_links()['twitter'] ?? ''?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    <i class="fa fa-linkedin"></i> | Linkedin
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <input type="text" name="url[social_links][linkedin]" class="form-control" placeholder="https://www.linkedin.com/nom_utilisateur" value="<?=$infos->social_links()['linkedin'] ?? ''?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    <i class="fa fa-video-camera"></i> | Tiktok
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <input type="text" name="url[social_links][tiktok]" class="form-control" placeholder="https://www.tiktok.com/nom_utilisateur" value="<?=$infos->social_links()['tiktok'] ?? ''?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    <i class="fa fa-youtube"></i> | YouTube
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <input type="text" name="url[social_links][youtube]" class="form-control" placeholder="https://www.youtube.com/nom_utilisateur" value="<?=$infos->social_links()['youtube'] ?? ''?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    <i class="fa fa-calendar"></i> | Calendly
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <input type="text" name="url[social_links][calendly]" class="form-control" placeholder="https://www.calendly.com/votre_espace" value="<?=$infos->social_links()['calendly'] ?? ''?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    <i class="fa fa-user-md"></i> | Doctolib
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <input type="text" name="url[social_links][doctolib]" class="form-control" placeholder="https://www.doctolib.com/votre_espace" value="<?=$infos->social_links()['doctolib'] ?? ''?>">
                                </div>
                            </div>
                        </div>
                    <!-- end content--> 
                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="form-group pull-right text-right"> 
                    <a href="articles/" class="btn btn-danger">Annuler</a>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
            </div>
        </div>
        <!-- end Site informations -->
    </form>
    <!-- end formm -->
</div>
<!-- end content  -->
<?php 
include 'includes/inc_main_bottombar.php'; 
include 'includes/inc_footer.php'; 
?>