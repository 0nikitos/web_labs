<?php

session_start();

function user_is_authorized(): bool {
    return isset($_SESSION["USER_ID"]);
}

function user_set(string $id): bool {
    $_SESSION["USER_ID"] = $id;
    return true;
}

function user_get(): string|false {
    return $_SESSION["USER_ID"] ?? false;
}

function user_unset() {
    session_unset();
    unset($_SESSION["USER_ID"]);

    session_destroy();
}