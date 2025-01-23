<?php
function logoutUser($redirect,$db,$token = ''){
    unset($_SESSION['token']);
    if($token){
           //Очистить токен пользоваелю у которого 
    //  login=$login and password = $password
        $db->query
        ("UPDATE users SET token = NULL
        WHERE token = '$token'
        ")->fetchAll();
        }
        header("Location: $redirect");
    }
    
   
?>