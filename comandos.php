<?php
session_start();
require_once('conexao.php');


if (isset($_POST['Cadastrar_mes'])){
    $nome = trim($_POST['nome_mes']);
    $ano = trim($_POST['txtAno']);


    $sql = "INSERT INTO meses(nome, ano) VALUES('$nome', '$ano')";

    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit();
}

