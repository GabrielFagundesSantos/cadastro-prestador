<?php

include_once('conexao.php');
if(isset($_POST['update']))
{
	$id = $_POST['id'];
	$nome = $_POST['nome'];

    $sqlUpdate = "UPDATE especialidades SET nome='$nome' where id='$id'";
    $result = $conexao->query($sqlUpdate);

}

header('location: index.php?pagina=consulta_especialid');	

?>