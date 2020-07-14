<?php
if(!isset($_SESSION)) session_start(); 

if(!isset($_SESSION['usuarioId'])AND !isset($_SESSION['usuarioEmail'])AND !isset($_SESSION['telefone_celular'])){
	session_destroy();
	header("location:../login/login.php");
	exit;
}
?>

<!doctype html>
<html lang="pt-br"> 
	<head>
		<meta charset="utf-8" />
		<title>Alterar Dados</title>
		<link rel="stylesheet" href="alterar.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="cadastro.js"></script>
	</head> 
	<body>
		<div class="container-fluid">
			<?php
			include"../conexao.php";
			$id =$_GET["id"];
			$dados= mysqli_query($conn, "SELECT * FROM cliente where id_cliente= $id");
			
				while($coluna = mysqli_fetch_array($dados)){ 
					$id = $coluna['id_cliente'];
					$nome = $coluna['nome_cliente'];
					$email = $coluna['email_cliente'];
					$fixo= $coluna['telefone_fixo_cliente'];
					$celular= $coluna['telefone_celular_cliente'];
					$status= $coluna['status_cliente'];
					$id_endereco = $coluna['id_endereco'];
				}

			$dados_end= mysqli_query($conn, "SELECT * FROM endereco where id_endereco= $id_endereco");
				while($coluna = mysqli_fetch_array($dados_end)){ 
					$id_endereco = $coluna['id_endereco'];
					$cep = $coluna['cep'];
					$rua = $coluna['rua'];
					$numero = $coluna['numero'];
					$complemento = $coluna['complemento'];
					$bairro = $coluna['bairro'];
					$cidade = $coluna['cidade'];
					$estado = $coluna['estado'];
				}
			?>
			<h1> Altere os dados </h1>
			<form enctype="multipart/form-data" action="salvaralteracao.php?id_cliente=$id" name="form" method="POST" class="form-group"> 
					<div class="formulario_cliente">
						<input name="id" type="hidden" value='<?php echo"$id"?>'>	
						<label> Nome: 		</label>    <input input name="nome" type="text"  value='<?php echo"$nome"?>'		class="form-control form-control-sm" required>
						<label> Tel.Fixo: 	</label>	<input name="fixo"		 type="text"  value='<?php echo"$fixo"?>'		class="form-control form-control-sm"> 
						<label> Tel.Cel: 	</label>	<input name="celular"	 type="text"  value='<?php echo"$celular"?>'	class="form-control form-control-sm" required> 
						<label> Email: 		</label>  	<input name="email"	     type="email" value='<?php echo"$email"?>'		class="form-control form-control-sm"> 
						<input name="status" type="hidden" value='<?php echo"$status"?>'>
						<input name="id_endereco" type="hidden" value='<?php echo"$id_endereco"?>'>	
					</div>

					<div class="formulario_endereco">
								<div class="form-row">
									<div class="col">
										<label> CEP	</label>  <input id="cep" name="cep" type="text"  class="form-control form-control-sm" value='<?php echo"$cep"?>' onClick="completaEndereco()"/>
									</div>
								</div>

								<div class="form-row">
									<div class="col">
										<label>Número	</label>  <input id="numero" 	type="number" name="numero"	class="form-control form-control-sm" value='<?php echo"$numero"?>'>
									</div>
									<div class="col">	
										<label class="label">Complemento	</label>  <input id="complemento" name="complemento" type="text" class="form-control form-control-sm" value='<?php echo"$complemento"?>'>
									</div>
								</div>

								<div class="form-row">
									<div class="col">
										<label>Rua		</label> <input id="logradouro"  type="text" name="rua"		class="form-control form-control-sm" value='<?php echo"$rua"?>'> 
									</div>
									<div class="col">
										<label class="label">Bairro	</label> <input id="bairro" 	 type="text" name="bairro"  class="form-control form-control-sm" value='<?php echo"$bairro"?>'>
									</div>
								</div>

								<div class="form-row">	
									<div class="col">	
										<label for="cidade">Cidade	</label> <input id="cidade"		 type="text" name="cidade"  class="form-control form-control-sm" value='<?php echo"$cidade"?>'>
									</div>	
									<div class="col">
										<label for="uf">Estado</label>
										<br>
										<select id="uf" name="estado" class="form-control form-control-sm">
											<option value='<?php echo"$estado"?>'><?php echo"$estado"?></option>
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
						<a><input type="submit" value="alterar"  class="btn"/></a>
						<a href="cadastro.php" class="btn"> Voltar </a>
			</form>
		</div>
	</body>
</html>