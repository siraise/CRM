<?php session_start();
// vhod po loginu admina
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    require_once '../db.php';
// ЕСли юзернаме есть записываем юзернаме тначе пустая строка
$login = isset($_POST['username']) ? $_POST['username'] :'';
// ЕСли пассворд есть записываем пассворд тначе пустая строка
$password = isset($_POST['password']) ? $_POST['password'] :'';
// Переменная ошибок
$errors =[];
$_SESSION ['login-errors'] = [];
$_SESSION ['password-errors'] = [];

if(!$login){
    $_SESSION['login-errors']['login'] ='Fiel is required';
}
if(!$password){
    $_SESSION['login-errors']['password'] ='Fiel is required';
}
if(!$login || !$password){
    header('Location: ../../login.php');
    exit;
}

// функция для фильтрации данных
function clearData($input){
   $cleaned = strip_tags($input);
   $cleaned = trim($cleaned);
   $cleaned = preg_replace('/\s+/','',$cleaned);
   return $cleaned;

}
$login = clearData($login);
$password = clearData($password);

// Проверка логина
// Сделать запрос  в бд по логину($login)
// Если пустой - записываем ошибку + редирект на логин 
// Проверка пароля
$UserID = $db -> query(
    "SELECT id FROM users WHERE login = '$login'"
)->fetchAll();
// Пользователя нет ошибка выход на страницу
if(empty($UserID)){
    $_SESSION['login-errors']['login'] = 'User nod found';
    header('Location: ../../login.php');
    exit;
 }
//  пaроль проверка
$UserID = $db -> query(
    "SELECT id FROM users WHERE login = '$login' AND  password = '$password'"
)->fetchAll();
if(empty($UserID)){
    $_SESSION['login-errors']['password'] = 'Wrong password';
    header('Location: ../../login.php');
    exit;
}
 $uniquerString = time();
 $token = base64_encode(
    "login = $login&password=$password&unique=$uniquerString"
 );
 //ЗАписать в сессию в поле token//  записать в бд в поле токин
$_SESSION['token'] = $token;
$db->query
("UPDATE users SET token = '$token'
WHERE login = '$login' AND password = '$password'
")->fetchAll();
    // Редирект на страницу после успешного входа
    header('Location: ../../clients.php');
}else{
    echo json_encode([
        "error"=> 'NOT'
    ]);
}
?>