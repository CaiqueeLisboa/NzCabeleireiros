<?php
if(!isset($_SESSION)) session_start(); 

if(!isset($_SESSION['usuarioId'])AND !isset($_SESSION['usuarioEmail'])AND !isset($_SESSION['telefone_celular'])){
	session_destroy();
	header("location:../login/login.php");
	exit;
}

include"../conexao.php";
$id =$_GET["id"];

$lista = mysqli_query($conn, "SELECT * FROM cliente where id_cliente='$id'");
while($coluna = mysqli_fetch_array($lista)) {
    $status= $coluna['status_cliente'];
}
if($status == "Ativo"){
    $status = "Inativo";
    $conn->query("UPDATE cliente SET status_cliente='$status' where id_cliente='$id'");
    header("location:./cadastro.php");
}else{
    $status = "Ativo";
    $conn->query("UPDATE cliente SET status_cliente='$status' where id_cliente='$id'");
    header("location:./cadastro.php");
}
?>
