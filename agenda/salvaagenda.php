<?php
	include "../conexao.php";
	$nome = $_POST['nome'];
	$fixo = $_POST['fixo'];
	$celular = $_POST['celular'];
	$id_servico = $_POST['servico'];
	$data = $_POST['data'];
	$hora = $_POST['hora'];
	$horaTerm = $_POST['hora_term'];
	$id_funcionario = $_POST['func'];
	$valor = $_POST['valor'];
	$id_cliente = '';
	$id_agenda = 0;

	function agendar($id_servico, $id_cliente, $id_funcionario, $hora, $horaTerm, $data){
		include "../conexao.php";

		$conn->query("INSERT INTO agenda(id_servico, id_cliente, id_funcionario, horario_inicio, horario_termino, data_agenda) 
			VALUES ('$id_servico', '$id_cliente', '$id_funcionario', '$hora', '$horaTerm', '$data')");

		echo "<script>alert('Agendamento feito com sucesso!');location.href=\"agenda.php\";</script>";
	}

	function selecionaCliente($nome, $fixo, $celular){
		include "../conexao.php";
				
		$dadosCliente = mysqli_query($conn, "SELECT id_cliente FROM cliente where nome_cliente='$nome' and (telefone_fixo_cliente='$fixo' or telefone_celular_cliente='$celular')");
		while($coluna = mysqli_fetch_array($dadosCliente)) {
			$id_cliente = $coluna['id_cliente'];
		}

		return $id_cliente;
	}

	function salvarPagamento($id_agenda, $data, $valor){
		include "../conexao.php";
		$conn->query("INSERT INTO ganho(id_agenda, data_ganho, status_ganho, valor_ganho) VALUES ('$id_agenda', '$data', 'Pago', '$valor')");
	}

	function selecionaAgenda(){
		include "../conexao.php";
		$dadosAgenda = mysqli_query($conn, "SELECT max(id_agenda) as 'id_agenda' FROM agenda");
		while($coluna = mysqli_fetch_array($dadosAgenda)) {
			$id_agenda = $coluna['id_agenda'];
		}

		return $id_agenda + 1;
	}

	$id_cliente = selecionaCliente($nome, $fixo, $celular);
	$id_agenda = selecionaAgenda();
	
	if($nome == '' || $nome == null || $celular == '' || $celular == null ||
		$id_servico == '' || $id_servico == null || $data == '' || $data == null || $hora == '' || 
		$hora == null || $horaTerm == '' || $horaTerm == null || $id_funcionario == '' || $id_funcionario == null ||
		$valor == '' || $valor == null){
			echo "<script>alert('Os campos devem ser preenchidos para fazer uma validação');
						location.href=\"agenda.php\";
				</script>";

	}else if ($hora >= $horaTerm){
		echo "<script>alert('Insira um horário valido para o término do serviço');
				location.href=\"agenda.php\";
			</script>";

	}else if($id_cliente == ''){
		$conn->query("INSERT INTO cliente(nome_cliente, telefone_fixo_cliente, telefone_celular_cliente) 
			VALUES ('$nome', '$fixo', '$celular')");

		$id_cliente = selecionaCliente($nome, $fixo, $celular);

		salvarPagamento($id_agenda, $data, $valor);
		agendar($id_servico, $id_cliente, $id_funcionario, $hora, $horaTerm, $data);
		
	}else{
		salvarPagamento($id_agenda, $data, $valor);
		agendar($id_servico, $id_cliente, $id_funcionario, $hora, $horaTerm, $data);
	}
?>