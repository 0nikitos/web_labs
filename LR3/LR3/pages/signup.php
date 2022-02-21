<?php require_once "templates/header.php" ?>

<main>
    <div class="container">
        <div class="col-md-5 mx-auto">
            <form action="signup.php" method="POST">
                <div class="form-group">
                    <label for="editEmail">Email</label>
                    <input type="email" name="email" id="editEmail" class="form-control" placeholder="example@example.com" value="<?= htmlspecialchars($_POST['email'] ?? null) ?>" required>

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['email'] ?? null ?></div><?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="editName">ФИО</label>
                    <input type="text" name="name" id="editName" class="form-control" placeholder="Иваннов Иван Иванович" value="<?= htmlspecialchars($_POST['name'] ?? null) ?>" required>

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['name'] ?? null ?></div><?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="editBirthdate">Дата рождения</label>
                    <input type="date" name="birthdate" id="editBirthdate" class="form-control" value="<?= isset($_POST['birthday']) ? date('Y-m-d', strtotime($_POST['birthday'])) : null ?>" required>

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['birthdate'] ?? null ?></div><?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="editAddress">Адрес</label>
                    <input type="text" name="address" id="editAddress" class="form-control" placeholder="ул. Арбат, д. 5, кв. 2, г. Москва" value="<?= htmlspecialchars($_POST['address'] ?? null) ?>" required>

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['address'] ?? null ?></div><?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="editGender">Пол</label>
                    <select name="gender" id="editGender" class="form-control" required>
                        <option value disabled selected>Выберите</option>
                        <option value="male" <?= (isset($_POST['gender']) && $_POST['gender'] == 'male') ? 'selected' : null ?>>Мужской</option>
                        <option value="female" <?= (isset($_POST['gender']) && $_POST['gender'] == 'female') ? 'selected' : null ?>>Женский</option>
                    </select>

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['gender'] ?? null ?></div><?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="editInterests">Интересы</label>
                    <textarea name="interests" id="editInterests" class="form-control" rows="3" placeholder="Введите"><?= htmlspecialchars($_POST["interests"] ?? NULL); ?></textarea>

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['interests'] ?? null ?></div><?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="editlLinkVk">Ссылка на профиль ВК</label>
                    <input type="url" name="link_vk" id="editlLinkVk" class="form-control" placeholder="https://vk.com/user_name" value="<?= htmlspecialchars($_POST['link_vk'] ?? null) ?>" required>

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['link_vk'] ?? null ?></div><?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="editBloodType" class="form-label">Группа крови</label>
                    <select name="blood_type" class="form-control" id="editBloodType" required>
                        <option value disabled selected>Выберите</option>
                        <option value="1" <?= (isset($_POST['blood_type']) && $_POST['blood_type'] == '1') ? 'selected' : null ?>>0 (I)</option>
                        <option value="2" <?= (isset($_POST['blood_type']) && $_POST['blood_type'] == '2') ? 'selected' : null ?>>A (II)</option>
                        <option value="3" <?= (isset($_POST['blood_type']) && $_POST['blood_type'] == '3') ? 'selected' : null ?>>B (III)</option>
                        <option value="4" <?= (isset($_POST['blood_type']) && $_POST['blood_type'] == '4') ? 'selected' : null ?>>AB (IV)</option>
                    </select>

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['blood_type'] ?? null ?></div><?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="editrh_factorRhFactor class="form-label">Резус-фактор</label>
                    <select name="rh_factor" class="form-control" id="editRhFactor" required>
                        <option value disabled selected>Выберите</option>
                        <option value="positive" <?= (isset($_POST['rh_factor']) && $_POST['rh_factor'] == 'positive') ? 'selected' : null ?>>Положительный (+)</option>
                        <option value="negative" <?= (isset($_POST['rh_factor']) && $_POST['rh_factor'] == 'negative') ? 'selected' : null ?>>Отрицательный (-)</option>
                    </select>

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['rh_factor'] ?? null ?></div><?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="editPassword">Пароль</label>
                    <input type="password" name="password" id="editPassword" class="form-control" placeholder="**********" value="<?= htmlspecialchars($_POST['password'] ?? null) ?>" required>

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['password'] ?? null ?></div><?php endif; ?>
                </div>
                <div class="form-group">
                    <label for="editPasswordAck">Пароль</label>
                    <input type="password" name="password_ack" id="editPasswordAck" class="form-control" placeholder="**********" value="<?= htmlspecialchars($_POST['password_ack'] ?? null) ?>" required>

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['password_ack'] ?? null ?></div><?php endif; ?>
                </div>

                <div class="col-md-12 text-center mt-2">
                    <button name="submit" value="submit" type="submit" class=" btn btn-block mybtn btn-primary tx-tfm login-btn">Зарегистрироваться</button>

                    <?php if (!empty($v['errors'])) : ?><div class="form-errors"><?= $v['errors']['signup'] ?? null ?></div><?php endif; ?>
                </div>

                <div class="form-group">
                    <p class="text-center">Уже есть аккаунт? <a href="login.php">Войти в аккаунт</a></p>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require_once "templates/footer.php" ?>