<?php

include_once('conexao.php');
if(isset($_POST['update']))
{
	$id = $_POST['id'];
	$nome = $_POST['nome'];
    $email = $_POST['email'];
    $cro = $_POST['cro'];
    $cro_uf = $_POST['cro_uf'];
    $id_especialidade = $_POST['id_especialidade'];

    $sqlUpdate = "UPDATE dentistas SET nome='$nome', email='$email', cro='$cro', cro_uf='$cro_uf', id_especialidade='$id_especialidade'
    where id='$id'";
    $result = $conexao->query($sqlUpdate);

}

header('location: index.php?pagina=consulta');	

?>