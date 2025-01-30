<?php session_start();
 require_once '../db.php';
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $formData = $_POST;
    $fields = ['full-name','email','phone','birthday'];
    $errors = [];

    $_SESSION['clients-errors'] = '';
    // проверить пришли ли данные
    foreach($fields as $key => $field){
        if(!isset($_POST[$field]) || empty($_POST[$field])){
            $errors[$field][] = 'Field is required';
        }
    }
     
    if (!empty($errors)){
        $result ='';
        foreach($errors as $key => $error){
            $to_string = implode(',' , $error);
            $result = $result . "<li>$key : $to_string</li>";
        }
        $result = $result . '';
        $_SESSION['clients-errors'] = $result;
        header('Location: ../../clients.php');
        exit;    
    }
// функция для фильтрации данных
function clearData($input){
    $cleaned = strip_tags($input);
    $cleaned = trim($cleaned);
    $cleaned = preg_replace('/\s+/',' ',$cleaned);
    return $cleaned;
 
 }
    // Фильтрация данных
    foreach($formData as $key => $value) {
        $formData[$key] = clearData($value);
    }

    // Перезаписать почищенные данные
    echo json_encode($formData);
 $phone = $formData['phone'];
    // Проверить есть ли такой клиент (здесь должна быть ваша логика проверки)
    $existingClient = $db->query(
        "SELECT id FROM clients WHERE phone = '$phone'"
    )->fetchAll();

    if (!empty($existingClient)) {
        $_SESSION['clients_errors'] = '<div style="color: #842029; background-color: #f8d7da; border: 1px solid #f5c2c7; border-radius: 5px; padding: 15px; margin: 10px 0;">
            <h4 style="margin: 0;">Клиент с таким номером телефона уже существует</h4>
            <h4 style="margin: 0;">Клиент уже существует в базе данных</h4>
        </div>';
        header('Location: ../../clients.php');
        exit();
    }
    
    // 4. Записать клиента
    $UserId = $existingClient[0]['id'] ?? null;
    
    // 1. Если userID не пустой, записываем ошибку
    // if ($UserId) {
    //     $_SESSION['clients_errors'] = '<div style="color: #842029; background-color: #f8d7da; border: 1px solid #f5c2c7; border-radius: 5px; padding: 15px; margin: 10px 0;">
            
    //     </div>';
    //     header('Location: ../../clients.php');
    //     exit();
    // }

    // 2. Записать $formData в бд (без id и created_at)
    $sql = "INSERT INTO clients (name, email, phone, birthday) 
            VALUES (?, ?, ?, ?)";
    
    $stmt = $db->prepare($sql);
    $stmt->execute([
        $formData['full-name'],
         $formData['email'],
          $formData['phone'],
        $formData['birthday'],
    ]);

    header('Location: ../../clients.php');
    exit();
}else {
    echo json_encode([
        "error" => 'НЕВЕРНЫЙ ЗАПРОС'
    ]);
}