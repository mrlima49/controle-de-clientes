<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Clientes</title>
</head>
<body>
    <h1>Adicionar Clientes</h1>
    <form action="crud/create.php" method="POST">
        <p><input type="text" name="nome" placeholder="Nome" autofocus></p>
        <p><input type="email" name="email" placeholder="Email"></p>
        <p><button name="btn">Cadastrar</button></p>
    </form>
</body>
</html>