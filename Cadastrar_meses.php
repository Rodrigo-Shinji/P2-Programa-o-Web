
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
            <div class="col-md-12">
                <div class ="card">
                    <div class="card-header">
                        <h4>
                            Cadastrar-mês
                            <a href="index.php" class="btn btn-primary float-end">Voltar</a>
                        </h4>
                            </div>
                        <div class="card-body">
                        <form action="acoes.php" method="POST">
                                <div class="mb-3">
                                <label for="txtnome">Mes</label>
                                <select name="nome_mes" id="nome_mes" class="forma-select">
                                <option value="janeiro">Janeiro</option>
                                <option value="fevereiro">Fevereiro</option>
                                <option value="marco">Março</option>
                                <option value="abril">Abril</option>
                                <option value="maio">Maio</option>
                                <option value="junho">Junho</option>
                                <option value="julho">Julho</option>
                                <option value="agosto">Agosto</option>
                                <option value="setembro">Setembro</option>
                                <option value="outubro">Outubro</option>
                                <option value="novembro">Novembro</option>
                                <option value="dezembro">Dezembro</option>
                                </select>
                                </div>

                                <div class="mb-3">
                                <label for="Ano" class="form-label">Ano</label>
                                <input type="number" min="1900" max="5000" step="1" value="2016"  name="txtAno" id="txtAno" class="form-control">
                                
                                </div>

                                <div class="mb-3">
                                <button type="submit" name="Cadastrar_mes"  class="btn btn-primary float-end">Salvar</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>