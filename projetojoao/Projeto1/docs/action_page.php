<?php
<<<<<<< HEAD
=======

// Coleta os dados do formulário
$nome = $_GET['name'];
$endereco = $_GET['adress'];
$cidade = $_GET['city'];
$data_nascimento = $$_GET['nasc'];
$email = $_GET['email'];
$ponto_referencia = $_GET['pontoref'];
$senha = $_GET['password'];
$sexo = $_GET['sexo'];
$classificacao = implode(', ', $_GET['adicionais']); // Selecione todos os adicionais selecionados

// Conectar ao banco de dados (substitua com suas credenciais)
$servername = "seu_servidor_mysql";
$username = "seu_usuario_mysql";
$password = "sua_senha_mysql";
$dbname = "seu_banco_de_dados";
>>>>>>> 42a4226f7abc87910ccb1659d6b7ac6e8c1dd58e

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

<<<<<<< HEAD
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
=======
// Inserir dados no banco de dados
$sql = "INSERT INTO tabela_usuarios (nome, endereco, cidade, ...) VALUES ('$nome', '$endereco', '$cidade', ...)";
>>>>>>> 42a4226f7abc87910ccb1659d6b7ac6e8c1dd58e

// Vincular parâmetros
$inserirDados->bind_param("ss", $nome, $endereco, $cidade, $data_nascimento, $email, $ponto_referencia, $senha, $sexo, $classificacao);

// Executar a consulta
if ($inserirDados->execute()) {
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dados: " . $conexao->error;
}

<<<<<<< HEAD
// Fechar a conexão e liberar recursos
$inserirDados->close();
$conexao->close();
=======
$conn->close();
>>>>>>> 42a4226f7abc87910ccb1659d6b7ac6e8c1dd58e
