<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="assets/styles/bootstrap.css" >
</head>
<body>
    <nav class="navbar navbar-inverse">
        <ul class="nav navbar-nav ">
            <?php if(empty($_SESSION['admin'])):?>
                <li><a href="admin/login">Login</a></li>
            <?php else:?>
                <li class="alert alert-success text-center" role="alert">
                    Вы успешно авторизованы.
                </li>
                <li><a href="admin/logout">Logout</a></li>
            <?php endif?>
        </ul>
    </nav>


<?php echo $content; ?>

</body>
</html>