<?php
session_start();
require 'conexao.php';

$sql = "SELECT * FROM meses";
$meses = mysqli_query($conn, $sql);

$sql_amount_meses = "SELECT 
                        m.id_meses AS monthId,
                        COALESCE(SUM(CASE WHEN mv.movement_type = 'Entrada' THEN mv.amount ELSE 0 END), 0) 
                        - COALESCE(SUM(CASE WHEN mv.movement_type = 'Saída' THEN mv.amount ELSE 0 END), 0) AS amount
                    FROM meses m
                    INNER JOIN movimentacoes mv ON mv.month_id = m.id_meses
                    GROUP BY m.id_meses;";

$amount_meses = mysqli_query($conn, $sql_amount_meses);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Finanças</title>
    <link rel="stylesheet" href="pagina_principal.css">
    <link rel="shortcut icon" href="/favicon/money.ico" type="icone">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>
                            Gerenciamento de Finanças <i class="bi bi-bar-chart-fill"></i>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php include('mensagem.php'); ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <td>
                                    <a href="categorias.php" class="btn btn-primary btn-sm"></i>CATEGORIAS</a>
                                    <a href="cadastrar_meses.php" class="btn btn-primary btn-sm"></i>CRIAR MESES</a>
                                </td>
                            </thead>
                        </table>
                        <div class="container mt-4">
                            <div class="row">
                                <div class="col-md">
                                    <div class="card">
                                        <div class="card-header">
                                            <div>
                                                <h4>Meses
                                                </h4>
                                            </div>
                                        </div class="card-body">
                                        <?php include('mensagem.php'); ?>
                                        <div class="row">
                                            <?php foreach ($meses as $mes): ?>
                                                <!-- Container com as "pastas" dos meses -->
                                                <div class="col-md-3 mb-3">
                                                    <div class="card text-center">
                                                        <div class="card-body" class="mb-3">
                                                            <div class="card-header">
                                                                <h5 class="card-title"><?php echo ($mes['nome']); ?></h5>
                                                                <?php foreach ($amount_meses as $amount):
                                                    if ($amount['monthId'] == $mes['id_meses']) {
                                                        if ($amount['amount'] > 0) {
                                                            echo "<h5 class='text-success' style='height: fit-content; margin: 0;'>R$ " . number_format($amount['amount'], 2) . "</h5>";
                                                        } else if ($amount['amount'] < 0) {
                                                            echo "<h5 class='text-danger' style='height: fit-content; margin: 0;'>R$ " . number_format($amount['amount'], 2) . "</h5>";
                                                        } else {
                                                            echo "<h5 class='text-warning' style='height: fit-content; margin: 0;'>R$ 0.00</h5>";
                                                        }
                                                    }
                                                endforeach ?>
                                                            </div>
                                                            <div class="d-flex justify-content-start align-items-end">
                                                                <p class="card-text"><?php echo ($mes['ano']); ?></p>
                                                            </div>
                                                            <div class="float-end">
                                                            <a href="pasta_mes.php?id_meses=<?=$mes['id_meses']?>" class="btn btn-dark"><i class="bi bi-card-text"></i></i></a>
                                                                <form action="acoes.php" method="POST" class="d-inline">
                                                                    <button onclick="return confirm('Tem certeza que deseja excluir?')" name="deletar" type="submit" value="<?= $movimentacao['id_meses'] ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach;  ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>