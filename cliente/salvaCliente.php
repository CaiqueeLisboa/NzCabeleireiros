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
$celular = $_POST['celular'];
$fixo = $_POST['fixo'];
$email = $_POST['email'];

$cep = $_POST['cep'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];

$conn->query("INSERT INTO endereco(cep, numero, complemento, rua,  bairro,  cidade, estado) VALUES ('$cep', '$numero', '$complemento', '$rua','$bairro', '$cidade', '$estado')");

$val1 = $conn->query("SELECT * FROM cliente WHERE email_cliente = '$email'");
$val2 = $conn->query("SELECT * FROM cliente WHERE nome_cliente = '$nome'");
$check1 = mysqli_num_rows($val1);
$check2 = mysqli_num_rows($val2);



if (($check1 == 1 and $check2 == 1)){
	echo "<script>alert('Cliente já cadastrado!');location.href=\"cadastro.php\";</script>";
}

else {
	$lista = mysqli_query($conn, "SELECT * FROM endereco where cep = '$cep' and numero = '$numero' and complemento = '$complemento'");
	 while($coluna = mysqli_fetch_array($lista)) {
     $id = $coluna['id_endereco'];
	 }
	$conn->query("INSERT INTO cliente(nome_cliente, email_cliente, telefone_fixo_cliente, telefone_celular_cliente, id_endereco) VALUES ('$nome', '$email', '$fixo', '$celular', '$id')");
	echo "<script>alert('Cliente cadastrado com sucesso!');location.href=\"cadastro.php\";</script>";
}
?>
</body>
</html>
