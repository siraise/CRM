<?php
 $_SESSION['token'] = '123456789';
function AuthCheck($successPath  = '', $errorPath  = '') {
    require_once 'db.php';
    if (!isset($_SESSION['token']) && $errorPath) {
        header("Location: $errorPath");
        return; 
    }
    // токен текущего пользователя
    $token = $_SESSION['token'];
    $admin;
    //  По текущему токену получить пользователя из бд
    // Записать в переменную $admin
    $token = $_SESSION['token'];

    $adminID = $db -> query(
        "SELECT id FROM users WHERE token = '$token'"
    )->fetchAll();
     if(empty($adminID) && $errorPath){
        header("Location: $errorPath");
         return;
     }
     if(!empty($adminID) && $successPath){
         header("Location: $successPath");
     }
   
}

?>