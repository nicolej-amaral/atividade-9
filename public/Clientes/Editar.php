<?php

include "../infra/conexao.php";

$id = $_GET["id"];

$sql = "SELECT * FROM clientes WHERE id = $id";

$resultado = mysqli_query($conexao, $sql);

$cliente = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <div class="container5">
    <title>Editar Cliente</title>
   <link rel="stylesheet" href="..style/style.css">
</head>

<body>

<h1>Editar Cliente</h1>

<form action="atualizar.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $cliente["id"]; ?>">

    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo $cliente["nome"]; ?>">

    <br>

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo $cliente["email"]; ?>">

    <br>

    <label>Telefone:</label>
    <input type="text" name="telefone" value="<?php echo $cliente["telefone"]; ?>">

    <br>


    <button type="submit">Salvar</button>

</form>

</body>
</div>
</html>