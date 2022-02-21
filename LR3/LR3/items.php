<?php

include_once "core/functions.php";
include_once "services/users/user.php";
include_once "services/items/item.php";

$v = []; // массив переменных для вывода в html

$v['isAuthorized'] = user_is_authorized();

$items = items_get_all();

foreach ($items as &$item){
        $utem = array_map(function($field){
                return htmlspecialchars($field);
        }, $item);

}

$v['items'] = $items;

render_page("items", $v);