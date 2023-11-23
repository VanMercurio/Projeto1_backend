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
    echo "Dados inseridos com sucesso!\n\n";
} else {
    echo "Erro ao inserir dados: " . $conexao->error;
}

// Fechar a conexão e liberar recursos
$inserirDados->close();
$conexao->close();
