<?php
    session_start(); 
        //Incluindo a conexão com banco de dados   
    include_once("../conexao.php");    
    //O campo usuário e senha preenchido entra no if para validar
    if((isset($_POST['email'])) && (isset($_POST['senha']))){
        $usuario = mysqli_real_escape_string($conn, $_POST['email']); //Escapar de caracteres especiais, como aspas, prevenindo SQL injection
        $senha = mysqli_real_escape_string($conn, $_POST['senha']);
        $senha = "$senha";
            
        //Buscar na tabela usuario o usuário que corresponde com os dados digitado no formulário
        $result_usuario = "SELECT * FROM funcionario WHERE email_funcionario = '$usuario' && senha = '$senha' LIMIT 1";
        $resultado_usuario = mysqli_query($conn, $result_usuario);
        $resultado = mysqli_fetch_assoc($resultado_usuario);
        
        //Encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        if(isset($resultado)){
            $_SESSION['usuarioId'] = $resultado['id_funcionario'];
            $_SESSION['usuarioNome'] = $resultado['nome_funcionario'];
            $_SESSION['telefone_fixo'] = $resultado['telefone_fixo_funcionario'];
            $_SESSION['telefone_celular'] = $resultado['telefone_celular_funcionario'];
            $_SESSION['usuarioEmail'] = $resultado['email_funcionario'];
            if($_SESSION['usuarioEmail'] == $usuario){
                if($usuario == "admin@admin" && $senha == "admin"){
                    header("Location:admin.php");
                }
                else{
                    header("Location:../agenda/agenda.php");
                }
            }
        //Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
        //redireciona o usuario para a página de login
        }else{    
            //Váriavel global recebendo a mensagem de erro
            $_SESSION['loginErro'] = "Usuário ou senha Inválido";
            header("Location:login.php");
        }
    //O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
    }else{
        $_SESSION['loginErro'] = "Usuário ou senha inválido";
        header("Location:login.php");
    }
?>