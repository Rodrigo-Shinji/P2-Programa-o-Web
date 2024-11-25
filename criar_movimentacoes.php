<?php
session_start();

function transformarMeses($meses) {
    if ($meses == 1) {
        return "Janeiro";
}
    if ($meses == 2) {
        return "Feveiro";
    }
    if ($meses == 3) {
        return "Março";
    }
    if ($meses == 4) {
        return "Abril";
    }
    if ($meses == 5) {
        return "Maio";
    }
    if ($meses == 6) {
        return "Junho";
    }
    if ($meses == 7) {
        return "Julho";
    }
    if ($meses == 8) {
        return "Agosto";
    }
    if ($meses == 9) {
        return "Setembro";
    }
    if ($meses == 11) {
        return "Outubro";
    }
    if ($meses == 12) {
        return "Novembro";
    }
    if ($meses == 13) {
        return "Dezembro";
    }
} 


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
                            Movimentações
                            <a href="index.php" class="btn btn-primary float-end">Voltar</a>
                        </h4>
                            </div>
                        <div class="card-body">
                        <form action="acoes.php" method="POST">

                        <div class="mb-3">
                                <label>Meses</label>
                                    <select id="meses" name="meses">
                                        <option value="Janeiro" class="btn btn-secondary btn-sm">Janeiro</option>
                                        <option value="Fevereiro" class="btn btn-secondary btn-sm">Fevereiro</option>
                                        <option value="Março" class="btn btn-secondary btn-sm">Março</option>
                                        <option value="Abril" class="btn btn-secondary btn-sm">Abril</option>
                                        <option value="Maio" class="btn btn-secondary btn-sm">Maio</option>
                                        <option value="Junho" class="btn btn-secondary btn-sm">Junho</option>
                                        <option value="Julho" class="btn btn-secondary btn-sm">Julho</option>
                                        <option value="Agosto" class="btn btn-secondary btn-sm">Agosto</option>
                                        <option value="Setembro" class="btn btn-secondary btn-sm">Setembro</option>
                                        <option value="Outubro" class="btn btn-secondary btn-sm">Outubro</option>
                                        <option value="Novembro" class="btn btn-secondary btn-sm">Novembro</option>
                                        <option value="Dezembro" class="btn btn-secondary btn-sm">Dezembro</option>
                                    </select>

                            </div>
                        <div>
                            <label for="txttipo">Tipo</label>
                            <input type="tipo" name="txttipo" id="txttipo" class="form-control">
                        </div>

                        <div>
                            <label for="txtDescricao">Descrição</label>
                            <input type="text" name="txtDescricao" id="txtDescricao" class="form-control">
                        </div>

                        <div>
                            <label for="txtValor">Valor</label>
                            <input type="Valor" name="txtValor" id="txtValor" class="form-control">
                        </div>
                        <div>
                            <button type = "submit" name="criar_movimentacoes" class="btn btn-primary float-end">Salvar</button>
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