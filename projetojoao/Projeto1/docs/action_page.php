<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="login.js">
    <title>Blablaluno Login</title>
</head>

<body>
    <main class="container">
        <!--Classificação para responsividade-->
        <div class="row">
            <br>
            <div class="col-md-4">

                <h1>BláBlaluno
                    <!--Cabeçalho-->
                    <img src="https://static.thenounproject.com/png/293801-200.png" height="30px" alt="Carro de carona">
                    <a href="index.html" class="Home">
                        <button type="submit" class="home">Home</button></a>
                </h1>
                <h3 class="subtitulo">Bem Vindo ! </h3>
            </div>
</body>

</html>

<?php

// Conectar ao banco de dados (substitua com suas credenciais)
$host = "localhost";
$usuario = "root";
$senhaBanco = "383458";
$banco = "usuarios";

$conexao = new mysqli($host, $usuario, $senhaBanco, $banco); //conexão com o banco

// Verificar a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Coleta os dados do formulário
$nome = $_POST['nome'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$data_nascimento = $_POST['data_nascimento'];
$email = $_POST['email'];
$ponto_referencia = $_POST['ponto_referencia'];
$senha = $_POST['senha'];
$sexo = $_POST['sexo'];
$classificacao = $_POST['classificacao']; // adicionais selecionados carona e motorista

// Preparar a consulta SQL para inserir dados
$inserirDados = $conexao->prepare(" INSERT INTO usuarios (nome, endereco, cidade, data_nascimento, email, ponto_referencia, senha, sexo, classificacao) VALUES (?,?,?,?,?,?,?,?,?)");

// Vincular parâmetros
$inserirDados->bind_param("sssssssss", $nome, $endereco, $cidade, $data_nascimento, $email, $ponto_referencia, $senha, $sexo, $classificacao);

// Executar a consulta
if ($inserirDados->execute()) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . $conexao->error;
}

// Fechar a conexão e liberar recursos
$inserirDados->close();
$conexao->close();
?>