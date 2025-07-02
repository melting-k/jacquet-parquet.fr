<aside class="c-scroll" content_switcher>
    <div class="container">
        <div class="grid">
            <div class="c-scroll_view">
                <div class="grid">
                    <div class="c-scroll_view_content">
                        <h2 class="c-scroll_title" data-parallax="fromB">
                            <?=$page_item->title?>
                        </h2>
                        <div class="c-scroll_content">
                            <div class="c-scroll_numbers" items_container>
                    <?php
                        $i = 1;
                        foreach($page_item->items as $item) {
                    ?>
                                <p class="c-scroll_number" content_to_switch>
                                    <?=$i?>
                                </p>
                    <?php
                            $i++;
                        }
                    ?>
                            </div>
                            <div class="c-scroll_right">
                                <div class="c-scroll_texts" items_container>
                    <?php
                        foreach($page_item->items as $item) {
                    ?>
                                    <p class="c-scroll_text" content_to_switch>
                                        <strong><?=$item->title?></strong>
                                        <br><br>
                                        <?=$item->text?>
                                    </p>
                    <?php
                        }
                    ?>
                                </div>
                                <p class="c-scroll_dots" items_container>
                    <?php
                        foreach($page_item->items as $item) {
                    ?>
                                    <span class="c-scroll_dot" content_to_switch></span>
                    <?php
                        }
                    ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="c-scroll_scroller" sticky_scroller>
<?php
    foreach($page_item->items as $item) {
?>
                <div class="c-scroll_scroller_item" sticky_switcher></div>
<?php
    }
?>        
            </div>
        </div>
    </div>
</aside>