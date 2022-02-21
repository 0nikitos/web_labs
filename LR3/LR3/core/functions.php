<?php

function render_page(string $name, array $viewVariables = []) {
    $v = $viewVariables;
    require_once "pages/" . $name . ".php";
    die;
}

function redirect(string $on_script) {
    header("Location: " . $on_script . ".php");
    die;
}