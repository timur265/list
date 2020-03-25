<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-body">
            <form action="/test/admin/login" method="post">
                <div class="form-group">
                    <?php if($error != ''):?>
                        <p class="alert-danger">
                            <?=$error."<br/>"?>
                        </p>
                    <?php endif;?>
                    <label>Логин</label>
                    <input class="form-control" type="text" name="login">
                </div>
                <div class="form-group">
                    <label>Пароль</label>
                    <input class="form-control" type="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Вход</button>
            </form>
        </div>
    </div>
</div>