<?php
function ClientsSearch($params,$db){
    $search = isset($params['search']) ? $params['search'] : '';
    $sort = isset($params['sort']) ? $params['sort'] : '';

   
    if($sort){
        $sort = "ORDER BY id $sort";
    }

    $search = trim(strtolower($search));

    $clients = $db -> query(
    "SELECT * FROM clients WHERE LOWER(name) LIKE '%$search%' $sort
    ") ->fetchAll();

return $clients;
}

?>