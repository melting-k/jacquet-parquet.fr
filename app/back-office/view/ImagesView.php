<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';

// *** Récupération des données temporaires si elles existent

if(!empty($_SESSION['temp_data']))
{
    $images = new Images($_SESSION['temp_data']);
}

?>
<!-- start content  -->
<div class="row settings">
    <form id="enregistrer-settings" action="<?=SITE_ADMIN_BASE.'images/edit/'?>" method="post" class="col-xs-12" enctype="multipart/form-data" is-checked>
        <div class="page-title">
            <div class="title_left">
                <h3>Iconographie du site</h3> 
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
                                <h3 class="category_title"><strong>Images générales</strong></h3>
                            </div>

                            <input type="hidden" name="id_images" value="<?=$images->id_images()?>">

                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    <h4>Logo principal *</h4>
                                </label>
                                <div class="col-xs-12 col-sm-2 apercu-image <?=$images->logo_main() ? 'image-unmasked' : 'image-masked'?>">
                                    <img src="../<?=$images->logo_main() ?? '' ?>" class="img-responsive" alt="">
                                </div>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <div class="uploadfile">
                                        <label for="logo_main" class="label-file btn btn-info">Choisir une <?=$images->logo_main() ? 'autre' : '' ?> image</label>
                                        <input type="file" name="icon[logo_main]" accept=".svg,.SVG" 
                                            <?=$images->logo_main() ? 'is_required' : ''?> 
                                            data-required="Veuillez sélectionner une image"
                                            id="logo_main" class="input-file"/><br/>
                                        <span class="nom-fichier">Aucun fichier sélectionné</span>
                                        <?=$images->logo_main() ? '<input type="hidden" current_file name="logo_main" value="'.$images->logo_main().'">' : ''?>
                                    </div>
                                </div>
                            </div>
                            
                            <br>

                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    <h4>Logo secondaire</h4>
                                </label>
                                <div class="col-xs-12 col-sm-2 apercu-image <?=$images->logo_alt() ? 'image-unmasked' : 'image-masked'?>">
                                    <img src="../<?=$images->logo_alt() ?? '' ?>" class="img-responsive" alt="">
                                </div>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <div class="uploadfile">
                                        <label for="logo_alt" class="label-file btn btn-info">Choisir une <?=$images->logo_alt() ? 'autre' : '' ?> image</label>
                                        <input type="file" name="icon[logo_alt]" accept=".svg,.SVG" 
                                            id="logo_alt" class="input-file"/><br/>
                                        <span class="nom-fichier">Aucun fichier sélectionné</span>
                                        <?=$images->logo_alt() ? '<input type="hidden" current_file name="logo_alt" value="'.$images->logo_alt().'">' : ''?>
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    <h4>Favicon* <br> <small>Format d'image : 128x128</small></h4>
                                </label>
                                <div class="col-xs-12 col-sm-2 apercu-image <?=$images->favicon() ? 'image-unmasked' : 'image-masked'?>">
                                    <img src="../<?=$images->favicon() ?? '' ?>" class="img-responsive" alt="">
                                </div>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <div class="uploadfile">
                                        <label for="favicon" class="label-file btn btn-info">Choisir une <?=$images->favicon() ? 'autre' : '' ?> image</label>
                                        <input type="file" name="image[favicon]" accept=".jpg,.JPG,.PNG,.png,.jpeg,.JPEG" 
                                            id="favicon" class="input-file"/><br/>
                                        <input type="hidden" name="config[favicon][width]" value="128">
                                        <input type="hidden" name="config[favicon][height]" value="128">
                                        <input type="hidden" name="config[favicon][crop]" value="0">
                                        <span class="nom-fichier">Aucun fichier sélectionné</span>
                                        <?=$images->favicon() ? '<input type="hidden" current_file name="favicon" value="'.$images->favicon().'">' : ''?>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="col-xs-12">
                                <h3 class="category_title"><strong>Réseaux sociaux</strong></h3>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    <h4>Image OpenGraph *<br> <small>Format d'image : 1200x700</small></h4>
                                </label>
                                <div class="col-xs-12 col-sm-2 apercu-image <?=$images->open_graph() ? 'image-unmasked':'image-masked'?>">
                                    <img src="../<?=$images->open_graph() ?? '' ?>" class="img-responsive" alt="">
                                </div>
                                <div class="col-sm-4 col-xs-12 form-checker">
                                    <div class="uploadfile">
                                        <label for="open_graph" class="label-file btn btn-info">Choisir une <?=$images->open_graph() ? 'autre' : '' ?> image</label>
                                        <input type="file" name="image[open_graph]" accept=".jpg,.JPG,.PNG,.png,.jpeg,.JPEG" 
                                            <?=$images->open_graph() ? 'is_required' : ''?> 
                                            data-required="Veuillez sélectionner une image"
                                            id="open_graph" class="input-file"/><br/>

                                        <input type="hidden" name="config[open_graph][width]" value="1200">
                                        <input type="hidden" name="config[open_graph][height]" value="700">
                                        <input type="hidden" name="config[open_graph][crop]" value="1">
                                        <span class="nom-fichier">Aucun fichier sélectionné</span>
                                        <?=$images->open_graph() ? '<input type="hidden" current_file name="open_graph" value="'.$images->open_graph().'">' : ''?>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="col-xs-12">
                                <h3 class="category_title"><strong>Bibliothèque d'icônes</strong></h3>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-3 col-xs-12">
                                    <h4>Icônes *<br></h4>
                                </label>
                                <div class="col-xs-12 col-sm-9">
                                    <div class="apercu-image <?=($images->icons()) ? 'image-unmasked' : 'image-masked'?>" apercu_images>
<?php
    if($images->icons()) {
        foreach($images->icons() as $index => $image) {
?>
                                        <p class="img-galerie" item_gallery>
                                            <span class="img-wrapper">
                                                <img src="../<?=$image?>" alt="...">
                                            </span>
                                            <button type="button" class="delete-item" delete_item><span class="fa fa-trash"></span></button>
                                            <input type="hidden" name="icon[icons][]" value="<?=$image?>">
                                        </p>
<?php
        }
    }
?>
                                    </div>
                                    <div class="uploadfile">
                                        <label for="icons" class="label-file btn btn-info">Ajouter des icônes</label>
                                        <input id="icons" class="input-galerie" type="file" multiple="" input_gallery name="icon[icons][multiple][]" accept=".svg,.SVG"><br>                       
                                        <em>Sélectionnez plusieurs images à la fois dans la boîte de dialogue</em>
                                    </div>
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