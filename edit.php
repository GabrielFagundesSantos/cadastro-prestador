<?php

if(!empty($_GET['id']))
{
    include_once('conexao.php');

    $id = $_GET['id'];
    $sqlSelect = "Select * from dentistas where id = $id";
    $result = $conexao->query($sqlSelect);
    if($result->num_rows > 0)
    {
        while ($user_data = mysqli_fetch_assoc($result)) 
        {
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $cro = $user_data['cro'];
            $cro_uf = $user_data['cro_uf'];
            $id_especialidade = $user_data['id_especialidade'];
        }
        
    }
    else
    {
        header('location: index.php?pagina=consulta');
    }

    }
    else
    {
        header('location: index.php?pagina=consulta');
    }
?>


<!DOCTYPE html>
<html>
<head>
    <title>Cadastro Dentistas</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<a href="index.php?pagina=consulta" class="btn btn-primary">Voltar </a>
<div class="container">
    <form action="saveEdit.php" method="post">
        <div class="form-group">
            <label>Digite o nome</label>
            <input typo='text' name="nome" class="form-control" value="<?php echo $nome ?>" > 
        </div>  
        <div class="form-group">
            <label>Digite o e-mail</label>
            <input typo='text' name="email" class="form-control", value="<?php echo $email ?>" >
        </div>
        <div class="form-group">
            <label>Digite o CRO</label>
            <input typo='number' name="cro" class="form-control", value="<?php echo $cro ?>" >
        </div>
        <div class="form-group">
            <label>Digite o CRO UF</label>
            <input typo='text' name="cro_uf" class="form-control", value="<?php echo $cro_uf ?>" >
        </div>
        <div class="form-group">
            <label>Insira o codigo da especialidade</label>
            <input typo='number' name="id_especialidade" class="form-control" value="<?php echo $id_especialidade ?>">
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