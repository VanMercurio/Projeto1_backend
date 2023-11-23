<?php

// Conectar ao banco de dados (substitua com suas credenciais)
$host = "localhost/projetojoao/Projeto1/docs/";
$usuario = "root";
$senha = "383458";
$banco = "usuarios";

$conexao = new mysqli($host, $usuario, $senha, $banco); //conexão com o banco

// Verificar a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Coleta os dados do formulário
$nome = $_GET['name'];
$endereco = $_GET['adress'];
$cidade = $_GET['city'];
$data_nascimento = $$_GET['nasc'];
$email = $_GET['email'];
$ponto_referencia = $_GET['pontoref'];
$senha = $_GET['password'];
$sexo = $_GET['sexo'];
$classificacao = implode('motorista, carona', $_GET['adicionais']); // adicionais selecionados carona e motorista

// Preparar a consulta SQL para inserir dados
$inserirDados = $conexao->prepare(" INSERT INTO usuarios (id, nome, endereco, cidade, data_nascimento, email, ponto_referencia, senha, sexo, classificacao) VALUES (?, ?)");

// Vincular parâmetros
$inserirDados->bind_param("ss", $nome, $endereco, $cidade, $data_nascimento, $email, $ponto_referencia, $senha, $sexo, $classificacao);

// Executar a consulta
if ($inserirDados->execute()) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . $conexao->error;
}

// Fechar a conexão e liberar recursos
$inserirDados->close();
$conexao->close();
