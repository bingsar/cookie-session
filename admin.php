<?php
require_once 'functions.php';

if (isset($_SESSION['user']['username']) && $_SESSION['user']['username'] == 'Администратор') {
    

} else {
    header('Location: index.php');
    die;
}

if (!empty($_FILES) || array_key_exists('test', $_FILES)) {
    $testUpload = 'tests' . DIRECTORY_SEPARATOR . $_FILES['test']['name'];
    move_uploaded_file($_FILES['test']['tmp_name'], $testUpload);
    header('Location: list.php',true, 301);
}

?>

<!doctype html>
<html lang="en">
<head>

     <meta charset="UTF-8\r\n">
     <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Тест</title>
</head>
<body>
<br>
<form action="admin.php" method="POST" enctype="multipart/form-data">
    <div>Загрузите JSON файл</div><br>

    <input type="file" name="test">

    <input type="submit" value="Загрузить">
</form>
<br><hr>
<a href="list.php">Перейти к списку загруженных файлов</a>
<ul>
    <li><a class="btn btn-success" href="logout.php">Выход</a> </li>
</ul>
</body>
</html>