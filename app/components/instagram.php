<?php
    if(!empty($_SESSION['instagram']) && count($_SESSION['instagram']) >= 4)
    {
?>
<aside class="c-instagram">
    <div class="container">
        <div class="grid">
<?php
    for($i=0;$i<4;$i++) {
        $image = $_SESSION['instagram'][$i];
?>
            <a class="c-instagram_item" target="_blank" href="<?=$NAV->instagram->url?>" title="<?=$NAV->instagram->title?>" data-parallax="fromB" data-parallax-delay="<?=$i?>">
                <div class="c-instagram_item_wrapper">
                    <?=$icons->instagram?>
                    <img src="<?=$image?>" alt="Photo Instagram de Jacquet Parquet">
                </div>
            </a>
<?php
    }
?>
        </div>
    </div>
</aside>
<?php
    }
?>