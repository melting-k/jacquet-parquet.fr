<aside class="c-icons">
    <div class="container">
        <div class="grid">
            <div class="c-icons_wrapper">
<?php
    $i=0;
    foreach($page_item->items as $item) {
?>
                <div class="c-icons_item">
                    <p data-parallax="zoomIn" data-parallax-delay="<?=$i?>"><?=$item->icon?></p>
                    <p data-parallax="fromB" data-parallax-delay="<?=$i?>">
                        <strong>
                            <?=$item->title?>
                        </strong>
                    </p>
                </div>
<?php
        $i++;
    }
?>
            </div>
        </div>
    </div>
</aside>