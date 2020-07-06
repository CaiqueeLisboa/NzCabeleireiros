<?php
include "../conexao.php";

    $conn->query("INSERT INTO servico(tipo_servico)
        VALUES ('".$_POST['tipoServico']."')");

?>