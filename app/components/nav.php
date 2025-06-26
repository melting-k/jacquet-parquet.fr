<nav class="p-nav" data-role="nav">
    <div class="p-nav_navbar">
        <a href="<?=$NAV->home->url?>" title="<?=$NAV->home->title?>" class="p-nav_logo">
            <?php
                include 'img/logo-sigle.svg';
                include 'img/logo-typo.svg';
            ?>
        </a>
        
        <button class="u-burger hidden-lg--min" data-action="open_nav">
            <span class="u-burger_bar"></span>
            <span class="u-burger_bar"></span>
            <span class="u-burger_bar"></span>
        </button>
        <div class="p-nav_overlay">
            <ul class="p-nav_menu">
<?php
    foreach($NAV as $key => $item) {
        if($item->is_nav) {
?>
                <li class="p-nav_menu_item <?=$PAGE_name==$key ? "active" : ""?>">
                    <a href="<?=$item->url?>" title="<?=$item->title?>"><?=$item->label?></a>
                </li>
<?php
        }
    }
?>
            </ul>
        </div>
    </div>
    <a href="<?=$NAV->infos->url?>" title="<?=$NAV->infos->title?>" class="p-nav_float u-button--round">
        <?=$icons->contact?>
    </a>
</nav>