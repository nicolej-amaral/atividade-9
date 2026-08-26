<?php

include "../infra/conexao.php";

$id = $_GET["id"];

$sql = "SELECT * FROM animais WHERE id = $id";

$resultado = mysqli_query($conexao, $sql);

$animal = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <div class="container5">
    <title>Editar Animal</title>
   <link rel="stylesheet" href="..style/style.css">
</head>

<body>

<h1>Editar Animal</h1>

<form action="atualizar.php" method="POST">

    <input type="hidden" name="id" value="<?php echo $animal["id"]; ?>">

    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo $animal["nome"]; ?>">

    <br>

    <label>Descrição:</label>
    <input type="text" name="descricao" value="<?php echo $animal["descricao"]; ?>">


    <button type="submit">Salvar</button>

</form>

</body>
</div>
</html>