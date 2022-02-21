<?php

include_once "core/database/connect.php";

function items_get_providers() : array|false {
    return db_fetch_all('providers');
}

function items_get_all() : array|false {
    $sql = "SELECT\n"
    ."items.img_path AS img_path, \n"
    ."items.name AS name, \n"
    ."providers.name AS provider_name, \n"
    ."items.description AS description, \n"
    ."items.cost AS cost  \n"
    ."FROM items INNER JOIN providers \n"
    ."ON items.id_provider=providers.id";

    return db_query($sql)->fetchAll();
}
