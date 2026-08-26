<?php

include "../infra/conexao.php";

$nome = $_POST["nome"];
$descrição = $_POST["descricao"];


$sql = "INSERT INTO animais (nome, descricao) VALUES (?, ?)";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("ss", $nome, $descrição);
$stmt->execute();

header("Location: ../index.php");

?> 