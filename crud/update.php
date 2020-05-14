<?php

session_start();
require_once "../dbconfig/config.php";

function clear($input){
    $inputText = htmlspecialchars($input);
    $inputText = trim($inputText);
    $inputText = strtolower($inputText);
    return $inputText;
}

if(isset($_POST['btn'])){
    $id = clear(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING));
    $nome = clear(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $email = clear(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    if($id && $nome && $email){
        $sql = "UPDATE clientes SET nome = ?, email = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $id);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $_SESSION['msg'] = "cliente editado com sucesso";
            header("location: ../index.php");
        }

    }else{
        $_SESSION['msg'] = 'campos não podem ser enviado vazios';
        header("location: ../update.php");
    }

}else{
    header("location: ../index.php");
}