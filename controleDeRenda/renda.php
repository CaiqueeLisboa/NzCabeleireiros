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
        <link rel="stylesheet" href="./renda.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript" src="renda.js"></script>
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
						<a class="nav-item nav-link active" href="../historico/historico.php">Histórico de Serviço </a>
						<a class="nav-item nav-link active" href="renda.php">Controle de Renda </a>
						<a class="nav-item nav-link active" href="../sair.php">Sair do sistema</a>
					</div>
					</div>
			  </nav>
			</header>

			<section>
				<div class="banner">
					<div class="titu"> <b> Controle de Renda </b> </div>
				</div>
				<div class="graficos">
					<div id="servico" class="card">
						<div class="card-body">
							<div class="card-header"> <b> Grafico de serviços prestados </b> </div>
							<div id="piechart_service" class="piechart"></div>
							<?php
								include "../conexao.php";							
								$lista = mysqli_query($conn, "SELECT tipo_servico FROM view_agenda where data_agenda between date_add(current_date(), interval -365 day) and current_date()");
									$conta_corte = 0;
									$conta_manicure = 0;
									$conta_progressiva = 0;
									$conta_depilacao = 0;
									while($coluna = mysqli_fetch_array($lista)) {
										if($coluna['tipo_servico'] == 'Corte'){
											$conta_corte++;
										}
										else if($coluna['tipo_servico'] == 'Manicure'){
											$conta_manicure++;
										}
										else if($coluna['tipo_servico'] == 'progressiva'){
											$conta_progressiva++;
										}
										else{
											$conta_depilacao++;
										}									
									}
							?>
						</div>
					</div>

					<div id="funcionario" class="card">
						<div class="card-body">
							<div class="card-header"> <b> Grafico de funcionários </b> </div>
							<div id="piechart_funcionario" class="piechart"></div>
							<?php
								include "../conexao.php";							
								$lista = mysqli_query($conn, "SELECT nome_funcionario FROM view_agenda where data_agenda between date_add(current_date(), interval -365 day) and current_date()");
									$conta_caique = 0;
									$conta_nath = 0;
									$conta_outro = 0;

									while($coluna = mysqli_fetch_array($lista)) {
										if($coluna['nome_funcionario'] == 'Caique'){
											$conta_caique++;
										}
										else if($coluna['nome_funcionario'] == 'Nath'){
											$conta_nath++;
										}
										else{
											$conta_outro++;
										}									
									}
							?>
						</div>
					</div>

					<div id="status" class="card">
						<div class="card-body">
							<div class="card-header"> <b> Grafico de Comparecimento </b> </div>
							<div id="piechart_status" class="piechart"></div>
							<?php
								include "../conexao.php";							
								$lista = mysqli_query($conn, "SELECT status_agenda FROM view_agenda where data_agenda between date_add(current_date(), interval -365 day) and current_date()");
									$conta_compareceu = 0;
									$conta_pendente = 0;
									$conta_nao_compareceu = 0;

									while($coluna = mysqli_fetch_array($lista)) {
										if($coluna['status_agenda'] == 'Compareceu'){
											$conta_compareceu++;
										}
										else if($coluna['status_agenda'] == 'Pendente'){
											$conta_pendente++;
										}
										else{
											$conta_nao_compareceu++;
										}									
									}
							?>
						</div>
					</div>
				</div>
				<table class="table table-danger">
					<thead class="thead-dark">
							<tr>
								<th>DATA</th>
								<th>STATUS</th>
								<th>VALOR</th>
							</tr>
					</thead>
							<?php
							include "../conexao.php";							
							$lista = mysqli_query($conn, "SELECT data_ganho, status_ganho, valor_ganho FROM ganho where data_ganho between date_add(current_date(), interval -365 day) and current_date()");
								 while($coluna = mysqli_fetch_array($lista)) {
								 $data = $coluna['data_ganho'];
								 $status = $coluna['status_ganho'];
								 $valor = $coluna['valor_ganho'];

								echo"
								<tr>
									<td>$data</td>
									<td>$status</td>
									<td>$valor R$</td>
								</tr>";
								}

								echo"
								<thead class='thead-dark'>
									<tr>
										<th>FUNCIONÁRIO</th>
										<th colspan='2'>VALOR TOTAL</th>
									</tr>
								</thead>";
								$lista = mysqli_query($conn, "SELECT view_agenda.nome_funcionario, sum(view_agenda.valor_ganho) AS total_funcionario FROM view_agenda WHERE view_agenda.status_agenda = 'Compareceu' GROUP BY view_agenda.nome_funcionario;");
								while($coluna = mysqli_fetch_array($lista)) {
									$total_funcionario = $coluna['total_funcionario'];
									$nome_funcionario = $coluna['nome_funcionario'];
								echo"
									<tr>	
										<td> $nome_funcionario</td>
										<td> Valor Total Funcionário </td> 
										<td> $total_funcionario R$ </td> 
									</tr> ";
								}

								$lista = mysqli_query($conn, "SELECT SUM(valor_ganho) AS total FROM ganho where data_ganho between date_add(current_date(), interval -365 day) and CURRENT_DATE() AND status_ganho = 'pago'");
								while($coluna = mysqli_fetch_array($lista)) {
									$total = $coluna['total'];
								echo"
									<thead class='thead-dark'>
										<tr>
											<th colspan='2'> Valor Total Salão</th> 
											<th> $total R$ </th> 
										</tr>
									</thead>";
								}
							?>
				</table>
			</section>
		</div>
    </body>

	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {

			var data = google.visualization.arrayToDataTable([
			['Serviço', 'vezes que foi feito'],
			['Corte',     		<?php echo"$conta_corte"?>],
			['Manicure',     	<?php echo"$conta_manicure"?>],
			['Progressiva',  	<?php echo"$conta_progressiva"?>],
			['Depilação', 		<?php echo"$conta_depilacao"?>],
			]);

			var options = {
			title: ''
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_service'));

			chart.draw(data, options);
		}
	</script>

	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
			['Funcionario', 'vezes que trabalhou'],
			['Caique',     		<?php echo"$conta_caique"?>],
			['Nath',     		<?php echo"$conta_nath"?>],
			['Outro',  			<?php echo"$conta_outro"?>],
			]);

			var options = {
				title: ''
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_funcionario'));

			chart.draw(data, options);
			}
	</script>

	<script type="text/javascript">
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);

		function drawChart() {
			var data = google.visualization.arrayToDataTable([
				['Status', '$ de clientes que comparecem'],
				['Compareceu',     		<?php echo"$conta_compareceu"?>],
				['Pendente',     		<?php echo"$conta_pendente"?>],
				['Não Compareceu',  	<?php echo"$conta_nao_compareceu"?>],
			]);
			
			var options = {
				title: ''
			};

			var chart = new google.visualization.PieChart(document.getElementById('piechart_status'));
			chart.draw(data, options);
			}
	</script>
</html>