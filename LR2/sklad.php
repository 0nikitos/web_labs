<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/LR2/include/logic.php";
$items = db_select_item();
$providers = db_select_providers();

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Таблица</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <nav class="navbar navbar-fixed-top navbar-light bg-light ">

        <div class="collapse"  id="navbarToggleExternalContent">
            <div class="bg-dark p-4 ">
                <p class=" text-white"> ONLINESKLAD</p>
                <h6 class="text-white">Строительные материалы</h6>
                <h6 class="text-white">Дерево</h6>
                <h6 class="text-white">Металл</h6>
                <h6 class="text-white">Складское оборудование</h6>
                <h6 class="text-white">Химия,нефтепродукты,сырье</h6>
                <h6 class="text-white">Климат</h6>
                <h6 class="text-white">Промышленное обуродувоние</h6>
            </div>
        </div>
        <nav class="navbar">

            <div class="container-fluid ">

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>


        <div class="logo">
            <img src="./inc/images/logo.png" alt="Лого Онлайн склад" width="250" height="27">
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
        <a href="#"> <img  src="./inc/images/cart.png" width="80" height="60"  ></a>
        <nav class="navbar navbar-light bg-light">
            <form class="container-fluid justify-content-start">
                <button class="btn btn-outline-info me-2" type="button">Регистрация</button>
        </nav>

        <nav class="navbar navbar-light bg-light">
            <form class="container-fluid justify-content-start">
                <button class="btn btn-outline-info
                      me-2 sign_in" type="button">
                    Войти
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed" viewBox="0 0 16 16">
                        <path d="M3 2a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2zm1 13h8V2H4v13z"/>
                        <path d="M9 9a1 1 0 1 0 2 0 1 1 0 0 0-2 0z"/>
                    </svg>
                </button>
        </nav>


    </nav>



</header>

<div class="container text-center">

<div class="col-2 text-center">
    <form action="sklad.php" method="GET">
    <div class="col-5 ">
        <h4 class="form-header">Поставщик</h4>
        <select name="provider_name" class="form-control">
            <option value disabled selected>Выберите...</option>
            <?php foreach($providers as $provider):?>
                <option value="<?=$provider['name']?>" <?= (isset($_GET['name']) && $_GET['name']==$provider['name']) ? 'selected' : ''?> ><?=$provider['name']?></option>
            <?php endforeach; ?>
        </select>
    </div>
<h4 class="form-header text-center">Название</h4>
<input name="name" type="text" class="form-control text-center" value="<?=htmlspecialchars($_GET["name"] ?? NULL) ?>" placeholder="Введите название...">

</div>

<div class="col-2 text-center">
    <h4 class="form-header">Описание</h4>
    <textarea name="description" rows="2" class="form-control text-center" placeholder="Введите описание..."><?=htmlspecialchars($_GET["description"] ?? NULL); ?></textarea>
</div>
<div class="col-2 ">
    <h4 class="form-header">Цена</h4>
    <div class="form-group row justify-content-between">
        <label for="inputCostFrom" class="col-auto col-form-label">От:</label>
        <div class="col-10">
            <input name="cost_from" type="number" class="form-control" id="inputCostFrom" value="<?=htmlspecialchars($_GET["cost_from"] ?? NULL) ?>" placeholder="1000р">
        </div>
    </div>


    <div class="form-group row justify-content-between pt-1">
        <label for="inputCostTo" class="col-auto col-form-label">До:</label>
        <div class="col-10">
            <input name="cost_to" type="number" class="form-control" id="inputCostTo" value="<?=htmlspecialchars($_GET["cost_to"] ?? NULL) ?>" placeholder="7799р">
        </div>
    </div>
    <div class="button">
        <div class="mt-auto">
            <input type="submit" name="apply" value="применить" class="btn py-1 px-4 mt-3">
            <input type="submit" name="clear" value="сбросить" class="btn  py-1 px-4 mt-3">
        </div>
    </div>
