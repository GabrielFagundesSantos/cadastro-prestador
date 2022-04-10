<?php
include 'conexao.php';

$especialidade = $_POST['especialidade'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$cro = $_POST['cro'];
$cro_uf = $_POST['cro_uf'];


echo $sql = "INSERT INTO dentistas (id_especialidade,nome,email,cro,cro_uf) VALUES ($especialidade,'$nome','$email',$cro,'$cro_uf')";

$inserir = mysqli_query($conexao, $sql);

header('location: index.php?pagina=cadastro')

?>