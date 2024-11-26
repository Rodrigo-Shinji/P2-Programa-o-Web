<?php
session_start();
require_once('conexao.php');

$sql = "SELECT *FROM movimentacoes";
$movimentacoes = mysqli_query($conn, $sql);


$mesID = mysqli_real_escape_string($conn, $_GET['id_meses']);
$sql = "SELECT * FROM movimentacoes mv INNER JOIN meses m on m.id_meses = mv.month_id where m.id_meses = $mesID";



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
                                <a href="criar_movimentacoes.php" class="btn btn-dark"><i class="bi bi-file-earmark-plus-fill"></i></i></a>
                                
                            </h4>
                        </div>
                    </div>

                        <div class="card-body">
                        <?php include('mensagem.php'); ?>
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Data</th>
                                    <th>Tipo</th>
                                    <th>Descrição</th>
                                    <th>Valor</th>
                                    <th>Ações</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($movimentacoes as $moviment): ?>
                                    <tr>
                                        <td><?php echo $moviment['id_movimentacoes'];?></td>
                                        <td><?php echo date('d/m/Y', strtotime($moviment['movement_date']))?></td>
                                        <td><?php echo $moviment['movement_type'];?></td>
                                        <td style="max-width: 125px; line-break: auto;"><?php echo $moviment['description'];?></td>
                                        <td><?php echo $moviment['amount'];?></td>
                                        <td>
                                        <a href="edit-movimentacoes.php?id_movimentacoes=<?=$moviment['id_movimentacoes']?>" name="btn-add" class="btn btn-secondary btn-sm"><i class="bi bi-pencil-fill"></i></a>
                                            <form action="acoes.php" method="POST" class="d-inline">
                                                        <button onclick="return confirm('Tem certeza que deseja excluir?')" name="deletar_mov" type="submit" value="<?=$moviment['id_movimentacoes']?>" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>