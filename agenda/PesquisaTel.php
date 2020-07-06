<?php
    //incluo minha conexão com o banco de dados
    include "../conexao.php";

    //crio uma funnção que recebe como parametro o nome do formulario e a minha conexão com o banco
    function retorna($nome, $conn){
        //crio uma variavel que recebe meu select no banco de dados com limite de 1 linha
        $result_telefone = "SELECT telefone_celular_cliente, telefone_fixo_cliente from cliente where nome_cliente = '$nome' LIMIT 1";
       //executo a query com a variavel de conexão ao banco e a variavel com o select
        $resultado_telefone = mysqli_query($conn, $result_telefone);
        //se o meu select retornar valor executo o if
        if($resultado_telefone->num_rows){
            //pego os campos que o select retornou e separo no array chamado "row_telefone"
            $row_telefone = mysqli_fetch_assoc($resultado_telefone);
            //coloco em um array chamado "telefones" com os campos tel_cel = valor do telefone celular no banco
            //e tel_fixo = valor do telefone fixo no banco
            $telefones['tel_cel'] = $row_telefone['telefone_celular_cliente'];
            $telefones['tel_fixo'] = $row_telefone['telefone_fixo_cliente'];
        //se meu select não retornar nenhum valor executo o else
        }else{
            //o array telefones recebe tel_cel = 000000000 que significa que não existe cliente com esse numero
            $telefones['tel_cel'] = '000000000';
        }
        //minha função retorna o array telefones
        return json_encode($telefones);
    }

    //se existir uma requisição get com nome executo o if
    if(isset($_GET['nome'])){
        // faço um echo no valor retornado da função retorna e passo como parametro o nome que recebo do formulario
        // e a variavel de conexão com o banco.
        echo retorna($_GET['nome'], $conn);
    }
?>