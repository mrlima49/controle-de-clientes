<?php 

require_once "./dbconfig/config.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    if($id){
        $sql = "SELECT * FROM clientes WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $dados = $stmt->fetch();
            $id = $dados['id'];
            $nome = $dados['nome'];
            $email = $dados['email'];
        }else{
            header("location: index.php");
        }
    }

}else{
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Cliente</title>
</head>
<body>
    <h1>Editar Clientes</h1>
    <form action="crud/update.php" method="POST">
        <p><input type="hidden" name="id" value="<?= $id; ?>"></p>
        <p><input type="text" name="nome" value="<?= $nome; ?>" autofocus></p>
        <p><input type="email" name="email" value="<?= $email; ?>" ></p>
        <p><button name="btn">Editar</button></p>
    </form>
</body>
</html>