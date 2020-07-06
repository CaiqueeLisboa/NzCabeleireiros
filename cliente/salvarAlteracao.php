<?php
include"../conexao.php";
	$id = $_POST['id'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$celular = $_POST['celular'];
	$fixo = $_POST['fixo'];
	$status = $_POST['status'];

	$conn->query("UPDATE cliente SET id_cliente='$id', nome_cliente='$nome', email_cliente='$email', telefone_fixo_cliente='$fixo', telefone_celular_cliente='$celular', status_cliente='$status' where id_cliente='$id'");

header("location:./cadastro.php");
?>