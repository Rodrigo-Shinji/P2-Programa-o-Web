
<?php
session_start();
require_once('conexao.php');

$sql = "SELECT nome FROM categorias";
$cat = $conn->query($sql);
$monthId = mysqli_real_escape_string($conn, $_GET['month_id']);


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
                        <input type="hidden" name="month_id" value="<?= $mesId ?>">
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
                        
                        <div>
                        <?php if ($cat->num_rows > 0) {
                            echo '<select name="categoria" id="categoria">';
                            while($row = $cat->fetch_assoc()) {
                                echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                            }

                            echo '</select>';
                        } else {
                            echo "Nenhuma categoria encontrada.";
                        }   ?>
                        </div>

                        <div>
                            <label for="txtDescricao">Descrição</label>
                            <input type="text" name="txtDescricao" id="txtDescricao" class="form-control">
                        </div>

                        <div>
                        <select id="txtType" name="txtType">
                                        <option value="Entrada">Entrada</option>
                                        <option value="Saída">Saída</option>
                                    </select>
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