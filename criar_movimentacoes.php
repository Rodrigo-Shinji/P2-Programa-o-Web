
<?php
session_start();
require_once('conexao.php');
$mesId = mysqli_real_escape_string($conn, $_GET['id_meses']);

$sql = "SELECT * FROM categorias";
$categories = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script>
        window.onload = function(){
            var dropdown = document.getElementById("example");
            var textbox = document.getElementById("textbox");
        dropdown.addEventListener("change", function() {
            if(dropdown.value == 7){
                textbox.style.display = "block";
            }else{
                textbox.style.display = "none";
                }
            });
        }
</script>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class ="card">
                    <div class="card-header">
                    <form action="acoes.php" method="POST">
                        <input type="hidden" name="month_id" value="<?=$mesId?>">
                        <h4>
                            Movimentações
                            <a href="index.php" class="btn btn-primary float-end">Voltar</a>
                        </h4>
                            </div>
                        <div class="card-body">
                        <form action="acoes.php" method="POST">
                        <div class="mb-3">
                                <label for="txtData">Data</label>
                                <input type="date" name="txtData" id="txtData" class="form-control">
                        </div>  
                        <div class="mb-3">
                                <label for="txtCategory">Categoria</label>
                                <select name="txtCategory" id="txtCategory" class="form-select">
                                    <option selected disabled>Selecione uma categoria</option>
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category['id_categoria'] ?>"><?php echo $category['nome'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        <div class = "mb-3">
                            <label for="txtDescricao">Descrição</label>
                            <input type="text" name="txtDescricao" id="txtDescricao" class="form-control">
                        </div>
                        <div class="mb-3">
                        <label for="txtDescricao">Tipo de Transação</label>
                        <select id="txtType" name="txtType" class="form-select">
                                        <option value="Entrada">Entrada</option>
                                        <option value="Saída">Saída</option>
                                    </select>
                        </div>
                        <div>
                            <label for="txtValor">Valor</label>
                            <input type="Valor" name="txtValor" id="txtValor" class="form-control">
                        </div>
                        <div class="mt-3">
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