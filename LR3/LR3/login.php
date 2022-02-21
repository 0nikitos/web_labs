<?php

function login_check_valid(array $fields) : array {
    // валидаторы для полей
    $validate = [
        'email' => function($value) {
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        },
        'password' => function($value) {
            $regex = '/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*_]{7,}/';
            return preg_match($regex, $value);
        },
    ];

    // сообщения об ошибках для полей
    $validate_errors = [
        'email' => 'Пожалуйста, введите адрес электронной почты',
        'password' => 'Пароль не удовлетворяет требованиям: больше 6 символов, содержит маленькие и большие латинские буквы, спецсимволы',
    ];

    $errors = [];

    foreach($fields as $field => $value) {
        if(!array_key_exists($field, $validate)) continue;

        $result = $validate[$field]($value);

        if($result === false) {
            $errors[$field]['error_msg'] = $validate_errors[$field];
        }
    }

    return $errors;
}


include_once "core/functions.php";
include_once "services/users/user.php";
include_once "core/database/connect.php";

$v = []; // массив переменных для вывода в html


// если пользователь уже зарегестирован, выводим другую страницу
if(user_is_authorized()) {
    // получаем данные о текущем пользователе
    $v["user"] = db_fetch_row('users', [], 'id', user_get());

    render_page("login_already", $v);
}

// обработка отправки данных
if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

    // получаем данные
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    // проверяем на валидность
    $errors = login_check_valid([
        "email" => $email,
        "password" => $password
    ]);

    // проверка авторизации
    if(empty($errors)) {
        // делаем запрос к базе на проверку пользователя
        if($user = db_fetch_row('users', [], 'email', $email)) {
            // сравниваем пароли
            if(password_verify($password, $user['password'])) {

                // делаем пользователя авторизованным
                user_set($user['id']);

                // редиректим на главную страницу
                redirect("index");       
            } 
            else { $v['errors']['login'] = 'Неверный логин или пароль'; }
        } 
        else { $v['errors']['login'] = 'Пользователя с таким адресом нет.'; }
    } 
    else { 
        foreach($errors as $field => $error)
            $v["errors"][$field] = $error['error_msg']; 
    }
}

render_page("login", $v);