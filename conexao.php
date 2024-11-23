<?php
$host = 'localhost'; #127.0.0.1
$usuario = 'root';
$senha = '';
$banco = 'sistema_financeiro';

$conn = mysqli_connect($host, $usuario, $senha, $banco) or die('Não foi possível conectar');

?>