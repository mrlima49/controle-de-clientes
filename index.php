<?php

session_start();
require_once "./crud/read.php";

if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    session_unset();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controle de Clientes</title>
    <style>
        table{
            border-collapse: collapse;
            text-align: center;
        }

        table td, th{
            height: 30px;
        }

    </style>
</head>
<body>
    <h1>Controle de clientes</h1>
    <a href="addcliente.php"><button>Adicionar Cliente</button></a>
    <hr>
    <?php if(isset($msg)):?>
        <strong><?= $msg; ?></strong>
    <?endif;?>
    <h2>Clientes</h2>
    <table width='700' border="1">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dados as $dado): ?>
            <tr>
                <td><?= $dado['nome']; ?></td>
                <td><?= $dado['email']; ?></td>
                <td><a href="update.php?id=<?= $dado['id'] ?>">Editar</a> <a href="crud/delete.php?id=<?= $dado['id'] ?>">Excluir</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>