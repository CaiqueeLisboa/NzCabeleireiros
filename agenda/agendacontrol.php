<?php
include "../conexao.php";
$lista = mysqli_query($conn, "SELECT * FROM agenda where data_agenda = current_date() and status_agenda = 'Pendente' order by horario_inicio");
	while($coluna = mysqli_fetch_array($lista)) {
	$id = $coluna['id_agenda'];
	
	$idpost = $_POST[$id];
	
	$conn->query("UPDATE agenda SET status_agenda='$idpost' where id_agenda = '$id'");
}
header("Location: agenda.php");
?>