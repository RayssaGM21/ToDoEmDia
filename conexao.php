<?php
$host = 'localhost';
$usuarios = 'root';
$senha = 'mysql';
$banco = 'lista_afazeres';
$conn = mysqli_connect($host, $usuarios, $senha, $banco) or die ('Não foi possível se conectar!')
?>