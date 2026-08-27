<?php

include "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    $sql = "INSERT INTO clientes (nome, email, telefone) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $telefone);

    if ($stmt->execute()) {
        echo "Cliente cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar cliente! " . $stmt->error;
    }
    $stmt->close();
    exit();
}








$nome = $_POST["nome"];
$descrição = $_POST["descricao"];


$sql = "INSERT INTO animais (nome, descricao) VALUES (?, ?)";

$stmt = $conexao->prepare($sql);
$stmt->bind_param("ss", $nome, $descrição);
$stmt->execute();

header("Location: ./index.php");

?> 

!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Animais</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
   
        <form action="cadastro.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

             <label for="Telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" required>
            <br>

            <button type="submit">Cadastrar Cliente</button>
        </form>
        <button onclick="location.href='../index.php'">Voltar</button>