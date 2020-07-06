function validarForm(){
    var nome = document.agendarhorario.nome.value; //recebo o valor do campo nome do formulario "agendarhorario"
    var fixo = document.agendarhorario.fixo.value; //recebo o valor do campo fixo do formulario "agendarhorario"
    var celular = document.agendarhorario.celular.value; //recebo o valor do campo celular do formulario "agendarhorario"
    var servico = document.agendarhorario.servico.value; //recebo o valor do campo servico do formulario "agendarhorario"
    var dataAgenda = document.agendarhorario.data.value; //recebo o valor do campo data do formulario "agendarhorario"
    var horario_inicio = document.agendarhorario.hora.value; //recebo o valor do campo hora do formulario "agendarhorario"
    var horario_termino = document.agendarhorario.hora_term.value; //recebo o valor do campo hora_term do formulario "agendarhorario"
    var funcionario = document.agendarhorario.func.value; //recebo o valor do campo func do formulario "agendarhorario"
    var valor = document.agendarhorario.valor.value; //recebo o valor do campo valor do formulario "agendarhorario"
    var dataCurrente = new Date(); //recebo a data atual na variavel dataCurrent

    function retornaData(data){ //funcao retornaData que recebe uma data como parametro
        if(!data){ //se o formato da data estiver correto
            return data; //retorno a data 
        }
        split = data.split('-'); //separo as informações da data que estão separadas por um - em um array
        return new Date( split[1] + "/" +split[2]+"/"+split[0] + " " + horario_inicio + ":00"); //retorno
        // a nova data organizando o array da forma correta e adiciono o horário do formulario com 00 segundos
    }

    //if para verificar se todos os campos foram preenchidos
    if(nome == '' || fixo == '' || celular == '' || servico == '' || dataAgenda == '' || 
    horario_inicio == '' || horario_termino == '' || funcionario == '' || valor == ''){
        //alert que exibe na tela para o usuário
        alert("Informe todos os campos");
        //retorno em falso para o formulário não ser enviado para o backend
        return false;
    }else{
        //if para verificar se o usuario não escreveu um telefone inválido
        if(celular.length >= 12 || fixo.length >= 12 || fixo.length < 8 || celular.length < 9){
            //alert que exibe na tela para o usuário
            alert("O telefone deve possuir no minimo 8 carateres e no máximo 12 caracteres");
            //retorno em falso para o formulário não ser enviado para o backend
            return false;
        }else{
            //if para verificar se a data do formulário é menor que a data atual
            //a função getTime retorna o horário em milisegundos para podermos fazer a comparação
            if(retornaData(dataAgenda).getTime() < dataCurrente.getTime()){
                //alert que exibe na tela para o usuário
                alert("A data informada já passou, informe uma data válida");
                //retorno em falso para o formulário não ser enviado para o backend
                return false;
            }else{
                //if para verificar se o horario que o serviço irá terminar não é menor que o horário que o serviço
                //irá iniciar
                if(horario_termino <= horario_inicio){
                    //alert que exibe na tela para o usuário
                    alert("O horário de término é inválido, informe um horário válido");
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
}

function salvarServico(){
    //inicio minha conexão ajax e passo seus parametros
    $.ajax({
        //url que o ajax irá atuar
        url: 'criarServico.php',
        //tipo de dado que o ajax vai retornar
        dataType: 'html',
        //tipo de verbo http o ajax irá utilizar para enviar a requisição
        type: 'POST',
        //valor que o ajax irá enviar
        data:{
            //atribuo a variavel tipoServico o valor do meu campo com id = "servico"
            tipoServico:$("#servico").val()
        },
        //apos enviar executa a função
        beforeSend: function(){
            //atribuo a minha div de id "mensagem" uma mensagem de Enviado.
            $("#mensagem").html("Enviado");
        }
    });
}

//Assim que o documento carrega, carrega junto a função
$(document).ready(function(){
    //quando o input do name "nome" perder o foco a função blur ativa e chama o resto do código
    $("input[name='nome']").blur(function(){
        //as variaveis tel_cel e tel_fixo são relacionadas aos inputs 
        var $tel_cel = $("input[name='celular']");
        var $tel_fixo = $("input[name='fixo']");
        //via o metodo Get Json do ajax eu envio para a url "PesquisaTel.php" os valores
        $.getJSON('PesquisaTel.php', {
            //envio o input do name "nome" e seu valor para o php
            nome: $ (this).val()
            //a função me retorna a resposta do php em formato JSon
        }, function(json){
            //atribuo nas variaveis os valores vindo do json e consequentemente atribuo aos inputs que estão ligadas.
            $tel_cel.val(json.tel_cel);
            $tel_fixo.val(json.tel_fixo);
        });
    });
});