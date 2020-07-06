<?php
if(!isset($_SESSION)) session_start(); 

if(!isset($_SESSION['usuarioId'])AND !isset($_SESSION['usuarioEmail'])AND !isset($_SESSION['telefone_celular'])){
	session_destroy();
	header("location:../login/login.php");
	exit;
}
?>
<html>
    <head>
		<title> Agenda </title>
		<meta charset="UTF-8">
        <link rel="stylesheet" href="agenda.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="../services.js"></script>
		<script type="text/javascript" src="agenda.js"></script>
    </head>
    <body>
		<div class="container-fluid">
			<header>
				<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #222;">
					<a class="navbar-brand" href="#">Nz Cabeleireiros</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav">
						<a class="nav-item nav-link active" href="agenda.php">Agenda</a> <span class="sr-only">(current)</span></a>
						<a class="nav-item nav-link active" href="../cliente/cadastro.php">Controle de Cadastros</a>
						<a class="nav-item nav-link active" href="../historico/historico.php">Histórico de Serviço </a>
						<a class="nav-item nav-link active" href="../controleDeRenda/renda.php">Controle de Renda </a>
						<a class="nav-item nav-link active" href="../sair.php">Sair do sistema</a>
					</div>
					</div>
			  </nav>
			</header>
			
			<aside class="sidebar">
				<div class="header"> AGENDAMENTO </div>
				<div class="left_menu">
					<div class="menuIcon">
						<img src="../img/iconAgendaDia.png" style="filter:invert(100)" class="icon"> 
					</div>
					<div class="menuText">
						<input type="button" value="Agenda do Dia" onClick="MostrarButton('agenda_dia', 'calendario_mensal', 'Lembrete', 'novo_horario')" class="btn btn-secondary btn-sm"/>
					</div>
				</div>
				<div class="left_menu">
					<div class="menuIcon">
						<img src="../img/iconAgendaMês.png" style="filter:invert(100)" class="icon"> 
					</div>
					<div class="menuText">
						<input type="button" value="Calendário Mensal" onClick="MostrarButton('calendario_mensal', 'agenda_dia', 'Lembrete', 'novo_horario')" class="btn btn-secondary btn-sm"/>
					</div>
				</div>
				<div class="left_menu">
					<div class="menuIcon">
						<img src="../img/iconAgendar.png" style="filter:invert(100)" class="icon">
					</div>
					<div class="menuText">
						<input type="button" value="Agendar Novo Horário" onClick="MostrarButton('novo_horario', 'agenda_dia', 'calendario_mensal', 'Lembrete')" class="btn btn-secondary btn-sm"/>
					</div>
				</div>
				<div class="left_menu">
					<div class="menuIcon">
						<img src="../img/iconLembrete.png" style="filter:invert(100)" class="icon"> 
					</div>
					<div class="menuText">
						<input type="button" value="Lembrete" onClick="MostrarButton('Lembrete', 'agenda_dia', 'calendario_mensal', 'novo_horario')" class="btn btn-secondary btn-sm"/>
					</div>
				</div>
			</aside>
			
			<div id="agenda_dia" class="hidden">
				<section>
					<div class="banner">
						<div class="titu"> <b> AGENDA DO DIA </b> </div>
					</div>
					<form action="agendacontrol.php" method="post">
						<div class="agenda">
							<table class="table table-dark">
								<tr>
									<td>Inicio</td>
									<td>Fim</td>
									<td>Nome</td>
									<td>Funcionário</td>
									<td>Serviço</td>
									<td>Status</td>
									<td>Preço</td>
									<td colspan="3">Check-In</td>
								</tr>
							<?php
								include "../conexao.php";									
								$lista = mysqli_query($conn, "SELECT * FROM view_agenda where data_agenda = current_date() and status_agenda = 'Pendente' order by data_agenda, horario_inicio");
								while($coluna = mysqli_fetch_array($lista)) {
									$id = $coluna['id_agenda'] ;
									$cliente = $coluna['nome_cliente'];
									$servico = $coluna['tipo_servico'];
									$funcionario = $coluna['nome_funcionario'];
									$hora = $coluna['horario_inicio'];
									$horaTerm = $coluna['horario_termino'];
									$status = $coluna['status_agenda'];
									$preco = $coluna['valor_ganho'];
									$data = $coluna['data_agenda'];
									echo"
										<tr>
											<td>$hora</td>
											<td>$horaTerm</td>
											<td>$cliente</td>
											<td>$funcionario</td>
											<td>$servico</td>
											<td>$status</td>
											<td>$preco</td>
											<td><input type='radio' name='$id' value='Compareceu'> &check; </td>  
											<td><input type='radio' name='$id' value='Pendente'  checked> &equals; </td>  
											<td><input type='radio' name='$id' value='Não compareceu'> &cross; </td>
										</tr>";
								}
							?>
							</table>	
						</div>	
						<a><input type="submit" value="Atualizar Agenda" class="btn-2"/></a>
					</form>
				</section>
			</div>
			<div id="calendario_mensal" class="hidden"> </div>
			<div id="Lembrete" class="hidden">
					<section>
					<div class="banner">
						<div class="titu"> <b> LEMBRETES </b> </div>
					</div>
					<form action="lembreteControl.php" method="post">
					<div class="agenda">
					<table class="table table-dark">
								<tr>
									<td>Data</td>
									<td>Inicio</td>
									<td>Fim</td>
									<td>Nome</td>
									<td>Funcionário</td>
									<td>Serviço</td>
									<td>Status</td>
									<td>Preço</td>
									<td colspan="3">Check-In</td>
								</tr>
							<?php
								include "../conexao.php";									
								$lista = mysqli_query($conn, "SELECT * FROM view_agenda where data_agenda < current_date() and status_agenda = 'Pendente' order by data_agenda, horario_inicio");
								while($coluna = mysqli_fetch_array($lista)) {
									$id = $coluna['id_agenda'] ;
									$cliente = $coluna['nome_cliente'];
									$servico = $coluna['tipo_servico'];
									$funcionario = $coluna['nome_funcionario'];
									$hora = $coluna['horario_inicio'];
									$horaTerm = $coluna['horario_termino'];
									$status = $coluna['status_agenda'];
									$preco = $coluna['valor_ganho'];
									$data = $coluna['data_agenda'];
									echo"
										<tr>
											<td>$data</td>
											<td>$hora</td>
											<td>$horaTerm</td>
											<td>$cliente</td>
											<td>$funcionario</td>
											<td>$servico</td>
											<td>$status</td>
											<td>$preco</td>
											<td><input type='radio' name='$id' value='Compareceu'> &check; </td>  
											<td><input type='radio' name='$id' value='Pendente'  checked> &equals; </td>  
											<td><input type='radio' name='$id' value='Não compareceu'> &cross; </td>
										</tr>";
								}
							?>
							</table>	
					</div>	
					<a><input type="submit"    value="Atualizar Agenda"	 	class="btn-2"/></a>
					</form>
				</section>
			</div>
			<div id="novo_horario" class="hidden">
				<section>
					<div class="banner">
						<div class="titu"> <b> AGENDAR NOVO HORÁRIO </b> </div>
					</div>
					<form class="formulario" name="agendarhorario" action="salvaagenda.php" method="post" onSubmit="return validarForm()">
						<div class="form-row">
							<div class="col">
								<label for="nome">Nome Completo</label>
								<input name="nome" type="text" placeholder="nome" id="nome"  class="form-control" list="datalist">
							</div>
							<div class="col">
								<label for="celular">Telefone Celular</label>
								<input name="celular"	type="number" 	require	placeholder="celular" id="celular" class="form-control">
							</div>
							<div class="col">
								<label for="fixo">Telefone Celular</label>
								<input name="fixo"		type="number" 	require placeholder="fixo" id="fixo" class="form-control">
							</div>
										
						<datalist id="datalist">
							<?php
								$pesquisaCliente = mysqli_query($conn, "SELECT nome_cliente FROM cliente");
								while($coluna = mysqli_fetch_array($pesquisaCliente)) {
									$nome_cliente = $coluna['nome_cliente'];
									echo "<option value='$nome_cliente'></option>";
								}
							?>
						</datalist>
						</div>
						<br>
						<div class="form-row">
							<div class="col">
								<label for="selectServico"> Serviço </label>
								<img src="../img/iconeAdicionarServico.png" class="icone" onClick="abrirPopup()">
								<select name="servico" id="selectServico" class="form-control"> 
									<?php
										$dadosServico = mysqli_query($conn, "SELECT * FROM servico");
										 while($coluna = mysqli_fetch_array($dadosServico)) {
											 $id_service = $coluna['id_servico'];
											 $tipo_servico = $coluna['tipo_servico'];
											 echo "<option value='$id_service'> $id_service - $tipo_servico </option>";
										}
									?>
								</select>
							</div>
						</div>
						<br>
						<div class="form-row">
							<div class="col">
								<label for="data"> Data </label>  	
								<input name="data"	type="date" placeholder="date" id="data"  class="form-control">		
							</div>
							<div class="col">	
								<label for="hora"> Horário	</label>   	
								<input name="hora"	type="time" placeholder="nome" id="hora"  class="form-control">	
							</div>	
							<div class="col">
								<label for="hora_term"> Horário	de término	</label>
								<input name="hora_term"	type="time"	placeholder="nome" id="hora_term"  class="form-control">			
							</div>	
							<div class="col">
								<label for="func"> Funcionário </label>
								<select name="func" id="func" class="form-control">
								<?php
									$dadosFuncionario = mysqli_query($conn, "SELECT * FROM funcionario");
									while($coluna = mysqli_fetch_array($dadosFuncionario)) {
										$id_funcionario = $coluna['id_funcionario'];
										$nome_funcionario = $coluna['nome_funcionario'];
										echo "<option value='$id_funcionario'> $id_funcionario - $nome_funcionario </option>";
									}
								?>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="col">
								<label for="valor"> Valor </label> 	
								<input name="valor"	type="number" 	placeholder="valor" id="valor"  class="form-control">
							</div>
						</div>
						<div class="form-row">
							<div class="col">
								<a><input type="submit"    value="Agendar"	 	class="btn-2"/></a>
							<div>
						</div>
					</form>
				</section>
			</div>
			<div id="servico_popup" class="servico_popup">
				<div class="popup">
					<button class="fechar"> x </button>
					<h3> Cadastre um novo serviço </h3>
						<label> Qual serviço deseja cadastrar? </label> <input id="servico" type="text" class="input"/>
						<button class="btn-2" id="salvar_servico" onClick="salvarServico()"> Salvar </button>
						<div id="mensagem"></div>
					</form>
				</div>
			</div>
    </body>
</html>