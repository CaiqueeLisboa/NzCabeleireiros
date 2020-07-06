<?php
	
	
	//$servidor = "localhost";
	//$usuario = "root";
	//$senha = "";
	//$dbname = "funvidevendas.sql";
		
	//criar a conexaoxao
	$conn = mysqli_connect('localhost','root','','tcc');

	if(!$conn){
		die("Falha na conexao:" .mysquli_connect_error());
	}
	else{
		//echo "Conexao realizada com sucesso";
	}
		
?>