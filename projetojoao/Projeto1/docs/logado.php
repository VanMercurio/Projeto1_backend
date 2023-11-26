<?php
if (isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once('db.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Preparar a instrução SQL usando instruções preparadas para evitar SQL injection
    $sql = "SELECT * FROM usuarios WHERE email = ? AND senha = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ss", $email, $senha);
    $stmt->execute();

    // Obter o resultado da consulta
    $result = $stmt->get_result();

    // Obter o número de linhas retornadas
    $numRows = $result->num_rows;

    // Imprimir o número de linhas
    //echo "Número de linhas encontradas: " . $numRows;

    // Verificar o número de linhas retornadas
    if ($numRows > 0) {
        // Usuário autenticado com sucesso
        echo "Bem-vindo!";
    } else {
        // Credenciais incorretas
        echo "Usuário ou senha incorretos.";
    }

    $stmt->close();
} else {
    header("Location: index.html");
    exit(); // Certifique-se de encerrar o script após redirecionar
}

$conexao->close();
