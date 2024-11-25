<?php
session_start();
require_once('conexao.php');

$moviment = [];

if (!isset($_GET['id_movimentacoes'])) {
    header('Location: pasta_mes.php');
} else {
    $movID = mysqli_real_escape_string($conn, $_GET['id_movimentacoes']);
    $sql = "SELECT * FROM movimentacoes WHERE id_movimentacoes = '{$movID}'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $moviment = mysqli_fetch_array($query);
    }
}

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

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar - Usuários</title>
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
                            Editar usuário <i class="bi bi-person-fill-gear"></i>
                            <a href="pasta_mes.php" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($moviment) :
                        ?>
                        <form action="acoes.php" method="POST">
                        <input type="hidden" name="mov_id" value="<?=$moviment['id_movimentacoes']?>">
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
                                <input type="tipo" name="txttipo" id="txttipo" value="<?=$moviment['movement_type']?>"  class="form-control" >
                            </div>

                            <div>
                                <label for="txtDescricao">Descrição</label>
                                <input type="text" name="txtDescricao" id="txtDescricao" rows="3" value="<?=$moviment['description']?>" class="form-control">
                            </div>

                            <div>
                                <label for="txtValor">Valor</label>
                                <input type="Valor" name="txtValor" id="txtValor" value="<?=$moviment['amount']?>" class="form-control">
                            </div>
                            <div>
                                <button type = "submit" name="editar_movimentacoes" class="btn btn-primary float-end">Salvar</button>
                            </div>
                        </form>
                        <?php else:?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                             Não encontrado
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <?php
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>