<?php

$host = "localhost";
$user = "root";
$pass = "root";
$db_name = "atividade_09";


$conexao = new mysqli($host, $user, $pass, $db_name, $port);

if ($conexao->connect_error) {
    die("Erro na conexão com o banco: " . $conexao->connect_error);
}

$conexao->set_charset("utf8mb4");

?>