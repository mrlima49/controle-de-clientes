<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=controle_clientes', 'root', '');
}catch(PDOException $e){
    echo "Error: ".$e;
}