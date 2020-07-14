<?php
include"../conexao.php";
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$celular = $_POST['celular'];
	$fixo = $_POST['fixo'];
	$status = $_POST['status'];
	$id_endereco = $_POST['id_endereco'];
	$cep = $_POST['cep'];
	$numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$rua = $_POST['rua'];
	$bairro = $_POST['bairro'];
	$cidade = $_POST['cidade'];
	$estado = $_POST['estado'];

	$conn->query("UPDATE cliente SET id_cliente='$id', nome_cliente='$nome', email_cliente='$email', telefone_fixo_cliente='$fixo', telefone_celular_cliente='$celular', status_cliente='$status', 'id_enderco'='$id_endereco' where id_cliente='$id'");

	$conn->query("UPDATE endereco SET id_endereco='$id_endereco', cep='$cep', rua='$rua', numero='$numero', complemento='$complemento', bairro='$bairro', cidade='$cidade', estado='$estado' where id_endereco='$id_endereco'");
header("location:./cadastro.php");
?>