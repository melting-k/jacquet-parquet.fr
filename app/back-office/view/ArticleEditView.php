<?php 
include 'includes/inc_header.php';
include 'includes/inc_main_sidebar.php';
include 'includes/inc_main_topbar.php';

?>
<!-- start content  -->
<div class="row actualite">
    <form action="articles/<?=$action?>" method="post" class="col-xs-12" enctype="multipart/form-data" is-checked>
        <div class="page-title">
            <div class="title_left">
                <h3><?=$title?></h3> 
            </div>
            <div class="title_right">
                <div class="form-group pull-right text-right"> 
                    <a href="articles/" class="btn btn-danger">Annuler</a>
                    <button type="submit" class="btn btn-success">Enregistrer</button>
                </div>
            </div>
        </div>
        <!-- end header -->
        <div class="row">
            <!-- start Admin -->
            <div class="col-xs-12">
                <div class="x_panel row">
                    <!-- Titre, Category, Date & statut -->
                    <div class="col-xs-12">
                        <h3 class="category_title"><strong>TITRE, CATEGORIE, DATE, STATUT</strong></h3>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="form-group form-checker">
                            <label><h4>Titre de l'article*</h4></label>
                            <input class="form-control" placeholder="Entrez le titre de l'article :" type="text" value="<?=html_entity_decode($article->title())?>" name="required[title]" data-required="Vous devez entrez un titre" >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-sm-offset-1">
                        <div class="form-group form-checker">
                            <label><h4>Catégorie*</h4></label>
                            <select class="form-control" name="required[category]" data-required="Vous devez sélectionner une catégorie" >
                                <option value="" <?=(empty($article->category())) ? "selected" : ""?>>Choisir une catégorie</option>
                        <?php
                            foreach($list_categories as $category)
                            {
                        ?>
                                <option value="<?=$category->id_category()?>" <?=($article->category() == $category->id_category()) ? "selected" : ""?>><?=html_entity_decode($category->title())?></option>
                        <?php
                            }
                        ?>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-12 col-sm-3">
                        <div class="form-group form-checker">
                            <label><h4>Date de publication :</h4></label>
                            <input type="date" class="form-control" value="<?=date('Y-m-d',strtotime($article->date_publication()))?>" name="required[date][date_publication]" data-required="Vous devez choisir une date de publication" >
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-sm-offset-2 form-checker">
                        <h4>Statut :</h4>
                        <strong>Non publié</strong>&nbsp;&nbsp;
                        <label class="switch">
                            <input type="checkbox" name="is_active" value="1" <?=($article->is_active()) ? "checked" : ""?>/>
                            <span class="slider"></span>
                        </label>
                        &nbsp;&nbsp;<strong>Publié</strong>
                    </div>
                    <div class="col-xs-12 col-sm-3 col-sm-offset-1 form-checker">
                        <h4>A la une :</h4>
                        <strong>Non</strong>&nbsp;&nbsp;
                        <label class="switch">
                            <input type="checkbox" name="featured" value="1" <?=($article->featured()) ? "checked" : ""?>/>
                            <span class="slider"></span>
                        </label>
                        &nbsp;&nbsp;<strong>Oui</strong>
                    </div>
                    <!-- / Titre, Category, Date & statut + lectures -->
                    
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    
                    <!-- Tags -->
                    <div class="col-xs-12">
                        <h3 class="category_title"><strong>TAGS</strong></h3>
                    </div>
                    <div class="col-xs-12 addable" id="article-tags">
                        <div class="form-group addable_container" id="meta-tags">
                            <label><h4>Tags (mots clés)</h4></label><br/>
                            <small>Tapez les premières lettre de votre mot-clé, puis sélectionnez le dans la liste.<br/>Si votre mot-clé n'existe pas, il sera automatiquement créé.<br/><br/>
                            <button class="btn btn-info" type="button" data-toggle="modal" data-target=".modal-delete"><i class="fa fa-eye"></i> Voir tous les tags</button></small>
                            <br><br>
                            <?php
                                // SI LES TAGS SONT DEFINIS, ON LES AFFICHE
                                if(!empty($article->tags()) && is_array($article->tags())) {
                                    foreach($article->tags() as $key => $tag) 
                                    {
                            ?>
                            <div class="article-tags ui-front addable_items form-checker">
                                <input type="text" name="required[alphanum][tags][]" data-required="Vous devez entrer un mot-clé" class="form-control js-autocomplete" autocomplete="off" value="<?=$tag->title()?>" placeholder="Tapez votre mot-clé">
                                <?php
                                        if($key != 0) {
                                ?>
                                <span class="fa fa-trash red delete-item"></span>
                                <?php
                                        }
                                ?>
                            </div>
                            <?php
                                    }
                                } 
                                else 
                                { 
                                // SINON, ON AFFICHE L'INPUT DE BASE
                            ?>
                            <div class="article-tags ui-front addable_items form-checker">
                                <input type="text" name="required[alphanum][tags][]" data-required="Vous devez entrer un mot-clé" class="form-control js-autocomplete" autocomplete="off" placeholder="Tapez votre mot-clé">
                            </div>
                            <?php
                                }
                            ?>
                        </div>
                        <button class="btn btn-success add-item" type="button">Ajouter un mot-clé</button>
                    </div>
                    <!-- / Tags  -->
                    
                    
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    
                    
                    <!-- Couverture + chapeau  -->
                    <div class="form-group col-xs-12">
                        <div class="row">
                            <div class="col-xs-12">
                                <h3 class="category_title"><strong>IMAGE DE COUVERTURE & CHAPEAU</strong></h3>
                            </div>
                            <div class="col-xs-12 col-sm-3 form-checker">
                                <label><h4>Image de couverture* <br> <small>Format d'image : 1590x900</small></h4></label>
                                <div class="uploadfile">
                                    <label for="ImageToUpload" class="label-file btn btn-info">Choisir une image</label>
                                    <input id="ImageToUpload" class="input-file" type="file" name="<?=(!$article->cover()) ? "required[image_large]" : "image_large"?>[cover]" accept=".jpg,.JPG,.PNG,.png,.jpeg,.JPEG" data-required="Veuillez sélectionner une image"><br/>
                                    <span class="nom-fichier">Aucun fichier sélectionné</span>
                                    <?php 
                                        if($article->cover())
                                        { 
                                    ?>         
                                        <input type="hidden" name="cover" value="<?=$article->cover()?>">
                                    <?php 
                                        } 
                                    ?>
                                </div>                      
                                
                            </div>
                            <div class="col-xs-12 col-sm-3 apercu-image <?php if($article->cover()){ echo "image-unmasked"; } ?>">
                                <label><h4>Aperçu de l'image de couverture</h4> </label>
                                <?php 
                                    if($article->cover())
                                    { 
                                ?>         
                                    <img src="../<?=$article->cover()?>" class="img-responsive" alt="">
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
                            <div class="col-xs-12 col-sm-offset-1 col-sm-4 form-checker">
                                <label>
                                    <h4>Chapeau de l'article (texte introductif) :</h4>
                                </label>
                                <textarea name="required[intro_text]" class="wysiwig" ><?=html_entity_decode($article->intro_text())?></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- /Couverture + chapeau  -->
                    
                    
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    
                    
                    
                    <!-- Page builder -->
                    
                    <div class="col-xs-12">
                        <h3 class="category_title"><strong>CONSTRUCTION DU CORPS DE L'ARTICLE</strong></h3>
                    </div>
                    
                    <div class="clearfix"></div>
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    <div class="col-xs-12 sortable" id="articleBody">
                        <?php 
                            if(!empty($page_body)) 
                            {
                                foreach($page_body as $key => $element)
                                {
                                    foreach($element as $index => $value)
                                    {
                                    if($index === 'body_contents') {
                        ?>
                        <div class="article-item ui-state-default">
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <h4 class="item_title"><strong>BLOC DE CONTENU</strong></h4>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-checker">
                                        <label>Titre (facultatif) :</label>
                                        <input class="form-control content" placeholder="Votre titre" type="text" value="<?=$value['titre']?>" name="body_contents[<?=$key?>][titre]">
                                    </div><br/>
                                    <div class="form-checker">
                                        <label>Texte (obligatoire) :</label>
                                        <textarea class="form-control content wysiwig" placeholder="Votre texte" type="text" name="required[body_contents][<?=$key?>][texte]" data-required="Vous devez entrer un texte"><?=$value['texte']?></textarea>
                                    </div><br/>
                                    <div class="form-checker">
                                        <label>Bouton (facultatif) :</label>
                                        <br><br>
                                        <label>URL Cible :</label>
                                        <input class="form-control content" placeholder="https://..." type="text" name="url[body_contents][<?=$key?>][lien]" data-required="Vous devez entrer une URL" value="<?=$value['lien']?>">
                                    </div><br/>
                                    <div class="form-checker">
                                        <label>Texte du bouton :</label>
                                        <input class="form-control content" placeholder="Libellé du bouton" type="text" name="body_contents[<?=$key?>][label]" data-required="Vous devez entrer un label pour votre lien" value="<?=$value['label']?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-sm-offset-1">
                                    <label>Image (obligatoire) <br/><small>Format final : 800x800</small></label>
                                    <div class="uploadfile form-checker">
                                        <label for="ImageContent<?=$key+100?>" class="label-file btn btn-info">Changer d'image </label>
                                        <input id="ImageContent<?=$key+100?>" class="input-file content" type="file" accept=".jpg,.jpeg,.png" data-required="Vous devez choisir une image" name="image_square[body_contents][<?=$key?>][image]"><br/>
                                        <span class="nom-fichier">Aucun fichier sélectionné</span>
                                        
                                        <input type="hidden" name="body_contents[<?=$key?>][image]" value="<?=$value['image']?>" class="content"/>
                                        <br/>
                                    </div>
                                    <br/>
                                    <div class="apercu-image image-unmasked">
                                        <label>Aperçu de votre image </label>
                                        <img src="../<?=$value['image']?>" class="img-responsive" alt="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-sm-offset-2 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                    }
                                    if($index === 'body_cta') {
                        ?>
                        <div class="article-item ui-state-default">
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <h4 class="item_title"><strong>CALL TO ACTION (CTA)</strong></h4>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-checker">
                                        <label>Titre :</label>
                                        <input class="form-control content" placeholder="Votre titre" type="text" name="required[body_cta][<?=$key?>][titre]" data-required="Vous devez entrer un titre" value="<?=$value['titre']?>">
                                    </div><br/>
                                    <div class="form-checker">
                                        <label>Texte :</label>
                                        <textarea class="form-control content wysiwig" placeholder="Votre texte" type="text" name="required[body_cta][<?=$key?>][texte]" data-required="Vous devez entrer un texte"><?=$value['texte']?></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-sm-offset-1">
                                    <div class="form-checker">
                                        <label>URL du bouton :</label>
                                        <input class="form-control content" placeholder="https://..." type="text" name="required[url][body_cta][<?=$key?>][lien]" data-required="Vous devez entrer une URL" value="<?=$value['lien']?>" >
                                    </div><br/>
                                    <div class="form-checker">
                                        <label>Texte du bouton :</label>
                                        <input class="form-control content" placeholder="Libellé du bouton" type="text" name="required[body_cta][<?=$key?>][label]" data-required="Vous devez entrer un label pour votre lien" value="<?=$value['label']?>" >
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-sm-offset-1 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                    }
                                    if($index === 'body_thumbnails') {
                        ?>
                        <div class="article-item ui-state-default">
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <h4 class="item_title"><strong>IMAGES VIGNETTES (x2)</strong></h4>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="form-group">
                                        <label><h4>
                                            Image 1 <br/><small>Format : 800x800</small>
                                        </h4></label>
                                        <div class="uploadfile form-checker">
                                            <label for="ThumbnailToUpload<?=$key+3000?>" class="label-file btn btn-info">Changer d'image </label>
                                            <input id="ThumbnailToUpload<?=$key+3000?>" class="input-file content" type="file" accept=".jpg,.JPG,.PNG,.png,.jpeg,.JPEG" name="image_square[body_thumbnails][<?=$key?>][image1]"><br/>
                                            <span class="nom-fichier">Aucun fichier sélectionné</span>
                                            <input type="hidden" name="body_thumbnails[<?=$key?>][image1]" value="<?=$value['image1']?>" class="content"/>
                                            <br/>
                                        </div>
                                        <br/>
                                        <div class="apercu-image image-unmasked">
                                            <label>Aperçu de votre image :</label>
                                            <img src="../<?=$value['image1']?>" class="img-responsive" alt="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-sm-offset-1">
                                    <div class="form-group">
                                        <label><h4>
                                            Image 2 <br/><small>Format : 800x800</small>
                                        </h4></label>
                                        <div class="uploadfile form-checker">
                                            <label for="ThumbnailToUpload<?=$key+3001?>" class="label-file btn btn-info">Changer d'image </label>
                                            <input id="ThumbnailToUpload<?=$key+3001?>" class="input-file content" type="file" accept=".jpg,.JPG,.PNG,.png,.jpeg,.JPEG" name="image_square[body_thumbnails][<?=$key?>][image2]"><br/>
                                            <span class="nom-fichier">Aucun fichier sélectionné</span>
                                            <input type="hidden" name="body_thumbnails[<?=$key?>][image2]" value="<?=$value['image2']?>" class="content"/>
                                            <br/>
                                        </div>
                                        <br/>
                                        <div class="apercu-image image-unmasked">
                                            <label>Aperçu de votre image :</label>
                                            <img src="../<?=$value['image2']?>" class="img-responsive" alt="">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-2 col-sm-offset-3 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>

                        <?php
                                    }  
                                    if($index === 'body_images') {
                        ?>
                        <div class="article-item ui-state-default">
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <h4 class="item_title"><strong>IMAGE</strong></h4>
                                </div>
                                <div class="col-xs-12 col-sm-4 form-checker">
                                    <label>Insérer une image <br> <small>Format final : 1590x900</small></label>
                                    <div class="uploadfile">
                                        <label for="ImageToUpload<?=$key+1000?>" class="label-file btn btn-info">Changer d'image </label>
                                        <input id="ImageToUpload<?=$key+1000?>" class="input-file content" type="file" accept=".jpg,.JPG,.png,.PNG,.jpeg,.JPEG" name="image_large[body_images][<?=$key?>]"><br/>
                                        <span class="nom-fichier">Aucun fichier sélectionné</span>
                                        <input type="hidden" name="body_images[<?=$key?>]" value="<?=$value?>" class="content"/>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 apercu-image image-unmasked">
                                    <label>Aperçu de votre image actuelle :</label>
                                    <img src="../<?=$value?>" class="img-responsive" alt="">
                                </div>
                                <div class="col-xs-12 col-sm-2 col-sm-offset-2 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                        
                        <?php
                                    } 
                                    if($index === 'body_videos') {
                                        $id_video = str_replace('https://www.youtube.com/watch?v=',"", $value);
                        ?>

                        <div class="article-item ui-state-default">
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <h4 class="item_title"><strong>VIDEO (LIEN YOUTUBE)</strong></h4>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-group form-checker">
                                        <label>Vidéo :</label>
                                        <input class="form-control content" placeholder="Entrez l'URL de votre vidéo (Youtube) :" type="text" value="<?=$value?>" name="required[url][body_videos][<?=$key?>]" data-required="Vous devez entrer l'URL de votre vidéo" >
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-sm-offset-1">
                                    <div class="form-checker">
                                        <label>Aperçu :</label>
                                        <div style="position:relative;padding-bottom:56.25%">
                                            <iframe width="800" height="600"  src="https://www.youtube.com/embed/<?=$id_video?>"
                                            frameborder="0" allowfullscreen style="position:absolute; top:0; left:0; width:100%; height:100%;"></iframe>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-sm-offset-1 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                    <?php
                                    }  
                                    if($index === 'body_titles') {
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <h4 class="item_title"><strong>TITRE</strong></h4>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="form-group form-checker">
                                        <input class="form-control content" placeholder="Entrez votre titre :" type="text" value="<?=$value?>" name="required[alphanum][body_titles][<?=$key?>]" data-required="Veuillez entrer un titre">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-sm-offset-4 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                    <?php
                                    }  
                                    if($index === 'body_texts') {
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <h4 class="item_title"><strong>PARAGRAPHE DE TEXTE</strong></h4>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <div class="form-group form-checker">
                                        <textarea name="required[body_texts][<?=$key?>]" class="content wysiwig"><?=$value?></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-sm-offset-2 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                    <?php
                                    }  
                                    if($index === 'body_html') {
                        ?>
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <h4 class="item_title"><strong>CODE HTML</strong></h4>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-checker">
                                        <label>Insérer votre code HTML :</label>
                                        <textarea class="form-control content" placeholder="Copiez / Coller le code HTML à afficher sur le site" name="required[body_html][<?=$key?>]" data-required="Vous devez copier/coller le code HTML à insérer"><?=$value?></textarea>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-sm-offset-1">
                                    <div class="form-checker">
                                        <label>Aperçu :</label> <br><br>
                                        <?=$value?>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-sm-offset-1 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                    <?php
                                    }  
                                    if($index === 'body_pdf') {
                        ?>
                        
                        <div class="article-item ui-state-default form-group">
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <h4 class="item_title"><strong>DOCUMENT .PDF</strong></h4>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="form-checker">
                                        <label>Intitulé du fichier :</label>
                                        <input class="form-control content" placeholder="Entrez l'intitulé de votre fichier :" type="text" name="required[body_pdf][<?=$key?>][titre]" data-required="Vous devez entrer un titre" value="<?=$value['titre']?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-sm-offset-1">
                                    <label>Sélectionner un fichier <br/><small>Format : PDF</small></label><br>    
                                    <a href="../<?=$value['file']?>" title="Voir votre fichier" target="_blank" class="btn btn-info"><i class="fa fa-eye"></i> Voir le fichier actuel</a>
                                    <br/><br><b>OU</b> <br><br/>
                                    <div class="uploadfile form-checker">
                                        <label for="PDFToUpload<?=$key+5000?>" class="label-file btn btn-info">Sélectionner un autre fichier</label>
                                        <input id="PDFToUpload<?=$key+5000?>" class="input-file content" type="file" accept=".pdf" name="pdf[body_pdf][<?=$key?>][file]"><br/>
                                        <span class="nom-fichier">Aucun fichier sélectionné</span>
                                        <input type="hidden" name="body_pdf[<?=$key?>][file]" value="<?=$value['file']?>" class="content">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-2 col-sm-offset-1 item-edition">
                                    <span class="bouton delete"><span class="fa fa-trash"></span></span>
                                    <span class="bouton move"><span class="fa fa-arrows"></span></span>
                                </div>
                            </div>
                        </div>
                    <?php
                                    }  
                                }
                            }
                        }
                    ?>
                    </div>
                    
                    <!-- / Page builder -->
                    
                    <div class="col-xs-12">
                        <hr>
                    </div>
                    <div class="col-xs-12">
                        <h4>Ajouter un élément</h4>
                        <br/>
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_content" data-type="content">
                            <span class="fa fa-align-left"></span> | <b>BLOC DE CONTENU</b>
                        </button>

                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_title" data-type="title">
                            <span class="fa fa-font"></span> | <b>TITRE</b>
                        </button>

                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_text" data-type="text">
                            <span class="fa fa-text-width"></span> | <b>TEXTE</b>
                        </button>
                        
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_image" data-type="image">
                            <span class="fa fa-image"></span> | <b>IMAGE</b>
                        </button>
                        
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_thumbnails" data-type="thumbnails">
                            <span class="fa fa-image"></span> | <b>VIGNETTES X2</b>
                        </button>
                        
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_cta" data-type="cta">
                            <span class="fa fa-link"></span> | <b>CALL TO ACTION</b>
                        </button>
                        
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_video" data-type="video">
                            <span class="fa fa-video-camera"></span> | <b>VIDEO</b>
                        </button>

                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_pdf" data-type="pdf">
                            <span class="fa fa-file"></span> | <b>DOC. PDF</b>
                        </button>
                        
                        <button type="button" class="btn btn-success articleAddItem" data-target="modele_html" data-type="html">
                            <span class="fa fa-code"></span> | <b>CODE HTML</b>
                        </button>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group pull-right text-right"> 
                            <a href="articles/" class="btn btn-danger">Annuler</a>
                            <button type="submit" class="btn btn-success">Enregistrer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </form>
</div>

<!-- MODAL GESTION DES TAGS -->
<div class="modal fade modal-delete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content modal_tags">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
                <h4 class="modal-title" id="myModalLabel2">LISTE DES TAGS DISPONIBLES</h4> 
            </div>
            <div class="modal-body">
                <h4>Liste des tags disponibles</h4>
                <p>
                    Retrouvez ci-dessous la liste des tags que vous pouvez ajouter à votre article. Cliquez sur un tag pour l'ajouter à votre sélection, puis cliquez sur le bouton "Confirmer" pour les ajouter à votre article.
                </p>
                <hr>
                <p class="modal_tags_selection">
                    <strong>Votre sélection</strong>
                    <br><br>
                </p>
                <p>
                    <input type="text" class="modal_tags_filter js-search-tag form-control" placeholder="Filter les tags">
                </p>
                <div class="modal_tags_list">
                    
            <?php 
                foreach($list_tags as $tag)
                {
            ?>
                    <span class="modal_tags_item js-tag" data-slug="<?=$tag->slug()?>" data-name="<?=$tag->title()?>"><?=$tag->title()?></span>
            <?php
                }
            ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-success modal_tags_confirm" data-dismiss="modal">Confirmer</button>
            </div>
        </div>
    </div>
</div>

<!-- CONTENT OF PAGE ELEMENTS -->

<div id="modele_content" class="article-item ui-state-default hidden">
    <div class="form-group row">
        <div class="col-xs-12">
            <h4 class="item_title"><strong>BLOC DE CONTENU</strong></h4>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="form-checker">
                <label>Titre (facultatif) :</label>
                <input class="form-control content" placeholder="Votre titre" type="text" name="body_contents[][titre]">
            </div><br/>
            <div class="form-checker">
                <label>Texte (obligatoire) :</label>
                <textarea class="form-control content" placeholder="Votre texte" type="text" name="required[body_contents][][texte]" data-required="Vous devez entrer un texte"></textarea>
            </div><br/>
            <div class="form-checker">
                <label>Bouton (facultatif) :</label>
                <br><br>
                <label>URL Cible :</label>
                <input class="form-control content" placeholder="https://..." type="text" name="url[body_contents][][lien]" data-required="Vous devez entrer une URL">
            </div><br/>
            <div class="form-checker">
                <label>Texte du bouton :</label>
                <input class="form-control content" placeholder="Libellé du bouton" type="text" name="body_contents[][label]" data-required="Vous devez entrer un label pour votre lien">
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-sm-offset-1">
            <label>Image (obligatoire) <br/><small>Format final : 800x800</small></label>
            <div class="uploadfile form-checker">
                <label for="ImageContent" class="label-file btn btn-info">Ajouter une image </label>
                <input id="ImageContent" class="input-file content" type="file" accept=".jpg,.jpeg,.png" data-required="Vous devez choisir une image" name="required[image_square][body_contents][][image]" ><br/>
                <span class="nom-fichier">Aucun fichier sélectionné</span>
                <br/>
            </div>
            <br/>
            <div class="apercu-image image-masked">
                <label>Aperçu de votre image </label>
                <img src="" class="img-responsive" alt="">
            </div>
        </div>
        <div class="col-xs-12 col-sm-2 col-sm-offset-1 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_image" class="article-item ui-state-default hidden">
    <div class="form-group row">
        <div class="col-xs-12">
            <h4 class="item_title"><strong>IMAGE</strong></h4>
        </div>
        <div class="col-xs-12 col-sm-4 form-checker">
            <label>Insérer une image <br> <small>Format final : 1590x900</small></label>
            <div class="uploadfile">
                <label for="ImageToUpload" class="label-file btn btn-info">Ajouter une image </label>
                <input id="ImageToUpload" class="input-file content" type="file" accept=".jpg,.JPG,.png,.PNG,.jpeg,.JPEG" name="required[image_large][body_images][]"><br/>
                <span class="nom-fichier">Aucun fichier sélectionné</span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 apercu-image">
            <label>Aperçu de votre image </label>
            <img src="" class="img-responsive" alt="">
        </div>
        <div class="col-xs-12 col-sm-2 col-sm-offset-2 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_thumbnails" class="article-item ui-state-default hidden">
    <div class="form-group row">
        <div class="col-xs-12">
            <h4 class="item_title"><strong>IMAGES VIGNETTES (x2)</strong></h4>
        </div>
        <div class="col-xs-12 col-sm-3">
            <div class="form-group">
                <label><h4>
                    Image 1 <br/><small>Format : 800x800</small>
                </h4></label>
                <div class="uploadfile form-checker">
                    <label for="ImageToUpload" class="label-file btn btn-info" label-1>Choisir une image </label>
                    <input id="ImageToUpload" class="input-file content" type="file" accept=".jpg,.JPG,.PNG,.png,.jpeg,.JPEG" data-required="Vous devez choisir une image" name="required[image_square][body_thumbnails][][image1]" image-1><br/>
                    <span class="nom-fichier">Aucun fichier sélectionné</span>
                    <br/>
                </div>
                <br/>
                <div class="apercu-image image-masked">
                    <label>Aperçu de votre image </label>
                    <img src="" class="img-responsive" alt="">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-3 col-sm-offset-1">
            <div class="form-group">
                <label><h4>
                    Image 2 <br/><small>Format : 800x800</small>
                </h4></label>
                <div class="uploadfile form-checker">
                    <label for="ImageToUpload" class="label-file btn btn-info" label-2>Choisir une image </label>
                    <input id="ImageToUpload" class="input-file content" type="file" accept=".jpg,.JPG,.PNG,.png,.jpeg,.JPEG" data-required="Vous devez choisir une image" name="required[image_square][body_thumbnails][][image2]" image-2><br/>
                    <span class="nom-fichier">Aucun fichier sélectionné</span>
                    <br/>
                </div>
                <br/>
                <div class="apercu-image image-masked">
                    <label>Aperçu de votre image </label>
                    <img src="" class="img-responsive" alt="">
                </div>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-2 col-sm-offset-3 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_cta" class="article-item ui-state-default hidden">
    <div class="form-group row">
        <div class="col-xs-12">
            <h4 class="item_title"><strong>CALL TO ACTION (CTA)</strong></h4>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="form-checker">
                <label>Titre :</label>
                <input class="form-control content" placeholder="Votre titre" type="text" name="required[body_cta][][titre]" data-required="Vous devez entrer un titre" >
            </div><br/>
            <div class="form-checker">
                <label>Texte :</label>
                <textarea class="form-control content" placeholder="Votre texte" type="text" name="required[body_cta][][texte]" data-required="Vous devez entrer un texte"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-sm-offset-1">
            <div class="form-checker">
                <label>URL du bouton :</label>
                <input class="form-control content" placeholder="https://..." type="text" name="required[url][body_cta][][lien]" data-required="Vous devez entrer une URL" >
            </div><br/>
            <div class="form-checker">
                <label>Texte du bouton :</label>
                <input class="form-control content" placeholder="Libellé du bouton" type="text" name="required[body_cta][][label]" data-required="Vous devez entrer un label pour votre lien" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-2 col-sm-offset-1 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_video" class="article-item ui-state-default hidden">
    <div class="form-group row">
        <div class="col-xs-12">
            <h4 class="item_title"><strong>VIDEO (LIEN YOUTUBE)</strong></h4>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="form-group form-checker">
                <label>Vidéo :</label>
                <input class="form-control content" placeholder="Entrez l'URL de votre vidéo (Youtube) :" type="text" name="required[url][body_videos][]" data-required="Vous devez entrer l'URL de votre vidéo" >
            </div>
        </div>
        <div class="col-xs-12 col-sm-2 col-sm-offset-6 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_html" class="article-item ui-state-default hidden">
    <div class="form-group row">
        <div class="col-xs-12">
            <h4 class="item_title"><strong>CODE HTML</strong></h4>
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="form-checker">
                <label>Insérer votre code HTML :</label>
                <textarea class="form-control content" placeholder="Copiez / Coller le code HTML à afficher sur le site" name="required[body_html][]" data-required="Vous devez copier/coller le code HTML à insérer"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-2 col-sm-offset-2 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_pdf" class="article-item ui-state-default hidden">
    <div class="form-group row">
        <div class="col-xs-12">
            <h4 class="item_title"><strong>DOCUMENT .PDF</strong></h4>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="form-checker">
                <label>Intitulé du fichier :</label>
                <input class="form-control content" placeholder="Entrez l'intitulé de votre fichier :" type="text" name="required[body_pdf][][titre]" data-required="Vous devez entrer un titre">
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-sm-offset-1">
            <label>Sélectionner un fichier <br/><small>Format : PDF</small></label>
            <div class="uploadfile form-checker">
                <label for="PDFToUpload" class="label-file btn btn-info">Ajouter un fichier</label>
                <input id="PDFToUpload" class="input-file content" type="file" accept=".pdf" data-required="Vous devez choisir un fichier" name="required[pdf][body_pdf][][file]"><br/>
                <span class="nom-fichier">Aucun fichier sélectionné</span>
                <br/>
            </div>
        </div>
        <div class="col-xs-12 col-sm-2 col-sm-offset-1 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_text" class="article-item ui-state-default hidden">
    <div class="form-group row">
        <div class="col-xs-12">
            <h4 class="item_title"><strong>PARAGRAPHE DE TEXTE</strong></h4>
        </div>
        <div class="col-xs-12 col-sm-8">
            <div class="form-group form-checker">
                <textarea class="form-control content" placeholder="Votre texte" type="text" name="required[body_texts][]" data-required="Vous devez entrer un texte"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-2 col-sm-offset-2 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<div id="modele_title" class="article-item ui-state-default hidden">
    <div class="form-group row">
        <div class="col-xs-12">
            <h4 class="item_title"><strong>TITRE</strong></h4>
        </div>
        <div class="col-xs-12 col-sm-6">
            <div class="form-group form-checker">
                <input class="form-control content" placeholder="Entrez votre titre :" type="text" value="" name="required[alphanum][body_titles][]" data-required="Veuillez entrer un sous-titre">
            </div>
        </div>
        <div class="col-xs-12 col-sm-2 col-sm-offset-4 item-edition">
            <span class="bouton delete"><span class="fa fa-trash"></span></span>
            <span class="bouton move"><span class="fa fa-arrows"></span></span>
        </div>
    </div>
</div>

<!-- end content  -->
<?php 
include 'includes/inc_main_bottombar.php'; 
include 'includes/inc_footer.php'; 
?>