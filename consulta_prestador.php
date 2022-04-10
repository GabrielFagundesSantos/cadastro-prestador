<?php
include_once("conexao.php");

$filtro = isset($_GET['filtro'])?$_GET['filtro']:"";
$sql = "SELECT * from dentistas ";
$consulta = mysqli_query($conexao, $sql);
$registro = mysqli_num_rows($consulta);
$result = $conexao->query($sql);

if(!empty($_GET['search']))
{
	$data = $_GET['search'];
	$sql = "SELECT * from dentistas where id like '%$data%' or nome like '%$data%' or email like '$data' or id_especialidade like '$data' order by id desc";
}
else
{
	$sql = "SELECT * from dentistas order by id desc LIMIT 5";
}

?>




<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8"></meta>
	<link rel="stylesheet" href="">
	<title>Buscar</title>

	<style>
		.table-bg{
				background: rgba(0,0,0,0.1);	
				border-radius: 15px 15px 0 0; }

		.box-search{
				display: flex;
				justify-content: center;
				gap:.2%;
		}
	</style>

</head>
<body>
	<!--<div class="container">

		<section>
			
			<form method="get" action="">
				Filtrar por nome: <input type="text" name="filtro" class="campo" required autofocus>
				<input type="submit" value="consulta" class="btn btn-primary">
			</form>
			
		</section>
	</div>-->
	<div class="box-search">
		<input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
		<button onclick="searchData()" class="btn btn-primary">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  			<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
			</svg>
		</button>
	</div>
	<div class="m-5">
		<table class="table table-bg">
		  <thead>
		    <tr>
			      <th scope="col">#</th>
			      <th scope="col">nome</th>
			      <th scope="col">email</th>
			      <th scope="col">cro</th>
			      <th scope="col">cro_uf</th>
			      <th scope="col">id_especialidade</th>
			      
		    </tr>
		  </thead>
		  <tbody>
		    <?php
		    	while ($user_data = mysqli_fetch_assoc($result))
		    	{
		    		echo "<tr>";
		    		echo "<td>".$user_data['id']."</td>";
		    		echo "<td>".$user_data['nome']."</td>";
		    		echo "<td>".$user_data['email']."</td>";
		    		echo "<td>".$user_data['cro']."</td>";
		    		echo "<td>".$user_data['cro_uf']."</td>";
		    		echo "<td>".$user_data['id_especialidade']."</td>";
		    		echo "<td>
		    			<a class='btn btn-primary' href='edit.php?id=$user_data[id]'>
			      		<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
  						<path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
						</svg>
			      	</a>
			      	<a class='btn btn-danger' href='delete.php?id=$user_data[id]'>
			      		<svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
  						<path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
						</svg>
			      	</a>
			      	</td>";
			      	echo "</tr>";
		    	}
		    ?>
		  </tbody>
		</table>
	</div>

</body>
<script>
	var search = document.getElementById('pesquisar');

	search.addEventListener("keydown", function(event){
		if (event.key === "Enter")
		{
			searchData();
		}
	});

	function searchData()
	{
		window.location = 'consulta_prestador.php?search='+search.value;
	}
</script>
</html>