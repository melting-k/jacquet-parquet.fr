<div cards_wrapper data-article_url="<?=$NAV_mag_article?>" data-default_num="<?=$number_races?>">
<?php   
    
    include 'includes/form-sort.php';
?>
    <div class="c-card_wrapper">
<?php
    if(!empty($articles_featured))
    {
        $article_featured = $articles_featured[0];
        $article_featured->get_category();
?>
        <div class="c-card_wrapper_featured">
            <div class="container">
                <div class="grid">
                    <h2 class="c-card_wrapper_title">
                        À la une
                    </h2>
                    <div class="c-card--featured">
                        <figure class="c-card_img">
                            <a href="<?=$NAV_mag_article?><?=$article_featured->slug()?>" class="c-card_img_wrapper">
                                <img loading="lazy" src="<?=$article_featured->cover()?>" alt="Illustration de l'article : <?=$article_featured->title()?>">
                            </a>
                            <span class="c-card_category">
                                <span class="u-button--small"><?=$article_featured->category()->title()?></span>
                            </span>
                        </figure>
                        <div class="c-card_infos">
                            <div>
                                <p class="c-card_date">
                                    <?=$article_featured->date_publication()?>
                                </p>
                                <h2 class="c-card_title"><?=$article_featured->title()?></h2>
                                <p class="c-card_preview">
                                    <?=$tools->createPreview($article_featured->intro_text(),160)?>
                                </p>
                            </div>
                            <p class="c-card_link">
                                <a class="u-button--small" href="<?=$NAV_mag_article?><?=$article_featured->slug()?>">Lire cet article</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
?>

        <div class="c-card_container">
            <div class="container">
                <div class="grid">
                    <h2 class="c-card_wrapper_title">
                        Tous les articles
                    </h2>
                </div>
            </div>
            <div class="container">
                <div class="grid" cards_container total_items="<?=$articles_total?>">
<?php
    if(!empty($articles))
    {
        foreach($articles as $article)
        {
            $article->get_category();
?>
                    <div class="c-card" card>
                        <a href="<?=$NAV_mag_article?><?=$article->slug()?>">
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
            <p class="c-card_container_empty">
                Aucun article disponible.
            </p>
<?php
    }   
?>
                </div>
            </div>
        </div>
        <div class="c-card_loadbutton">
            <button class="u-button--plain hidden" data-number="<?=$number_races_load?>" load_items>
                <span>Voir plus</span>
            </button>
        </div>
    </div>
</div>