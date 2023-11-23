<?php
// Conectar ao banco de dados (substitua com suas credenciais)
$host = "localhost";
$usuario = "root";
$senha = "383458";
$banco = "usuarios";

$conexao = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber o ponto de referência do formulário
    $ponto_referencia = $_POST["ponto_referencia"];

    // Preparar a consulta SQL para buscar alunos com base no ponto de referência
    $buscarAlunos = $conexao->prepare("SELECT * FROM usuarios WHERE ponto_referencia = ?");

    // Vincular o parâmetro
    $buscarAlunos->bind_param("s", $ponto_referencia);

    // Executar a consulta
    $buscarAlunos->execute();

    // Obter resultados
    $result = $buscarAlunos->get_result();

    // Exibir os resultados
    echo "<h3>Alunos Encontrados:</h3>";
    while ($row = $result->fetch_assoc()) {
        echo "<p>{$row['nome']} - {$row['endereco']}, {$row['cidade']}</p>";
    }

    // Fechar a conexão e liberar recursos
    $buscarAlunos->close();
    $conexao->close();
}
