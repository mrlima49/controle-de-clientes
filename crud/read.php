<?php

require_once "./dbconfig/config.php";

$sql = "SELECT * FROM clientes";
$stmt = $pdo->prepare($sql);
$stmt->execute();

if($stmt->rowCount() > 0){
    $dados = $stmt->fetchAll();
}else{
    $mesangem = "<h3>Não existe usuários cadastrados</h3>";
}