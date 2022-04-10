<?php

if(!empty($_GET['id']))
{
    include_once('conexao.php');

    $id = $_GET['id'];
    $sqlSelect = "Select * from especialidades where id = $id";
    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0)
    {
        while ($user_data = mysqli_fetch_assoc($result)) 
        {
            $nome = $user_data['nome'];
        }
        
    }
    else
    {
        header('location: index.php?pagina=consulta_especialid');
    }

    }
    else
    {
        header('location: index.php?pagina=consulta_especialid');
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Alteração Especialidade</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<a href="index.php?pagina=consulta_especialid" class="btn btn-primary">Voltar </a>
<div class="container">
    <form action="saveEditEspecialid.php" method="post">
        <div class="form-group">
			<label>Digite a descrição da Especialidade</label>
			<input type="text" name="nome" class="form-control" value="<?php echo $nome ?>">
		</div> 
    
        <div style="text-align: right;">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="subimit" class="btn btn-primary" name="update" id="update">Alterar</button>
        </div>
    </form>
</div>


<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>