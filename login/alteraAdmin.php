<?php
if(!isset($_SESSION)) session_start(); 

if(!isset($_SESSION['usuarioId'])AND !isset($_SESSION['usuarioEmail'])AND !isset($_SESSION['telefone_celular'])){
	session_destroy();
	header("location:/login.php");
	exit;
}

include"../conexao.php";
	$id = $_SESSION['usuarioId'];
	$nome = $_POST['nome'];
	$email = $_POST['email'];
	$celular = $_POST['celular'];
	$fixo = $_POST['fixo'];
	$senha = $_POST['senha'];

$conn->query("UPDATE funcionario SET id_funcionario='$id', nome_funcionario='$nome', email_funcionario='$email', telefone_fixo_funcionario='$fixo', telefone_celular_funcionario='$celular', senha='$senha' where email_funcionario='admin@admin'");

header("location:../agenda/agenda.php");
?>

