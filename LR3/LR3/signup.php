<?php

function signup_check_valid(array $fields) : array {
    // валидаторы для полей
    $validate = [
        'email' => function($value) {
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        },
        'link_vk' => function($value) {
            $regex = '/(https?:\/\/)?(www\.)?vk\.com\/(\w|\d)+?\/?/';
            return preg_match($regex, $value);
        },
        'password' => function($value) {
            $regex = '/(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z!@#$%^&*_]{7,}/';
            return preg_match($regex, $value);
        },
    ];

    // сообщения об ошибках для полей
    $validate_errors = [
        'email' => 'Пожалуйста, введите адрес электронной почты',
        'link_vk' => 'Проверьте, что ссылка введет на профиль ВК',
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

if(isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $fields = [];

    // получаем данные
    $fields['email']     = trim($_POST['email']);
    $fields['name']      = trim($_POST['name']);
    $fields['birthdate'] =      $_POST['birthdate'];
    $fields['address']   = trim($_POST['address']);
    $fields['gender']    =      $_POST['gender'];
    $fields['interests'] = trim($_POST['interests']);
    $fields['link_vk']    = trim($_POST['link_vk']);
    $fields['blood_type'] =      $_POST['blood_type'];
    $fields['rh_factor']  =      $_POST['rh_factor'];
    $fields['password']  =      $_POST['password'];
    $fields['password_ack']  =      $_POST['password_ack'];

    // проверяем на валидность
    $errors = signup_check_valid($fields);

    // регистрируем пользователя
    if(empty($errors)) {

        // сравниваем введеные пароли
        if($fields['password'] == $fields['password_ack']) {

            // если такого пользователя нет
            if(db_fetch_row('users', [], 'email', $fields['email']) === false) {

                // хешируем пароль
                $fields['password'] = password_hash($fields['password'], PASSWORD_DEFAULT);
                unset($fields['password_ack']);

                // добавляем пользователя в базу
                db_push_row('users', $fields);

                // редиректим на страницу авторизации
                redirect('login');
            } 
            else { $v['errors']['signup'] = 'Пользователь с таким логином уже существует'; }
        } 
        else { $v['errors']['signup'] = 'Пароли не совпадают'; }
    } 
    else { 
        foreach($errors as $field => $error)
            $v["errors"][$field] = $error['error_msg']; 
    }
}

render_page("signup");