<?php
    // Подключение к базе данных 
    $db = new PDO('mysql:host=localhost;dbname=crm;charset=utf8', 'root', null, [ 
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
    ]);

    

?>