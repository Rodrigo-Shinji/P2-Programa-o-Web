<?php
session_start();
require_once('conexao.php');


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
                                <h4>Categorias
                                <a href="categorias.php"><i class="bi bi-plus-square float-end"></i></a>
                                </h4>
                            </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-4">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                            <div>
                                <h4>Meses
                                <a href="Cadastrar_meses.php"><i class="bi bi-plus-square float-end"></i></a>
                                </h4>
                            </div>
                        </div class="card-body">
                        <?php include('mensagens.php'); ?>
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
