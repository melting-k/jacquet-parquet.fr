<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';

// *** Récupération des données temporaires si elles existent

if(!empty($_SESSION['temp_data']))
{
    $legals = new Legals($_SESSION['temp_data']);
}

?>
<!-- start content  -->
<div class="row settings">
    <form id="enregistrer-settings" action="<?=SITE_ADMIN_BASE.'legals/edit/'?>" method="post" class="col-xs-12" enctype="multipart/form-data" is-checked>
        <div class="page-title">
            <div class="title_left">
                <h3>Informations légales</h3> 
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
                                <h3 class="category_title"><strong>Société</strong></h3>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Nom de la société *
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <input type="hidden" name="id_legals" value="<?=$legals->id_legals()?>">
                                    <input type="text" name="required[denomination]" data-required="Vous devez renseigner ce champ" class="form-control" placeholder="Nom de votre entreprise" value="<?=$legals->denomination()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Type de société * 
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                <input type="text" name="required[company_type]" data-required="Vous devez remplir ce champ" class="form-control" placeholder="SAS, SARL, Association ..." value="<?=$legals->company_type()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Numéro SIRET * 
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                <input type="text" name="required[siret]" data-required="Vous devez remplir ce champ" class="form-control" placeholder="12345678910111" value="<?=$legals->siret()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Ville d'enregistrement RCS * 
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                <input type="text" name="required[rcs]" data-required="Vous devez remplir ce champ" class="form-control" placeholder="Paris, Lyon, Toulouse..." value="<?=$legals->rcs()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Nom et prénom du dirigeant * 
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                <input type="text" name="required[ceo]" data-required="Vous devez remplir ce champ" class="form-control" placeholder="Laurent Mercier" value="<?=$legals->ceo()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Fonction du dirigeant * 
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                <input type="text" name="required[ceo_role]" data-required="Vous devez remplir ce champ" class="form-control" placeholder="PDG, Directeur, Gérant ..." value="<?=$legals->ceo_role()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Adresse du siège social
                                </label>
                                <div class="col-sm-4 col-xs-12">
                                    <div class="form-group form-checker">
                                        <input type="text" name="required[address]" data-required="Vous devez remplir ce champ" class="form-control" placeholder="Adresse complète : numéro, nom de rue, complément d'adresse" value="<?=$legals->address()?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-4 form-group form-checker">
                                            <input type="text" name="required[zipcode]" data-required="Vous devez remplir ce champ" class="form-control" placeholder="Code postal" value="<?=$legals->zipcode()?>">
                                        </div>
                                        <div class="col-xs-12 col-sm-8 form-group form-checker">
                                            <input type="text" name="required[city]" data-required="Vous devez remplir ce champ" class="form-control" placeholder="Ville" value="<?=$legals->city()?>">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="col-xs-12">
                                <h3 class="category_title"><strong>Responsable de publication</strong></h3>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Nom et prénom du responsable de publication * 
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                <input type="text" name="required[publication_manager]" data-required="Vous devez remplir ce champ" class="form-control" placeholder="Jacques Durand" value="<?=$legals->publication_manager()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Adresse e-mail *
                                </label>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <input name="required[mail][email_manager]" data-required="Vous devez renseigner une adresse e-mail" class="form-control" type="text" placeholder="responsable-publication@mon-site.com" value="<?=$legals->email_manager()?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    Numéro de téléphone
                                </label>
                                <div class="col-sm-4 col-xs-12 form-group form-checker">
                                    <input name="required[phone][phone_manager]" data-required="Vous devez renseigner un numéro de téléphone" class="form-control" type="text" placeholder="0x xx xx xx xx" value="<?=$legals->phone_manager()?>">
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