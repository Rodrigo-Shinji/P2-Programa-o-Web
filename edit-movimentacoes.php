<?php
session_start();
require_once('conexao.php');

$movimentacao = [];

if (!isset($_GET['id'])) {
    header('Location: index.php');
} else {
    $movId = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT 
            mv.id_movimentacoes,
            mv.description,
            c.nome AS categoria, 
            mv.category_id as tid,
            m.id_meses as month_id,
            m.nome, 
            m.ano,
            mv.movement_date as data,
            mv.movement_type AS transacao, 
            mv.amount, 
            mv.movement_date
        FROM movimentacoes mv
        INNER JOIN categorias c ON mv.category_id = c.id_categoria
        INNER JOIN meses m ON mv.month_id = m.id_meses  WHERE mv.id_movimentacoes = '{$movId}'";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {
        $movimentacao = mysqli_fetch_array($query);
    }

    $sql_categorias = "SELECT * FROM categorias";
    $categorias = mysqli_query($conn, $sql_categorias);
}

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Movimentações</title>
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
                            Editar Movimentações <i class="bi bi-person-fill-gear"></i>
                            <a href="pasta_mes.php?id_meses=<?php echo $movimentacao['month_id'] ?>" class="btn btn-danger float-end">Voltar</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if ($movimentacao) :
                        ?>
                            <form action="acoes.php" method="POST">
                                <input type="hidden" name="mov_id" value="<?= $movimentacao['id_movimentacoes'] ?>">
                                <input type="hidden" name="month_id" value="<?= $movimentacao['month_id'] ?>">
                                <label for="txtCategory">Categoria</label>

                                <select name="txtCategory" id="txtCategory" class="form-select">
                                    <?php foreach ($categorias as $cat): ?>
                                        <option <?php echo $movimentacao['tid'] == $cat['id_categoria'] ? "selected" : "" ?> value="<?php echo $cat['id_categoria'] ?>"><?php echo $cat['nome'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="mb-3">
                                    <label for="txtDate">Data</label>
                                    <input type="date" name="txtDate" id="txtDate" value="<?= $movimentacao['data'] ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="txtValue">Valor</label>
                                    <input type="text" name="txtValue" id="txtValue" value="<?= $movimentacao['amount'] ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="txtDescription">Descrição</label>
                                    <input type="text" name="txtDescription" id="txtDescription" value="<?= $movimentacao['description'] ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="txtTransaction">Transação</label>
                                    <select name="txtTransaction" id="txtTransaction" class="form-select">
                                        <option value="Entrada" <?= $movimentacao['transacao'] == 'Entrada' ? 'selected' : "" ?>>Entrada</option>
                                        <option value="Saída" <?= $movimentacao['transacao'] == 'Saída' ? 'selected' : "" ?>>Saída</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="edit_mov" class="btn btn-primary float-end">Salvar</button>
                                </div>
                            </form>
                        <?php
                        else:
                        ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Movimentação não encontrada
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