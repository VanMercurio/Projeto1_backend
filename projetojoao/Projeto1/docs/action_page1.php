<?php

$pdo = new PDO('mysql:host=localhost;dbname=usuarios', 'root', '383458');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//Insert 
if (isset($_POST['nome'])) {
    $sql = $pdo->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?,?,?,?,?,?,?)");
    $sql->execute(array($_POST['nome'], $_POST['endereço'], $_POST['cidade'], $_POST['data_nascimento'], $_POST['email'], $_POST['ponto_referencia'], $_POST['senha'], $_POST['sexo'], $_POST['classificacao']));
    echo "Inserido com sucesso !";
}
