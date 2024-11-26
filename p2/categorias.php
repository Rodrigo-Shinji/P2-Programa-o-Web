<?php
session_start();
require_once('conexao.php');

$sql = "SELECT * FROM categorias";
$sistema_financeiro = mysqli_query($conn, $sql);

//$sql = "SELECT SUM(valor) AS total FROM categorias";
//$result = mysqli_query($conn, $sql);

//function ValorTotal($result) {
    //if ($result) {
      //  $val = mysqli_fetch_assoc($result);
       // return $val['total'];
    //} else {
    //    return 0;
    //}
//}

//$total = ValorTotal($result);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class ="card">
                    <div class="card-header">
                        <h4>Categorias
                            <a href="index.php" class="btn btn-danger float-end">Voltar</a>
                            <a href="adicionar-categoria.php" class="btn btn-primary float-end mr-1">Adicionar</a>
                        </h4>
                                <div class="mb-3">
                                <div class="card-body">
                            <?php include('mensagem.php'); ?>
                                <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Ações</th>
                                </tr>
                                <!-- fazer a soma de todos valores das categorias <h3>R$<?php echo number_format($total, 2, ',', '.'); ?></h3> -->
                            </thead>
                            <tbody>
                                <tr>
                                    <?php foreach ($sistema_financeiro as $sis_fin): ?>
                                        <td><?php echo $sis_fin['id_categoria']; ?></td>
                                        <td><?php echo $sis_fin['nome']; ?></td>
                                        <td>
                                        <a href="edit-categoria.php?id_categoria=<?=$sis_fin['id_categoria']?>" name="btn-add" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                                </form>
                                                <form action="acoes.php" method="POST" class="d-inline">
                                                    <button onclick="return confirm('Deseja excluir a categoria selecionada?')" name="excluir_cat" type="submit" value="<?=$sis_fin['id_categoria']?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                        </tr>
                                        <tr>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>