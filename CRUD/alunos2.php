<?php

$host = "localhost";
$usuario = "root";
$senhaBanco = "383458";
$banco = "usuarios";

$conexao = new mysqli($host, $usuario, $senhaBanco, $banco);

if ($conexao->connect_error) {
    echo ("Falha na conexão: " . $conexao->connect_error);
}

/* COMANDO PARA ATUALIZAR */
if (isset($_POST['nome_atualizado'], $_POST['id_para_atualizar'])) {
    $novo_nome = $_POST['nome_atualizado'];
    $id_atualizar = (int)$_POST['id_para_atualizar'];

    $conexao->query("UPDATE usuarios SET nome='$novo_nome' WHERE id=$id_atualizar");

    echo "<strong>Atualizado com sucesso o id :</strong>" . $id_atualizar;
}
?>


<!-- cod HTML para inserção de campos -->
<p><strong>Atualizar cadastro</strong> </p>
<form method="post">

    <label for="id_para_atualizar">ID do Usuário para Atualizar:</label>
    <input type="text" name="id_para_atualizar" id="id_para_atualizar">

    <label for="nome_atualizado">Novo Nome:</label>
    <input type="text" name="nome_atualizado" id="nome_atualizado">

    <input type="submit" value="Atualizar">
</form>
<p>***************************************************************************************</p>
<p><strong>Deletar Usuário</strong></p>

<!-- Término do cod HTML para inserção de campos -->

<?php
if (isset($_GET['delete'])) {
    $id = (int)$_GET['delete'];
    $conexao->query("DELETE FROM usuarios WHERE id=$id");
    echo "<b>Deletado com sucesso o id : </b>" . $id . "<br><br>";
}

if (isset($_POST['nome'])) {
    $sql = $conexao->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?,?,?,?,?,?)");
    $sql->bind_param("sssssssss", $_POST['nome'], $_POST['endereco'], $_POST['cidade'], $_POST['data_nascimento'], $_POST['email'], $_POST['ponto_referencia'], $_POST['senha'], $_POST['sexo'], $_POST['classificacao']);
    $sql->execute();
    echo "Inserido com sucesso!";
}
// Fechar a conexão e liberar recursos


?>
<!-- cod HTML para inserção de campos para incluir dados -->
<p>***************************************************************************************</p>
<p><strong>Incluir dados</strong></p>

<form method="post">

    <label for=nome>Nome</label>
    <input type="text" name="nome" id="nome">

    <label for=endereco>Endereço</label>
    <input type="text" name="endereco" id="endereco">

    <label for=cidade>Cidade</label>
    <input type="text" name="cidade" id="cidade">

    <label for=data_nascimento>Data de Nasc</label>
    <input type="date" name="data_nascimento" id="data_nascimento">

    <label for=email>email</label>
    <input type="email" name="email" id="email"><br><br>

    <label for=ponto_referencia>Ponto de referência</label>
    <input type="text" name="ponto_referencia" id="ponto_referencia">

    <label for=senha>Senha</label>
    <input type="password" name="senha" id="senha" minlength="6" maxlength="6"><br>

    <p><strong>Sexo</strong></p>
    <label for=sexo>Masculino</label>
    <input type="checkbox" name="sexo" id="sexo" value="Masculino">
    <label for=sexo>Feminino</label>
    <input type="checkbox" name="sexo" id="sexo" value="Feminino">
    <label for=sexo>Outros</label>
    <input type="checkbox" name="sexo" id="sexo" value="Outros"><br>

    <p><strong>Classificação</strong></p>
    <label for=classificacao>Carona</label>
    <input type="checkbox" name="classificacao" id="classificacao" value="Carona">
    <label for=classificacao>Motorista</label>
    <input type="checkbox" name="classificacao" id="classificacao" value="Motorista"><br><br>

    <input type="submit" value="Incluir">

</form>



<?php
$sql = $conexao->prepare("SELECT * FROM usuarios");
$sql->execute();

$result = $sql->get_result();

while ($value = $result->fetch_assoc()) {
    echo '<a href="?delete=' . $value['id'] . '">(x)</a>' . $value['id'] . '|' . $value['nome'] . ' | ' . $value['endereco'] . ' | ' . $value['cidade'] . ' | ' . $value['data_nascimento'] . ' | ' . $value['email'] . ' | ' . $value['ponto_referencia'] . ' | ' . $value['senha'] . ' | ' . $value['sexo'] . ' | ' . $value['classificacao'];
    echo '<br>';
}

$sql->close();
$conexao->close();