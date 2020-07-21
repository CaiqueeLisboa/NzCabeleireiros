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
        <link rel="stylesheet" href="./historico.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<script type="text/javascript" src="../services.js"></script>
		<script type="text/javascript" src="historico.js"></script>
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
						<a class="nav-item nav-link active" href="../agenda/agenda.php">Agenda</a> <span class="sr-only">(current)</span></a>
						<a class="nav-item nav-link active" href="../cliente/cadastro.php">Controle de Cadastros</a>
						<a class="nav-item nav-link active" href="historico.php">Histórico de Serviço </a>
						<a class="nav-item nav-link active" href="../controleDeRenda/renda.php">Controle de Renda </a>
						<a class="nav-item nav-link active" href="../sair.php">Sair do sistema</a>
					</div>
					</div>
			  </nav>
			</header>
			
			<aside>
				<div class="header"> Histórico </div>
				<div class="left_menu">
					<div class="menuIcon">
						<img src="../img/iconHistoricoMensal.png" style="filter:invert(100)" class="icon"> 
					</div>
					<div class="menuText">
						<input type="button" value="Histórico" onClick="MostrarButton('historico', 'registros_desativados')" class="btn btn-danger btn-sm"/>
					</div>
				</div>
				<div class="left_menu">
					<div class="menuIcon">
						<img src="../img/iconHistoricoDesativado.png" style="filter:invert(100)" class="icon"> 
					</div>
					<div class="menuText">
						<input type="button" value="Registros Desativados" onClick="MostrarButton('registros_desativados', 'historico')" class="btn btn-danger btn-sm"/>
					</div>
				</div>
			</aside>
			
			<div id="historico" class="hidden">
				<section>
					<div class="banner">
						<div class="titu"> <b> HISTÓRICO </b> </div>
					</div>
					
					<div class="agenda">
						<table id="tabela" class="table table-dark table-hover">
						<div class="form-group input-group">
							<svg width="1em" height="1em"> </svg>
							<input name="consulta" id="txt_consulta" placeholder="Pesquisar" type="text" class="form-control">
						</div>
							<tr>
								<td>Data</td>
								<td>Cliente</td>
								<td>Funcionário</td>
								<td>Serviço</td>
								<td>Status</td>
								<td>Preço</td>
							</tr>
							<?php
							include "../conexao.php";							
							$lista = mysqli_query($conn, "SELECT * FROM view_agenda where data_agenda between date_add(current_date(), interval -365 day) and current_date() order by data_agenda, horario_inicio");
								 while($coluna = mysqli_fetch_array($lista)) {
								 $cliente = $coluna['nome_cliente'];
								 $servico = $coluna['tipo_servico'];
								 $funcionario = $coluna['nome_funcionario'];
								 $status = $coluna['status_agenda'];
								 $data = $coluna['data_agenda'];
								 $data = date("d/m/Y",strtotime($data));
								 $preco = $coluna['valor_ganho'];
								echo"
								<tr>
									<td>$data</td>
									<td>$cliente</td>
									<td>$funcionario</td>
									<td>$servico</td>
									<td>$status</td>
									<td>$preco</td>
								</tr>";
								}

							?>
						</table>	
					</div>
				</section>
			</div>

			<div id="registros_desativados" class="hidden"> 
				<section>
					<div class="banner">
						<div class="titu"> <b> REGISTRO DESATIVADOS </b> </div>
					</div>
					<div class="agenda">
					<table id="tabela" class="table table-dark table-hover">
						<div class="form-group input-group">
							<svg width="1em" height="1em"> </svg>
							<input name="consulta" id="txt_consulta" placeholder="Pesquisar" type="text" class="form-control">
						</div>
							<tr>
								<td>Data</td>
								<td>Cliente</td>
								<td>Funcionário</td>
								<td>Serviço</td>
								<td>Status</td>
								<td>Preço</td>
							</tr>
							<?php
							include "../conexao.php";							
							$lista = mysqli_query($conn, "SELECT * FROM view_agenda where data_agenda < date_add(current_date(), interval -365 day) order by data_agenda, horario_inicio");
								 while($coluna = mysqli_fetch_array($lista)) {
								 $cliente = $coluna['nome_cliente'];
								 $servico = $coluna['tipo_servico'];
								 $funcionario = $coluna['nome_funcionario'];
								 $status = $coluna['status_agenda'];
								 $data = $coluna['data_agenda'];								 
								 $data = date("d/m/Y",strtotime($data));
								 $preco = $coluna['valor_ganho'];
								echo"
								<tr>
									<td>$data</td>
									<td>$cliente</td>
									<td>$funcionario</td>
									<td>$servico</td>
									<td>$status</td>
									<td>$preco</td>
								</tr>";
								}
							?>
						</table>	
				</section>
			</div>
		</div>
    </body>
</html>