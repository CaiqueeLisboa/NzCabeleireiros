<?php

	//inicializado primeira a sessao par depois recuperar valores das variavis globais.
	session_start();

?>

<!DOCTYPE html>

<html lang="pt-br">

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="login.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
		<title> LOGIN </title>
	</head>
	
	<body>
	
		<div class= "banner">

			<b>LOGIN</b>
		
		</div>
			
		<div class="container">

			<div class="formulario">
			
				<form enctype="multipart/form-data" action="valida.php" method='POST'>
					<center>
					
					<br> <br> <br>	
						<input type="text" name="email" placeholder="email " required>
									
						<br/>
									
						<input type="password" name="senha" placeholder="Senha" required>
																
							<p>
			
								<?php	
									
									//recuperando o valor da variavel global, os erro de login.
									if(isset($_SESSION['loginErro'])){
										echo ($_SESSION['loginErro']);
										unset ($_SESSION['loginErro']);
									}
									
								?>
							
							</p>
							
							<p>
							
								<?php
								
									if(isset($_SESSION['logindeslogado'])){
										echo ($_SESSION['logindeslogado']);
										unset ($_SESSION['logindeslogado']);
									}
								
								?>
							
							</p>
							
						<input type="submit" value="Entrar">
							
					<br> <br>
						
					</center>
								
				</form>
				
				<a href="../divulgacao/divulgacao.html"> Acesso para convidados </a>
			</div>
	
		</div>
		
	</body>
	
</html>