function validarFormCliente(){
	var nome = document.cadastrarCliente.nome.value; //recebo o valor do campo nome do formulario "cadastrarCliente"
	var email = document.cadastrarCliente.email.value;  //recebo o valor do campo email do formulario "cadastrarCliente"
	var fixo = document.cadastrarCliente.fixo.value; //recebo o valor do campo fixo do formulario "cadastrarCliente"
	var celular = document.cadastrarCliente.celular.value; //recebo o valor do campo celular do formulario "cadastrarCliente"

  //if para verificar se todos os campos foram preenchidos
	if(nome == '' || celular == '' || email == ''){
		//alert que exibe na tela para o usuário
		alert("Informe todos os campos");
		//retorno em falso para o formulário não ser enviado para o backend
		return false;
	}else{
		//if para verificar se o usuario não escreveu um telefone inválido
		if(celular.length >= 13 || fixo.length >= 13 || fixo.length < 8 || celular.length < 9){
			//alert que exibe na tela para o usuário
			alert("O telefone deve possuir no minimo 8 carateres e no máximo 12 caracteres");
			//retorno em falso para o formulário não ser enviado para o backend
			return false;
		}else{
			//alert que exibe na tela para o usuário
			alert("Formulário preenchido corretamente");
			//retorno em true para o formulário ser enviado para o backend
			return true;
		}
 	}
}

function validarFormFuncionario(){
	var nome = document.cadastrarFuncionario.nome.value; //recebo o valor do campo nome do formulario "cadastrarFuncionario"
	var senha = document.cadastrarFuncionario.senha.value; //recebo o valor do campo senha do formulario "cadastrarFuncionario"
	var email = document.cadastrarFuncionario.email.value;  //recebo o valor do campo email do formulario "cadastrarFuncionario"
	var fixo = document.cadastrarFuncionario.fixo.value; //recebo o valor do campo fixo do formulario "cadastrarFuncionario"
	var celular = document.cadastrarFuncionario.celular.value; //recebo o valor do campo celular do formulario "cadastrarFuncionario"

	//if para verificar se todos os campos foram preenchidos
	if(nome == '' || celular == '' || senha == '' || email == ''){
		//alert que exibe na tela para o usuário
		alert("Informe todos os campos");
		//retorno em falso para o formulário não ser enviado para o backend
		return false;
	}else{
		//if para verificar se o usuario não escreveu um telefone inválido
		if(celular.length >= 13 || fixo.length >= 13 || celular.length < 9){
			//alert que exibe na tela para o usuário
			alert("O telefone deve possuir no minimo 8 carateres e no máximo 12 caracteres");
			//retorno em falso para o formulário não ser enviado para o backend
			return false;
		}else{
			//if para verificar se o usuario não escreveu uma senha pequena demais
			if(senha.length < 5){
				//alert que exibe na tela para o usuário
				alert("A senha deve possuir no minimo 5 carateres");
				//retorno em falso para o formulário não ser enviado para o backend
				return false;
			}else{
				//alert que exibe na tela para o usuário
				alert("Formulário preenchido corretamente");
				//retorno em true para o formulário ser enviado para o backend
				return true;
			}
		}
	}
}

function completaEndereco(){
    $("#cep").focusout(function(){
		//Início do Comando AJAX
		$.ajax({
			//O campo URL diz o caminho de onde virá os dados
			//É importante concatenar o valor digitado no CEP
			url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
			//Aqui você deve preencher o tipo de dados que será lido,
			//no caso, estamos lendo JSON.
			dataType: 'json',
			//SUCESS é referente a função que será executada caso
			//ele consiga ler a fonte de dados com sucesso.
			//O parâmetro dentro da função se refere ao nome da variável
			//que você vai dar para ler esse objeto.
			success: function(resposta){
				//Agora basta definir os valores que você deseja preencher
				//automaticamente nos campos acima.
				$("#logradouro").val(resposta.logradouro);
				$("#complemento").val(resposta.complemento);
				$("#bairro").val(resposta.bairro);
				$("#cidade").val(resposta.localidade);
				$("#uf").val(resposta.uf);
				//Vamos incluir para que o Número seja focado automaticamente
				//melhorando a experiência do usuário
				$("#numero").focus();
			}
		});
	});
}