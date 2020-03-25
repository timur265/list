<script>
    alert('<?=$_SESSION['update']?>');
</script>
<?php unset($_SESSION['update']); ?>
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4">
                        <form action="/test/admin/edit?id=<?=$data['id'];?>" method="post" >
                            <div class="form-group">
                                <label>Название</label>
                                <input class="form-control" type="text" value="<?php echo htmlspecialchars($data['name'], ENT_QUOTES); ?>" name="name">
                            </div>
                            <div class="form-group">
                                <label>Адрес электронной строки</label>
                                <input class="form-control" type="email" value="<?php echo htmlspecialchars($data['email'], ENT_QUOTES); ?>" name="email">
                            </div>
                            <div class="form-group">
                                <label>Текст</label>
                                <textarea class="form-control" rows="3" name="text"><?php echo htmlspecialchars($data['text'], ENT_QUOTES); ?></textarea>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="status" type="checkbox" value="выполнено" id="defaultCheck2" >
                                <label class="form-check-label" for="defaultCheck2">
                                    Выполнено
                                </label>
                            <button type="submit" class="btn btn-primary btn-block">Изменить</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>