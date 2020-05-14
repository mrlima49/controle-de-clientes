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

    $nome = clear(filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING));
    $email = clear(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

    if($nome && $email){
        $sql = "INSERT INTO clientes (nome, email) VALUES(?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $nome);
        $stmt->bindValue(2, $email);
        $stmt->execute();

        if($stmt->rowCount() > 0){
            $_SESSION['msg'] = "cliente cadastrado com sucesso";
            header("location: ../index.php");
        }else{
            $_SESSION['msg'] = 'hove um erro no cadastro do cliente';
            header("location: ../addcliente.php");
        }

    }else{
        $_SESSION['msg'] = 'preencha todos os campos';
        header("location: ../addcliente.php");
    }


}else{
    $_SESSION['msg'] = 'preencha todos os campos';
    header("location: ../addcliente.php");
}