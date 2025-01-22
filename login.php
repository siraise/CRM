<?php session_start();
require_once 'api/auth/AuthCheck.php';
AuthCheck('clients.php');
// вывод ошибки для пароля 
// Покрасить ошибки в красныый цвет
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM | Авторизация</title>
    <link rel="stylesheet" href="styles/settings.css">
    <link rel="stylesheet" href="styles/pages/login.css">
</head>
<body>
    <div class="container">
        <form action="api/auth/AuthUser.php"  method="POST"
        
        class="login-form">
            <h2>Вход в систему</h2>
            <div class="form-group">
                <label for="username">Логин:</label>
                <input type="text" id="username" name="username">
                <p class="error" style = "color:red">
                    <?php
                    if(isset($_SESSION['login-errors'])){
                        $errors = $_SESSION['login-errors'];
                        echo isset($errors['login']) ? $errors['login'] : '';
                    }
                    ?>
                </p>
            </div>
            <div class="form-group">
                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password">
                <p class="error" style = "color:red">
                    <?php
                    if(isset($_SESSION['login-errors'])){
                        $errors = $_SESSION['login-errors'];
                        echo isset($errors['password']) ? $errors['password'] : '';
                    }

                    ?>
                </p>
            </div>
            <button type="submit">Войти</button>
        </form>
    </div>
</body>
</html>
