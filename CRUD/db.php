<?php
$host = "localhost";
$usuario = "root";
$senha = "383458";
$banco = "usuarios";

$conexao = new mysqli($host, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    echo ("Falha na conexão: " . $conexao->connect_error);
}
