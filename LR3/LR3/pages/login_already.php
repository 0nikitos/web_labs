<?php require_once "templates/header.php" ?>

<main>
    <span>Вы уже авторизованы как <?= $v["user"]["email"] ?>.</span>
    <a href="logout.php">Выйти.</a>
</main>

<?php require_once "templates/footer.php" ?>