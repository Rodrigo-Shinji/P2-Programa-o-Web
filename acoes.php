<?php
session_start();
require_once('conexao.php');

if (isset($_POST['create_categoria'])){
    $nome = trim($_POST['txtNome']);

$sql ="INSERT INTO categorias (nome) VALUES ('$nome')";

mysqli_query($conn, $sql);

header('Location: categorias.php');
exit();
}

if (isset($_POST['edit_categoria'])){
    $catID = mysqli_real_escape_string($conn, $_POST['cat_id']);
    $nome = mysqli_real_escape_string($conn, $_POST['txtNome']);

    $sql = "UPDATE categorias SET nome ='{$nome}'";

    $sql .= "WHERE id_categoria = '{$catID}'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Categoria alterada com sucesso!";
        $_SESSION['message'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível alterar a categoria!";
        $_SESSION['type'] = 'error';
    }

    header('Location: categorias.php');
    exit;
}

if (isset($_POST['excluir_cat'])){
    $catID = mysqli_real_escape_string($conn, $_POST['excluir_cat']);
    $sql = "DELETE FROM categorias WHERE id_categoria = '$catID'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Tarefa excluído com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível excluir a tarefa!";
        $_SESSION['type'] = 'error';
    }

    header('Location: categorias.php');
    exit;
}

?>