<?php
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';

?>
<!-- start content  -->
<div class="row actualite">
    <form action="races/<?= $action ?>" method="post" class="col-xs-12" enctype="multipart/form-data" is-checked>
        <div class="page-title">
            <div class="title_left">
                <h3><?= $title ?></h3>
            </div>
            <div class="title_right">
                <div class="form-group pull-right text-right">
                    <a href="races/" class="btn btn-danger">Annuler</a>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel row">
                    <!-- Titre, Category, Date -->
                    <div class="col-xs-12">
                        <h3 class="category_title"><strong>DATE, INTITULÉ ET TYPE DE COURSE</strong></h3>
                    </div>
                    <div class="col-xs-12 col-sm-3">
                        <div class="form-group form-checker">
                            <label>
                                <h4>Intitulé de l'épreuve</h4>
                            </label>
                            <input type="text" name="title" class="form-control"
                                placeholder="Fête Nationale, Course du cinquantenaire ..."
                                value="<?= $race->title() ?>">
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="col-xs-12 col-sm-3">
                        <div class="form-group form-checker">
                            <label>
                                <h4>Date *</h4>
                            </label>
                            <input type="date" class="form-control"
                                value="<?= date('Y-m-d', strtotime($race->race_date())) ?>"
                                name="required[date][race_date]" data-required="Vous devez sélectionner une date">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-sm-offset-1">
                        <div class="form-group form-checker">
                            <label>
                                <h4>Horaire *</h4>
                            </label>
                            <input type="text" name="required[race_hour]" data-required="Vous devez renseigner ce champ"
                                class="form-control" placeholder="15h30" value="<?= $race->race_hour() ?>">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-sm-offset-1">
                        <div class="form-group form-checker">
                            <label>
                                <h4>Type d'épreuve *</h4>
                            </label>
                            <select class="form-control" name="required[category]"
                                data-required="Vous devez faire un choix dans la liste">
                                <option value="" <?= (empty($race->category())) ? "selected" : "" ?>>Choisir un type
                                    d'épreuve</option>
                                <?php
                                foreach (RACES_CATEGORIES as $id => $category) {
                                    ?>
                                    <option value="<?= $id ?>" <?= ($race->category() == $id) ? "selected" : "" ?>><?= $category ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <!-- / Titre, Category, Date -->

                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <hr>
                    </div>

                    <!-- PROGRAMME DE L'EPREUVE -->
                    <div class="col-xs-12">
                        <h3 class="category_title"><strong>PROGRAMME DE L'ÉPREUVE (PDF)</strong></h3>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group form-checker">
                            <label>Sélectionner un fichier <br /><small>Format : PDF</small></label><br>
                            <?php
                                if($race->program()) {
                            ?>
                            <a href="../<?=$race->program()?>" title="Voir votre fichier" target="_blank" class="btn btn-info">
                                <i class="fa fa-eye"></i> Voir le fichier actuel
                            </a>
                            <input type="hidden" name="program" value="<?=$race->program()?>" class="content">
                            <br><br>
                            <b>OU</b>
                            <br><br>
                            <?php
                                }
                            ?>
                            
                            <div class="uploadfile form-checker">
                                <label for="PDFToUpload" class="label-file btn btn-info">
                                    Sélectionner un <?=$race->program() ? "autre" : ""?> fichier
                                </label>
                                <input id="PDFToUpload" class="input-file content" type="file" accept=".pdf" name="file[program]">
                                <br/>
                                <span class="nom-fichier">Aucun fichier sélectionné</span>
                            </div>
                        </div>
                    </div>
                    <!-- / PROGRAMME DE L'EPREUVE  -->


                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <hr>
                    </div>


                    <div class="col-xs-12">
                        <div class="form-group pull-right text-right">
                            <a href="races/" class="btn btn-danger">Annuler</a>
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