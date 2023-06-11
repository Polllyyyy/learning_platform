<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="Logo/mortarboard.gif">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Регистрация</title>
</head>

<body>
    <?php
    require('connect.php');
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $query = "INSERT INTO `users` (`id`,`username`, `email`, `pass`) VALUES (NULL,'$username','$email', '$pass')";
        $result = mysqli_query($connection, $query) or trigger_error(mysqli_error($connection) . $query);

        if ($result) {
            $smsg = "Регистрация прошла успешно";
        } else {
            $fsmsg = "Ошибка";
        }
    }
    ?>

    <div class="container">
        <form class="form-signin" method="POST">
            <h2>Регистрация</h2>
            <?php if (isset($smsg)) { ?><div class="alert alert-success" role="alert"> <?php echo $smsg; ?></div><?php } ?>
            <?php if (isset($fsmsg)) { ?><div class="alert alert-danger" role="alert"><?php echo $fsmsg; ?></div><?php }
                                                                                                                unset($fsmsg); // удаляет переменные, чтобы после обновления сообщение не появлялось вновь
                                                                                                                unset($smsg) ?>
            <input type="text" name="username" class="form-control" placeholder="ФИО" required>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="password" name="password" class="form-control" placeholder="Пароль" required>
            <div class="btn"><button class="btn btn-lg btn-primary btn-block" type="submit">Зарегистрироваться</button></div>
        </form>
    </div>
</body>

</html>