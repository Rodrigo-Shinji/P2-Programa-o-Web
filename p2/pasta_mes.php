<?php
session_start();
require_once('conexao.php');

$mesId = mysqli_real_escape_string($conn, $_GET['id_meses']);
echo $mesId;
$sql = "SELECT 
            mv.id_movimentacoes, 
            c.nome AS categoria,
            mv.description,
            m.nome,
            m.ano,
            mv.movement_type AS tipo,
            mv.amount,
            mv.movement_date 
        FROM movimentacoes mv
        INNER JOIN categorias c ON mv.category_id = c.id_categoria
        INNER JOIN meses m ON mv.month_id = m.id_meses
        WHERE mv.month_id = '$mesId'";

$movimentacoes = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <div>
                            <h4>Movimentações
                                <a href="index.php" class="btn btn-primary float-end">Voltar</a>
                                <a href="criar_movimentacoes.php?id_meses=<?=$mesId?>" class="btn btn-dark"><i class="bi bi-file-earmark-plus-fill"></i></i></a>
                                <table class="table table-hover table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Id</th>
                                    <th>Categoria</th>
                                    <th>Descrição</th>
                                    <th>Mês</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                    <th>Transação</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($movimentacoes as $mov): ?>
                                    <tr>
                                        <td><?php echo $mov['id_movimentacoes']; ?></td>
                                        <td><?php echo $mov['categoria']; ?></td>
                                        <td><?php echo $mov['description']; ?></td>
                                        <td><?php echo $mov['nome']; ?></td>
                                        <td><?php echo $mov['movement_date']; ?></td>
                                        <td><?php echo $mov['amount']; ?></td>
                                        <td><?php echo $mov['tipo']; ?></td>
                                        <td>
                                            <a href="editar_movimentacoes.php?id=<?= $mov['id_movimentacoes'] ?>" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                            <form action="acoes.php" method="POST" class="d-inline">
                                                <input type="hidden" name="deletar_mov" value="<?=$mesId?>">
                                                <button onclick="return confirm('Tem certeza que deseja excluir?')" name="deletar_mov" type="submit" value="<?= $mov['id_movimentacoes'] ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                            </h4>
                        </div>
                    </div>
                        <div class="card-body">
                        <?php include('mensagem.php'); ?>
                        </div>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>