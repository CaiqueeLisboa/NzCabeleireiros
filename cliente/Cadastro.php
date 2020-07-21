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
        <link rel="stylesheet" href="cadastro.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script type="text/javascript" src="../services.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.quicksearch/2.3.1/jquery.quicksearch.js"></script>
		<script type="text/javascript" src="cadastro.js"></script>
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
								<a class="nav-item nav-link active" href="cadastro.php">Controle de Cadastros</a>
								<a class="nav-item nav-link active" href="../historico/historico.php">Histórico de Serviço </a>
								<a class="nav-item nav-link active" href="../controleDeRenda/renda.php">Controle de Renda </a>
								<a class="nav-item nav-link active" href="../sair.php">Sair do sistema</a>
					</div>
					</div>
				</nav>
			</header>
				
			<aside class="sidebar">
					<div class="header"> Controle de Cadastros </div>
					<div class="left_menu">
						<div class="menuIcon">
							<img src="../img/iconCadastrarCliente.png" style="filter:invert(100)" class="icon"> 
						</div>
						<div class="menuText">
							<input type="button" value="Cadastrar Cliente" onClick="MostrarButton('cadastrar_clientes', 'editar_cliente', 'clientes_desativados', 'cadastrar_funcionario')" class="btn btn-danger btn-sm"/>
						</div>
					</div>

					<div class="left_menu">
						<div class="menuIcon">
							<img src="../img/iconCadastrarFuncionario.png" style="filter:invert(100)" class="icon"> 
						</div>
						<div class="menuText">
							<input type="button" value="Cadastrar Funcionário" onClick="MostrarButton('cadastrar_funcionario', 'clientes_desativados', 'cadastrar_clientes', 'editar_cliente')" class="btn btn-danger btn-sm"/>
						</div>
					</div>

					<div class="left_menu">
						<div class="menuIcon">
							<img src="../img/iconEditarCliente.png" style="filter:invert(100)" class="icon"> 
						</div>
						<div class="menuText">
							<input type="button" value="Editar Cliente" onClick="MostrarButton('editar_cliente', 'cadastrar_clientes', 'clientes_desativados', 'cadastrar_funcionario')" class="btn btn-danger btn-sm"/>
						</div>
					</div>

					<div class="left_menu">
						<div class="menuIcon">
							<img src="../img/iconClienteDesativado.png" style="filter:invert(100)" class="icon"> 
						</div>
						<div class="menuText">
							<input type="button" value="Clientes Desativados" onClick="MostrarButton('clientes_desativados', 'cadastrar_clientes', 'editar_cliente', 'cadastrar_funcionario')" class="btn btn-danger btn-sm"/>
						</div>
					</div>
			</aside>
				
			<div id="cadastrar_clientes" class="hidden">
					<section>
						<div class="banner">
							<div class="titu"> <b> Cadastrar Cliente </b> </div>
						</div>

						<div class="formulario">
						<form class="formulario" name="cadastrarCliente" action="salvaCliente.php" method="post" onSubmit="return validarFormCliente()">
								<div class="infopessoa">
									<div class="form-row">
										<div class="col">
											<label> Nome* </label>	<input name="nome"	type="text" required>	
										</div>
									</div>

									<div class="form-row">
										<div class="col">
											<label class="label"> Telefone celular*	</label> <input name="celular"	type="number" required> 
										</div>
										<div class="col">
											<label> Telefone Fixo 	</label> <input name="fixo"	type="number"> 
										</div>
									</div>

									<div class="form-row">
										<div class="col">
											<label> Email*	</label> <input name="email" type="email" required> 
										</div>
									</div>
								</div>
							<br>

							<div class="infoendereco">
								<div class="form-row">
									<div class="col">
										<label> CEP	</label>  <input id="cep" 		  name="cep" 		 type="text"  class="cep" onClick="completaEndereco()"/>
									</div>
								</div>

								<div class="form-row">
									<div class="col">
										<label>Número	</label>  <input id="numero" 	type="number" name="numero"	class="numero">
									</div>
									<div class="col">	
										<label class="label">Complemento	</label>  <input id="complemento" name="complemento" type="text" class="complemento">
									</div>
								</div>

								<div class="form-row">
									<div class="col">
										<label>Rua		</label> <input id="logradouro"  type="text" name="rua"		class="rua">
									</div>
									<div class="col">
										<label class="label">Bairro	</label> <input id="bairro" 	 type="text" name="bairro"  class="bairro">
									</div>
								</div>

								<div class="form-row">	
									<div class="col">	
										<label for="cidade">Cidade	</label> <input id="cidade"		 type="text" name="cidade"  class="cidade">
									</div>	
									<div class="col">
										<label for="uf">Estado</label>
										<br>
										<select id="uf" name="estado" class="estado">
											<option value="AC">Acre</option>
											<option value="AL">Alagoas</option>
											<option value="AP">Amapá</option>
											<option value="AM">Amazonas</option>
											<option value="BA">Bahia</option>
											<option value="CE">Ceará</option>
											<option value="DF">Distrito Federal</option>
											<option value="ES">Espírito Santo</option>
											<option value="GO">Goiás</option>
											<option value="MA">Maranhão</option>
											<option value="MT">Mato Grosso</option>
											<option value="MS">Mato Grosso do Sul</option>
											<option value="MG">Minas Gerais</option>
											<option value="PA">Pará</option>
											<option value="PB">Paraíba</option>
											<option value="PR">Paraná</option>
											<option value="PE">Pernambuco</option>
											<option value="PI">Piauí</option>
											<option value="RJ">Rio de Janeiro</option>
											<option value="RN">Rio Grande do Norte</option>
											<option value="RS">Rio Grande do Sul</option>
											<option value="RO">Rondônia</option>
											<option value="RR">Roraima</option>
											<option value="SC">Santa Catarina</option>
											<option value="SP">São Paulo</option>
											<option value="SE">Sergipe</option>
											<option value="TO">Tocantins</option>
										</select>
									</div>
								</div>
							</div>
							<a><input type="submit" value="Cadastrar"	 	class="btn-2"/></a>
							<a><input type="reset" 	value="Limpar"	 	class="btn-2"/></a>
						</form>
					</section>
			</div>

			<div id="cadastrar_funcionario" class="hidden">
					<section>
						<div class="banner">
							<div class="titu"> <b> Cadastrar Funcionário </b> </div>
						</div>
							<form class="formulario" name="cadastrarFuncionario" action="salvaFuncionario.php" method="post" onSubmit="return validarFormFuncionario()">
							<div class="infopessoa">
									<div class="form-row">
										<div class="col">
											<label> Nome* </label>	<input name="nome"	type="text" required>	
										</div>
									</div>

									<div class="form-row">
										<div class="col">
											<label class="label"> Telefone celular*	</label> <input name="celular"	type="number" required> 
										</div>
										<div class="col">
											<label> Telefone Fixo 	</label> <input name="fixo"	type="number"> 
										</div>
									</div>

									<div class="form-row">
										<div class="col">
											<label> Email*	</label> <input name="email" type="email" required> 
										</div>
										<div class="col">
											<label> Senha*	</label> <input name="senha" type="password" required> 
										</div>
									</div>
								</div>
							<a><input type="submit" value="Cadastrar"	 	class="btn-2"/></a>
							<a><input type="reset" 	value="Limpar"	 	class="btn-2"/></a>
							</form>
					</section>
			</div>
				
			<div id="editar_cliente" class="hidden">
					<section>
						<div class="banner">
							<div class="titu"> <b> Editar Cliente </b> </div>
						</div>
					<?php
						include "../conexao.php";
						$lista = mysqli_query($conn, "SELECT * FROM cliente where status_cliente='Ativo'");
					?>
						<table id="tabela" class="table table-dark table-hover">
							<div class="form-group input-group">
								<svg width="1em" height="1em"> </svg>
								<input name="consulta" id="txt_consulta" placeholder="Pesquisar" type="text" class="form-control">
							</div>
								<tr>
									<td>Id</td>
									<td>Nome</td>
									<td>Email</td>
									<td>Telefone Fixo</td>
									<td>Telefone Celular</td>
									<td>Status</td>
									<td>Alterar</td>
									<td>Desativar</td>
								</tr>
							<?php 
							while($coluna = mysqli_fetch_array($lista)) {
								$id = $coluna['id_cliente'];
								$nome = $coluna['nome_cliente'];
								$email = $coluna['email_cliente'];
								$fixo= $coluna['telefone_fixo_cliente'];
								$celular= $coluna['telefone_celular_cliente'];
								$status= $coluna['status_cliente'];
								echo"
								<tr>
									<td>$id</td>
									<td>$nome</td>
									<td>$email</td>
									<td>$fixo</td>
									<td>$celular</td>
									<td>$status</td>
									<td><a href=\"alterar.php?id=$id\">  ALTERAR  </a></td>
									<td><a href=\"alterarStatus.php?id=$id\">  DESATIVAR </a></td>
								</tr>";
								}
							?>
							</table>
					</section>
			</div>
					
			<div id="clientes_desativados" class="hidden"> 	
					<section>
						<div class="banner">
							<div class="titu"> <b> Clientes Desativados </b> </div>
						</div>
						<?php
						include "../conexao.php";
						$lista = mysqli_query($conn, "SELECT * FROM cliente where status_cliente='inativo'");
					?>
						<table id="tabela" class="table table-dark table-hover">
							<div class="form-group input-group">
								<svg width="1em" height="1em"> </svg>
								<input name="consulta" id="txt_consulta" placeholder="Pesquisar" type="text" class="form-control">
							</div>
								<tr>
									<td>Id</td>
									<td>Nome</td>
									<td>Email</td>
									<td>Telefone Fixo</td>
									<td>Telefone Celular</td>
									<td>Status</td>
									<td>Alterar</td>
									<td>Desativar</td>
								</tr>
							<?php 
							while($coluna = mysqli_fetch_array($lista)) {
								$id = $coluna['id_cliente'];
								$nome = $coluna['nome_cliente'];
								$email = $coluna['email_cliente'];
								$fixo= $coluna['telefone_fixo_cliente'];
								$celular= $coluna['telefone_celular_cliente'];
								$status= $coluna['status_cliente'];
								echo"
								<tr>
									<td>$id</td>
									<td>$nome</td>
									<td>$email</td>
									<td>$fixo</td>
									<td>$celular</td>
									<td>$status</td>
									<td><a href=\"alterar.php?id=$id\">  ALTERAR  </a></td>
									<td><a href=\"alterarStatus.php?id=$id\">  ATIVAR </a></td>
								</tr>";
								}
							?>
							</table>
					</section>
			</div>	
		</div>	
    </body>
</html>