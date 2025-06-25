<?php
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';

?>
<!-- start content  -->
<div class="row actualite">
    <form action="events/<?= $action ?>" method="post" class="col-xs-12" enctype="multipart/form-data" is-checked>
        <div class="page-title">
            <div class="title_left">
                <h3><?= $title ?></h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right text-right">
                    <a href="events/" class="btn btn-danger">Annuler</a>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel row">

                    <!-- Titre, Date, Hour -->
                    <div class="col-xs-12">
                        <h3 class="category_title"><strong>DATE, HEURE ET INTITULÉ DE L'ÉVÉNEMENT</strong></h3>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <div class="form-group form-checker">
                            <label>
                                <h4>Intitulé de l'événement*</h4>
                            </label>
                            <input type="text" name="required[title]" class="form-control"
                                placeholder="Journée nationale du sport équestre ..."
                                value="<?= $event->title() ?>">
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="form-group form-checker">
                            <label>
                                <h4>Date *</h4>
                            </label>
                            <input type="date" class="form-control"
                                value="<?= date('Y-m-d', strtotime($event->date_event())) ?>"
                                name="required[date][date_event]" data-required="Vous devez sélectionner une date">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-sm-offset-1">
                        <div class="form-group form-checker">
                            <label>
                                <h4>Horaire</h4>
                            </label>
                            <input type="text" name="hour_event" class="form-control" placeholder="15h30" value="<?= $event->hour_event() ?>">
                        </div>
                    </div>
                    <!-- / Titre, Date, Hour -->

                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <hr>
                    </div>

                    <!-- Cover + Description -->
                    <div class="col-xs-12">
                        <h3 class="category_title"><strong>PHOTO DE COUVERTURE ET DESCRIPTION DE L'ÉVÉNEMENT</strong></h3>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 col-sm-3">
                            <label><h4>Image de couverture* <br> <small>Format d'image : 1590x900</small></h4></label>
                            <div class="uploadfile form-checker">
                                <label for="ImageToUpload" class="label-file btn btn-info">Choisir une <?=$event->cover() ? "autre" : ""?> image</label>
                                <input id="ImageToUpload" class="input-file" type="file" name="<?=(!$event->cover()) ? "required" : ""?>[image][cover]" accept=".jpg,.JPG,.PNG,.png,.jpeg,.JPEG" data-required="Veuillez sélectionner une image">
                                <input type="hidden" name="config[cover][width]" value="1590">
                                <input type="hidden" name="config[cover][height]" value="900">
                                <input type="hidden" name="config[cover][crop]" value="1">
                                <br/>
                                <span class="nom-fichier">Aucun fichier sélectionné</span>
                                <?=$event->cover() ? '<input type="hidden" name="cover" value="'.$event->cover().'">' : ''?>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3 apercu-image <?php if($event->cover()){ echo "image-unmasked"; } ?>">
                            <label><h4>Aperçu de l'image de couverture</h4> </label>
                            <?php
                                if($event->cover())
                                {
                            ?>
                                <img src="../<?=$event->cover()?>" class="img-responsive" alt="">
                            <?php
                                }
                                else
                                {
                            ?>
                                <img src="" class="img-responsive" alt="">
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-offset-1 col-sm-4 form-checker">
                        <label>
                            <h4>Description de l'événement :</h4>
                        </label>
                        <textarea name="required[description]" class="wysiwig" ><?=html_entity_decode($event->description())?></textarea>
                    </div>
                    
                    <!-- / Cover + Description  -->


                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <hr>
                    </div>


                    <div class="col-xs-12">
                        <div class="form-group pull-right text-right">
                            <a href="events/" class="btn btn-danger">Annuler</a>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- end content  -->
<?php
include 'includes/inc_main_bottombar.php';
include 'includes/inc_footer.php';
?>