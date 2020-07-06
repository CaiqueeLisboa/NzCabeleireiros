<!doctype html>
<html lang="pt-br"> 
	<head>
		<meta charset="utf-8" />
		<title>Listar dados</title>
		
		<link rel="stylesheet" href="./cadastro.css">		
	</head> 
<body>
<?php
include"../conexao.php";
$nome = $_POST['nome'];
$senha = $_POST['senha'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$fixo = $_POST['fixo'];

$val1 = $conn->query("SELECT * FROM funcionario WHERE email_funcionario = '$email'");
$val2 = $conn->query("SELECT * FROM funcionario WHERE nome_funcionario = '$nome'");
$check1 = mysqli_num_rows($val1);
$check2 = mysqli_num_rows($val2);



if (($check1 == 1 and $check2 == 1)){
	echo "<script>alert('Cliente já cadastrado!');location.href=\"cadastro.php\";</script>";
}

else {
	$conn->query("INSERT INTO funcionario(nome_funcionario, email_funcionario, telefone_fixo_funcionario, telefone_celular_funcionario, senha) VALUES ('$nome','$email','$fixo', '$celular', '$senha')");
	echo "<script>alert('Funcionário cadastrado com sucesso!');location.href=\"cadastro.php\";</script>";
}

?>
</body>
</html>
