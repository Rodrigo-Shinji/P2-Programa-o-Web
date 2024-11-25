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


session_start();
require_once('conexao.php');

//Lógica para criação do mês nome de ano do mês//
if (isset($_POST['Cadastrar_mes'])){
    $nome = trim($_POST['nome_mes']);
    $ano = trim($_POST['txtAno']);


    $sql = "INSERT INTO meses(nome, ano) VALUES('$nome', '$ano')";

    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit();
}

//If para deletar a pasta criada do mês//
if (isset($_POST['deletar'])) {
    $mesId = mysqli_real_escape_string($conn, $_POST['deletar']);
    $sql = "DELETE FROM meses WHERE id_meses = '$mesId'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "{$mesId}";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível excluir";
        $_SESSION['type'] = 'error';
    }

    header('Location: index.php');
    exit;
}


// if para salvar as as informações na tabela movimentações 
if (isset($_POST['criar_movimentacoes'])) {

    $data = trim($_POST['txtData']);
    $tipo = trim($_POST['txttipo']);
    $descricao= trim($_POST['txtDescricao']);
    $valor = trim($_POST['txtValor']);
    

    $sql = "INSERT INTO movimentacoes (movement_date, movement_type, description, amount) VALUES('$data', '$tipo', '$descricao', '$valor')";

    mysqli_query($conn, $sql);

    header('Location: index.php');
    exit();
}



if (isset($_POST['editar_movimentacoes'])){
    $movID= mysqli_real_escape_string($conn, $_POST['mov_id']);
    $data = mysqli_real_escape_string($conn, $_POST['txtData']);
    $tipo = mysqli_real_escape_string($conn, $_POST['txttipo']);
    $descricao= mysqli_real_escape_string($conn, $_POST['txtDescricao']);
    $valor = mysqli_real_escape_string($conn, $_POST['txtValor']);

    $sql = "UPDATE movimentacoes SET movement_date = '{$data}', movement_type = '{$tipo}', description = '{$descricao}', amount = '{$valor}'";

    $sql .= "WHERE id_movimentacoes = '{$movID}'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Categoria alterada com sucesso!";
        $_SESSION['message'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível alterar a categoria!";
        $_SESSION['type'] = 'error';
    }

    header('Location: pasta_mes.php');
    exit;
}

if (isset($_POST['deletar_mov'])){
    $movID = mysqli_real_escape_string($conn, $_POST['deletar_mov']);
    $sql = "DELETE FROM movimentacoes WHERE id_movimentacoes = '$movID'";

    mysqli_query($conn, $sql);

    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['message'] = "Tarefa excluído com sucesso!";
        $_SESSION['type'] = 'success';
    } else {
        $_SESSION['message'] = "Não foi possível excluir a tarefa!";
        $_SESSION['type'] = 'error';
    }

    header('Location: pasta_mes.php');
    exit;
}
?>
