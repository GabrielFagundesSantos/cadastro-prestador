<?php


if(!empty($_GET['id']))
{
include_once('conexao.php');

    $id = $_GET['id'];
    $sqlSelect = "Select * from especialidades where id = $id";
    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0)
    {
       $sqlDelete = "DELETE from especialidades where id=$id";  
       $resultDelete = $conexao->query($sqlDelete);      
    }
}
header('location: index.php?pagina=consulta_especialid');

?>