<?php

include "infra/conexao.php";

$nome = $_POST["nome"];
$email = $_POST["email"];
$telefone = $_POST["telefone"];

$sql = "INSERT INTO clientes (nome, email, telefone)
        VALUES ('$nome', '$email', '$telefone')";

mysqli_query($conexao, $sql);

header("Location: ../index.php");

?>