</div>
    </form>

</div>
<div class="container text-center mt-3 ">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Изображние</th>
                <th scope="col">Наименование</th>
                <th scope="col">бренд</th>
                <th scope="col">описание</th>
                <th scope="col">стоимость</th>
            </tr>
        </thead>

        <tbody>
        <?php foreach($items as $item):?>
        <tr>

            <th><img src="img/<?= $item['img_path']?>" style="max-width:150px" ></th>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td><?= htmlspecialchars($item['provider_name']) ?></td>
            <td><?= htmlspecialchars($item['description']) ?></td>
            <td><?= htmlspecialchars($item['cost']) ?> руб</td>

        </tr>
        <?php endforeach; ?>
        </tbody>


    </table>

</div>

</table>
    </div>
</div>
<footer>
    <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <p>Все категории</p>
                    <a href="#"><p>Кабели и провода</p></a>
                    <a href="#"><p>Трансформаторы</p></a>
                    <a href="#"><p>Оборудование 6-10кВ</p></a>
                    <a href="#"><p>Климатическое оборудование</p></a>
                    <a href="#"><p>Изделия для электромонтажа</p></a>
                    <a href="#"><p>Счетчики и приборы учета</p></a>
                </div>

                <div class="col-3">
                    <p></p>
                    <a href="#"><p>Светотехника </p></a>
                    <a href="#"><p>Шкафы и щиты </p></a>
                    <a href="#"><p>Бесперебойное электроснабжение </p></a>
                    <a href="#"><p>Розетки и выключатели </p></a>
                    <a href="#"><p>Низковольтное оборудование </p></a>
                    <a href="#"><p>Безопасность </p></a>

                </div>

                <div class="col-3">
                    <h6>информация</h6>
                    <a href="#"><h6>О проекте</h6> </a>
                    <a href="#"><h6>заказчики</h6></a>

                </div>

                <div class="col-3">
                    <h6 class="p">Контакты</h6>
                    <h6 class="h6">Телефон горячей линии</h6>
                    <h6>8-800-555-35-35</h6>
                    <h6 class="h6">Электронная почта для связи</h6>
                    <h6>maket@maket.maket</h6>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telegram" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.287 5.906c-.778.324-2.334.994-4.666 2.01-.378.15-.577.298-.595.442-.03.243.275.339.69.47l.175.055c.408.133.958.288 1.243.294.26.006.549-.1.868-.32 2.179-1.471 3.304-2.214 3.374-2.23.05-.012.12-.026.166.016.047.041.042.12.037.141-.03.129-1.227 1.241-1.846 1.817-.193.18-.33.307-.358.336a8.154 8.154 0 0 1-.188.186c-.38.366-.664.64.015 1.088.327.216.589.393.85.571.284.194.568.387.936.629.093.06.183.125.27.187.331.236.63.448.997.414.214-.02.435-.22.547-.82.265-1.417.786-4.486.906-5.751a1.426 1.426 0 0 0-.013-.315.337.337 0 0 0-.114-.217.526.526 0 0 0-.31-.093c-.3.005-.763.166-2.984 1.09z"/>
                    </svg></a>
                    <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg>
                    </a>

                </div>

            </div>
        </div>
    </div>
 <div class="foot-info">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-8">
                    <div class="list-group list-group-horizontal list-group-light information">
                        <li class="list-group-item main-content but "><a class="but_url" href="#">Политика конфиденциальности</a></li>
                        <li class="list-group-item main-content but "><a class="but_url" href="#">Пользовательское соглашение</a></li>
                        <li class="list-group-item main-content but "><a class="but_url" href="#">Согласие на обработку персональных данных</a></li>
                        <li class="list-group-item main-content but "><a class="but_url" href="#">Публичная оферта</a></li></div>

                </div>
                <div class="col-auto"><p class="about">© 2021 ООО "ОНЛАЙНСКЛАД"</p></div>

            </div>

        </div>


    </div>
    </div>


</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>
</html>