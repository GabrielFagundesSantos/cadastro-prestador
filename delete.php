<?php


if(!empty($_GET['id']))
{
include_once('conexao.php');

    $id = $_GET['id'];
    $sqlSelect = "Select * from dentistas where id = $id";
    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0)
    {
       $sqlDelete = "DELETE from dentistas where id=$id";  
       $resultDelete = $conexao->query($sqlDelete);      
    }
}
header('location: index.php?pagina=consulta');

?>