<?php
if(!isset($_SESSION)) session_start(); 

if(!isset($_SESSION['usuarioId'])AND !isset($_SESSION['usuarioEmail'])AND !isset($_SESSION['telefone_celular'])){
	session_destroy();
	header("location:../login/login.php");
	exit;
}
?>

<html>
    <head>
        <title> Login </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </head>

    <body>
        <div class=".container-xl">
            <h1> Bem vindo </h1>
            <h2> Por ser seu primeiro acesso te redirecionamos a essa página para alterar seus registros </h2>

            <h2> Informe seus dados: </h2>
            <form enctype="multipart/form-data" action="alteraAdmin.php" method='POST' class="form-group"> 
                <label> Nome: 		</label>    <input name="nome"		type="text" 		class="form-control" required autofocus>
                <label> Email: 		</label>	<input name="email"		type="email"  		class="form-control" required> 
                <label> Tel.Cel: 	</label>	<input name="celular"	type="text" 		class="form-control" required> 
                <label> Tel.Fixo: 	</label>  	<input name="fixo"		type="text"   		class="form-control" required> 
                <label> Senha: 		</label>    <input name="senha"		type="password"	 	class="form-control" required> 
                <a><input type="submit" value="alterar" class="btn btn-success"/></a> <br>
                <a href="../sair.php" class="btn-2">Sair do sistema</a>
            </form>
        </div>
    </body>
</html>