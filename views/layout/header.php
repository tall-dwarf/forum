<?php
    $token = null;
    if(isset($_COOKIE['token'])){
        $token = $_COOKIE;
    }
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<header>
    <nav>
        <ul>
            <li>
                <a href="/">Главная страница</a>
            </li>
            <li>
                <a href="/forum">Форум</a>
            </li>
            <?php if (!$token): ?>
                <li>
                    <a href="/auth">Авторизация</a>
                </li>
                <li>
                    <a href="/register">Регистраиция</a>
                </li>
            <?php else: ?>
            <li>
                <a href="/profile">Профиль</a>
            </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>