<?php require_once "templates/header.php" ?>

<main>
    <div class="container">
        <div class="col-md-5 mx-auto">
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="editEmail">Email</label>
                    <input type="email" name="email" id="editEmail" class="form-control" placeholder="example@example.com" value="<?= htmlspecialchars($_POST['email'] ?? null) ?>">

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['email'] ?? null ?></div><?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="editPassword">Пароль</label>
                    <input type="password" name="password" id="editPassword" class="form-control" placeholder="**********" value="<?= htmlspecialchars($_POST['password'] ?? null) ?>">

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['password'] ?? null ?></div><?php endif; ?>
                </div>
                <div class="col-md-12 text-center ">
                    <button name="submit" value="submit" type="submit" class=" btn btn-block mybtn btn-primary tx-tfm login-btn">Войти</button>

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['login'] ?? null ?></div><?php endif; ?>
                </div>
                <div class="form-group">
                    <p class="text-center">Ещё нет аккаунта? <a href="signup.php">Зарегистрируйтесь</a></p>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require_once "templates/footer.php" ?>