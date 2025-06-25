<?php

$TableGenerator = new TableGenerator($db);
$id = isset($_GET["id"]) ? $_GET["id"] : 0;

function create_table($generator, $id) {
    try {
        $generator->generateClass($id);
    }
    catch (Exception $e) {
        echo $e->getMessage();
    }
}