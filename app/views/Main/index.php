<script>
    alert('<?=$_SESSION['task']?>');
</script>
<?php unset($_SESSION['task']); ?>

<div>
    <table class="table">
        <thead>
            <tr>
                <?php if($order == 'DESC'):?>
                    <th scope="col"><a href="?order=ASC&column=name">Имя</a></th>
                    <th scope="col"><a href="?order=ASC&column=email">Адрес электронной почты</a></th>
                    <th scope="col">Описание</th>
                    <th scope="col"><a href="?order=ASC&column=status">Статус</a></th>
                <?php else:?>
                    <th scope="col"><a href="?order=DESC&column=name">Имя</a></th>
                    <th scope="col"><a href="?order=DESC&column=email">Адрес электронной почты</a></th>
                    <th scope="col">Описание</th>
                    <th scope="col"><a href="?order=DESC&column=status">Статус</a></th>
                <?php endif?>
                <?php if(!empty($_SESSION['admin'])):?>
                    <th scope="col">Изменить</th>
                <?php endif;?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tasks as $task):?>
                <tr>
                    <td><?=$task['name']?></td>
                    <td><?=$task['email']?></td>
                    <td><?=$task['text']?></td>
                        <?php if(isset($_SESSION['edited_id'][$task['id']]) && $_SESSION['edited_id'][$task['id']] == $task['id']):?>
                            <td><?=$task['status'].', отредактировано администратором'?></td>
                        <?php else:?>
                            <td><?=$task['status']?></td>
                        <?php endif;?>
                    <?php if(!empty($_SESSION['admin'])):?>
                        <th><a href="/test/admin/edit?id=<?=$task['id']?>">Изменить</a></th>
                    <?php endif;?>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</div>
<div class="text-center">
    <?php if($pagination->countPages > 1):?>
        <?=$pagination?>
    <?php endif;?>
</div>

<div class="content-wrapper">
    <div class="col-sm-4">
        <form action="/test/main/add" method="post">
            <div class="form-group">
                <label>Имя</label>
                <input class="form-control" type="text" name="name" required>
            </div>
            <div class="form-group">
                <label>Адрес электронной почты</label>
                <input class="form-control" type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Текст</label>
                <textarea class="form-control" rows="2" name="text" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Добавить</button>
        </form>
    </div>
</div>