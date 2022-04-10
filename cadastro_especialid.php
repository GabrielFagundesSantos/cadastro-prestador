<?php
include 'conexao.php';

$nome = $_POST['nome'];

echo $sql = "INSERT INTO especialidades(`nome`) VALUES ('$nome')";

$inserir = mysqli_query($conexao, $sql);

header('location: index.php?pagina=especialidade')

?>