<?php

session_start();
require_once "../dbconfig/config.php";

if($_GET['id']){
    $id = $_GET['id'];
    if($id){
        $sql = "DELETE FROM clientes WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $_SESSION['msg'] = 'cliente excluido com sucesso';
            header("location: ../index.php");
        }
    }else{
        header("location: ../index.php");
    }
}else{
    header("location: ../index.php");
}