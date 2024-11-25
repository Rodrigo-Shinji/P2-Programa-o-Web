<?php
session_start();
require 'conexao.php';

//$sql = "SELECT * FROM meses"
//$meses = mysqli_query($conn, $sql);



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
                                <a href="adicionar-categoria.php" class="btn btn-primary float-end"><i class="bi bi-plus"></i></a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <?php include('mensagem.php'); ?>
                            <table class="table table-bordered table-striped">
                            <thead>
                                <td>
                                    <a href="categorias.php" class="btn btn-primary btn-sm"></i>CATEGORIAS</a>
                                    <a href="pasta_mes.php" class="btn btn-primary btn-sm"></i>MESES</a>
                                </td>
                                <td>
                                    <a href="adicionar-categoria.php" class="btn btn-primary btn-sm"></i>CRIAR CATEGORIAS</a>
                                    <a href="cadastrar_meses.php" class="btn btn-primary btn-sm"></i>CRIAR MESES</a>
                                </td>
                            </thead>
                        </table>
                        <div>
                            <tr>
                                <td>
                                <select id="meses" name="meses">
                                            <option value="Janeiro" class="btn btn-secondary btn-sm" <?= $moviment['meses'] == "Janeiro" ? 'selected' : ''?>>Janeiro</option>
                                            <option value="Fevereiro" class="btn btn-secondary btn-sm" <?= $moviment['meses'] == "Fevereiro" ? 'selected' : ''?>>Fevereiro</option>
                                            <option value="Março" class="btn btn-secondary btn-sm" <?= $moviment['meses'] == "Março" ? 'selected' : ''?>>Março</option>
                                            <option value="Abril" class="btn btn-secondary btn-sm" <?= $moviment['meses'] == "Abril" ? 'selected' : ''?>>Abril</option>
                                            <option value="Maio" class="btn btn-secondary btn-sm" <?= $moviment['meses'] == "Maio" ? 'selected' : ''?>>Maio</option>
                                            <option value="Junho" class="btn btn-secondary btn-sm" <?= $moviment['meses'] == "Junho" ? 'selected' : ''?>>Junho</option>
                                            <option value="Julho" class="btn btn-secondary btn-sm" <?= $moviment['meses'] == "Julho" ? 'selected' : ''?>>Julho</option>
                                            <option value="Agosto" class="btn btn-secondary btn-sm" <?= $moviment['meses'] == "Agosto" ? 'selected' : ''?>>Agosto</option>
                                            <option value="Setembro" class="btn btn-secondary btn-sm" <?= $moviment['meses'] == "Setembro" ? 'selected' : ''?>>Setembro</option>
                                            <option value="Outubro" class="btn btn-secondary btn-sm" <?= $moviment['meses'] == "Outubro" ? 'selected' : ''?>>Outubro</option>
                                            <option value="Novembro" class="btn btn-secondary btn-sm" <?= $moviment['meses'] == "Novembro" ? 'selected' : ''?>>Novembro</option>
                                            <option value="Dezembro" class="btn btn-secondary btn-sm" <?= $moviment['meses'] == "Dezembro" ? 'selected' : ''?>>Dezembro</option>
                                        </select>
                                </td>
                            </tr>
                            <div class="row">
                        <?php foreach($meses as $mes): ?>
                            <!-- Container com as "pastas" dos meses -->
                                        <div class="col-md-3 mb-3">
                                            <div class="card text-center">
                                                    <div class="card-body" class="mb-3">
                                                        <div class="card-header">
                                                        <h5 class="card-title"><?php echo ($mes['nome']); ?></h5>
                                                        </div>
                                                        <div class="d-flex justify-content-start align-items-end">
                                                        <p class="card-text"><?php echo ($mes['ano']); ?></p>
                                                        </div>
                                                        <div class="float-end">
                                                        <a href="pasta_mes.php" class="btn btn-dark"><i class="bi bi-card-text"></i></i></a>
                                                        <form action="acoes.php" method="POST" class="d-inline">
                                                        <button onclick="return confirm('Tem certeza que deseja excluir?')" name="deletar" type="submit" value="<?=$mes['id_meses']?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                                        </form>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                 <?php  endforeach;  ?>
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