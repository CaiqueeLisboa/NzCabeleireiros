<?php
if(!isset($_SESSION)) session_start(); 

if(!isset($_SESSION['usuarioId'])AND !isset($_SESSION['usuarioEmail'])AND !isset($_SESSION['telefone_celular'])){
	session_destroy();
	header("location:../login/login.php");
	exit;
}
?>

<!doctype html>
<html lang="pt-br"> 
	<head>
		<meta charset="utf-8" />
		<title>Alterar Dados</title>
        <link rel="stylesheet" href="./alterar.css">
	</head> 
	<body>
	<?php
	include"../conexao.php";
	$id =$_GET["id"];
	$dados= mysqli_query($conn, "SELECT * FROM cliente where id_cliente= $id");
	
		while($coluna = mysqli_fetch_array($dados)){ 
			$id = $coluna['id_cliente'];
			$nome = $coluna['nome'];
			$email = $coluna['email'];
			$fixo= $coluna['telefone_fixo'];
			$celular= $coluna['telefone_celular'];
			$status= $coluna['status_cliente'];
	  }
	?>
		<form enctype="multipart/form-data" action="salvaralteracao.php?id_cliente=$id" name="form" method="POST">
		<div class="clientDados">
			<fieldset class="infoPessoa">
				<legend> Dados do Cliente </legend>
					<input name="id" type="hidden" value='<?php echo"$id"?>'>	
					<label> Nome 				</label>	<input name="nome"				type="text" 	required class="input" value='<?php echo"$nome"?>'>	
					<label> Telefone Fixo 		</label>	<input name="fixo"				type="text"  	required class="input" value='<?php echo"$fixo"?>'> 
					<label> Telefone celular	</label>	<input name="celular"			type="text" 	required class="input" value='<?php echo"$celular"?>'>
					<label> Email				</label>	<input name="email"				type="email" 	required class="input" value='<?php echo"$email"?>'> 
					<input name="status" type="hidden" value='<?php echo"$status"?>'>	
				</fieldset>
						
			<a><input type="submit" value="Alterar"	 	class="btn-2"/></a>
			<a><input type="reset" 	value="Limpar"	 	class="btn-2"/></a>
		</form>
		<a href="cadastro.php">Voltar</a>
		</div>
	</body>
</html>