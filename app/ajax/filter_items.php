<?php
    // *** Inclusion Main Controller
    
    define ('FOLDER_ADMIN',"back-office/");

    require(realpath(__DIR__ . '/..').'/'.FOLDER_ADMIN.'includes/inc_config.php');

    include '../controller/MainController.php';

    // *** Récupération des variables post
    
    $mag_url = $_POST['base_url'];

    $number = (isset($_POST['card_number']) && !empty($_POST['card_number'])) ? (int) $_POST['card_number'] : false;

    $category = (isset($_POST['categories'])) ? $CategoryManager->get($_POST['categories'], 'category') : false;
    $tag = (isset($_POST['tags'])) ? $TagManager->get($_POST['tags'], 'tag') : false;

    $id_category = ($category) ? $category->id_category() : false;
    $id_tag = ($tag) ? $tag->id_tag() : false;

    // Récupération des items 
    $items = $ArticleManager->lists(true,false,$id_category,$id_tag,$number);
    $items_total = $ArticleManager->lists(true,false,$id_category,$id_tag);
    
    header('items_number:'.count($items_total));

    if(!empty($items))
    {
        foreach($items as $article)
        {
            $article->get_category();
?>
        <div class="c-card" card>
            <a href="<?=$mag_url.$article->slug()?>">
                <figure class="c-card_img">
                    <div class="c-card_img_wrapper">
                        <img loading="lazy" src="<?=$article->cover()?>" alt="Illustration de l'article : <?=$article->title()?>">
                    </div>
                    <span class="c-card_category">
                        <span class="u-button--small"><?=$article->category()->title()?></span>
                    </span>
                </figure>
                <div class="c-card_infos">
                    <div>
                        <p class="c-card_date">
                            <?=$article->date_publication()?>
                        </p>
                        <h2 class="c-card_title"><?=$article->title()?></h2>
                        <p class="c-card_preview">
                            <?=$tools->createPreview($article->intro_text(),160)?>
                        </p>
                    </div>
                </div>
            </a>
        </div>
<?php
        }
    }
    else
    {
?>
    <p class="c-card_message" card>
        Aucun article ne correspondant à vos critères n'a été trouvé.<br>
        Veuillez réinitialiser les filtres pour découvrir tous nos articles.
    </p>
<?php
    }
                
?>