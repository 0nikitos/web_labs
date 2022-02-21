<?php require_once "templates/header.php" ?>

<main>
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
                <?php foreach ($v['items'] as $item) : ?>
                    <tr>
                        <th>
                            <?php if($v['isAuthorized']): ?>
                                <img src="img/<?= $item['img_path']?>" alt="text" style="max-width:150px" >
                            <?php else :?>
                                <span>Изображение доступно только авторизованным пользователям</span>
                            <?php endif;?>
                        </th>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['provider_name'] ?></td>
                        <td><?= $item['description'] ?></td>
                        <td><?= $item['cost'] ?> руб</td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>

<?php require_once "templates/footer.php" ?>