<?php

include_once "services/users/user.php";

$isAuthorized = user_is_authorized();

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Онлайн склад</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="pages/assets/css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-fixed-top navbar-light bg-light">

            <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark p-4">
                    <h5 class="text-white h4">Collapsed content</h5>
                    <span class="text-muted">Toggleable via the navbar brand.</span>
                </div>
            </div>
            <nav class="navbar">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </nav>
            <div class="row">
                <div class="col-1">
                    <h2>></h2>
                </div>
            </div>
            <div class="logo">
                <img src="pages/assets/img/logo.png" alt="Лого Онлайн склад" width="250" height="27">
            </div>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                    Все категории
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li class="dropdown-item">Кабели и провода</li>
                    <li class="dropdown-item">Светотехника</li>
                    <li class="dropdown-item">Трансформаторы</li>
                    <li class="dropdown-item">Шкафы и щиты</li>
                    <li class="dropdown-item">Оборудование 6-10кВ</li>
                    <li class="dropdown-item">Бесперебойное <br> электроснабжение</li>
                    <li class="dropdown-item">Климатическое <br>оборудование</li>
                    <li class="dropdown-item">Розетки и выключатели</li>
                    <li class="dropdown-item">Изделия для электромонтажа</li>

                </ul>
            </div>
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Введите название" aria-label="Поиск">
                        <button class="btn btn-outline-success" type="submit">Поиск</button>
                    </form>
                </div>
            </nav>
            <a href="#"> <img src="pages/assets/img/cart.png" width="80" height="60"></a>
            <nav class="navbar navbar-light bg-light">
                <form class="container-fluid justify-content-start">
                    <a href="signup.php" class="btn btn-outline-info me-2">Регистрация</a>
                </form>
            </nav>

            <nav class="navbar navbar-light bg-light">
                <form class="container-fluid justify-content-start">
                    <a href="login.php" class="btn btn-outline-info
                      me-2 sign_in">
                        Войти
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                            <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z" />
                            <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z" />
                        </svg>
                    </a>
                </form>
            </nav>
        </nav>

        <?php if (!$isAuthorized) : ?>
            <div class="d-block py-4 px-1">
                <span>
                    Вы не авторизованы.
                    <a href="login.php">Ввести логин и пароль</a>
                    или
                    <a href="signup.php">зарегистрироваться</a>
                </span>
            </div>
        <?php endif; ?>
    </header>