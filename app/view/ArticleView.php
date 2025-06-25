<?php
    include 'includes/return-back.php';
?>
<article class="mag_content c-article">
    <div class="container">
        <div class="grid">
            <h1 class="c-article_title">
                <?=$article->title()?>
            </h1>
            <figure class="c-article_cover">
                <span class="c-article_category">
                    <?=$article->category()->title()?>
                </span>
                <img loading="lazy" src="<?=$article->cover()?>" alt="Illustration de l'article <?=$article->title();?>" />
            </figure>
            <p class="c-article_date">
                Publié le <?=$article->date_publication(); ?>
            </p>
            <div class="c-article_social">
                <p class="c-article_social_text">
                    Partager cet article :
                </p>
                <div class="c-article_social_links">
                    <a href="https://twitter.com/share?url=<?=urlencode($ogURL)?>"
                        class="c-article_social_link twitter" target="_blank">
                        <?=$icon_twitter?>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?=urlencode($ogURL)?>"
                        class="c-article_social_link facebook" target="_blank">
                        <?=$icon_facebook?>
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?=urlencode($ogURL)?>"
                        class="c-article_social_link linkedin" target="_blank">
                        <?=$icon_linkedin?>
                    </a>
                </div>
            </div>
            <div class="c-article_tags">
<?php
    foreach($article->tags() as $tag) 
    {
?>
                <span class="c-article_tag">#<?=$tag->title()?></span>
<?php
    }  
?>
            </div>
            <div class="c-article_intro">
                <?=$article->intro_text()?>
            </div>
            
            <!-- CORPS DE L'ARTICLE -->
            
            <div class="c-article_body">
<?php 
if(!empty($article_body)) 
{
    foreach($article_body as $order => $element)
    {
        foreach($element as $type => $content)
        {
            switch($type)
            {
                case 'body_titles':
?>
                    <h2 class="c-article_body_title">
                        <?=$content?>
                    </h2>
<?php
                break;
                case 'body_texts':
?>
                    <p class="c-article_body_text">
                        <?=$content?>
                    </p>
<?php
                break;
                case 'body_images':
?>
                    <figure class="c-article_body_image">
                        <img loading="lazy" src="<?=$content?>" alt="<?=$article->title()?>" />
                    </figure>

<?php
                break;
                case 'body_thumbnails':
?>
                    <div class="c-article_body_thumbnails">
<?php
                    foreach($content as $image) {
?>
                        <img src="<?=$image?>" alt="Illustration article <?=$article->title()?> <?=$client_name?>">
<?php
                    }
?>
                    </div>
<?php
                break;
                case 'body_contents':
?>
                    <div class="c-article_body_content">
                        <div class="c-article_body_content_wrapper">
                            <h3 class="c-article_body_content_title">
                                <?=$content['titre']?>
                            </h3>
                            <p class="c-article_body_content_text">
                                <?=$content['texte']?>
                            </p>
                            <p class="c-article_body_content_link">
                                <a class="u-button--plain--secondary" href="<?=$content['lien']?>" target="_blank">
                                    <?=$content['label']?>
                                </a>
                            </p>
                        </div>
                        <p class="c-article_body_content_img">
                            <img loading="lazy" src="<?=$content['image']?>" alt="<?=$content['titre']?>">
                        </p>
                    </div>
<?php
                break;
                case 'body_videos':
                    $id_video = str_replace('https://www.youtube.com/watch?v=',"", $content);
?>
                    <div class="c-article_body_video">
                        <iframe width="800" height="600" src="https://www.youtube.com/embed/<?=$id_video?>"
                            frameborder="0" allowfullscreen></iframe>
                    </div>
<?php
                break;

                case 'body_cta':
?>
                    <div class="c-article_body_cta">
                        <h3 class="c-article_body_cta_title">
                            <?=$content['titre']?>
                        </h3>
                        <p class="c-article_body_cta_text">
                            <?=$content['texte']?>
                        </p>
                        <p class="c-article_body_cta_link">
                            <a href="<?=$content['lien']?>" target="_blank" class="u-button--plain--secondary"><?=$content['label']?></a>
                        </p>
                    </div>
<?php
                    break;
                
                case 'body_html':
?>
                    <div class="c-article_body_html">
                        <?=$content?>
                    </div>
<?php
                    break;
                
                    case 'body_pdf':
?>
                    <div class="c-article_body_pdf">
                        <h3 class="c-article_body_pdf_title">
                            Téléchargement de fichier
                        </h3>
                        <p class="c-article_body_cta_text">
                            Téléchargez le fichier suivant : <?=$content['titre']?>
                        </p>
                        <p class="c-article_body_pdf_link">
                            <a href="<?=$content['file']?>" target="_blank" class="u-button--plain--secondary">TÉLÉCHARGER <?=$icon_download?></a>
                        </p>
                    </div>
<?php
                        break;
            }
        }
    }
}
                            
?>
                    <div class="c-article_body_social">
                        <p class="c-article_social_text">
                            Partager cet article :
                        </p>
                        <div class="c-article_social_links">
                            <a href="https://twitter.com/share?url=<?=urlencode($ogURL)?>"
                                class="c-article_social_link twitter" target="_blank">
                                <?=$icon_twitter?>
                            </a>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?=urlencode($ogURL)?>"
                                class="c-article_social_link facebook" target="_blank">
                                <?=$icon_facebook?>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?=urlencode($ogURL)?>"
                                class="c-article_social_link linkedin" target="_blank">
                                <?=$icon_linkedin?>
                            </a>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</article>