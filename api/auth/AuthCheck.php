<?php
function AuthCheck($successPath  = '', $errorPath  = '') {
    require_once 'api/db.php';
    require_once 'LogoutUser.php';
    if (!isset($_SESSION['token'])) {
        if($errorPath){
            header("Location: $errorPath");
        }
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
        LogoutUser( $errorPath,$db);
        header("Location: $errorPath");
         return;
     }
     if(!empty($adminID) && $successPath){
         header("Location: $successPath");
     }
   
}

?>