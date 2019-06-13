<?php

session_start();

//Conexão com o banco de dados
$conexao = mysqli_connect("localhost", "root", "", "UFSBRA_Cambio");
 
$nome           = $_POST['name'];
$cpf            = $_POST['cpf'];
$rg             = $_POST['rg'];
$pais           = $_POST['pais'];
$estado_civil   = $_POST['civil'];
$tel1           = $_POST['telefone1'];
$tel2           = $_POST['telefone2'];
$rua            = $_POST['logradouro'];
$cep            = $_POST['cep'];
$numero         = $_POST['numero'];
$bairro         = $_POST['bairro'];
$cidade         = $_POST['cidade'];
$email          = $_POST['email'];  
$nascimento     = $_POST['nascimento'];
    
//Caso as senhas sejam iguais
if($_POST['csenha'] === $_POST['senha']){

    echo "LOL";
        
    //criptografica BCRYPT de senha (MD5, BASE64 muito vulneraveis hoje em dia)
    $cripto = password_hash($_POST['senha'], PASSWORD_BCRYPT, array('cost'=>11));
    
    //Insere na tabela cliente primeiro
    $comando_sql1 = "INSERT INTO cliente(cpf, rg, data_nasc, estado_civil, nome, senha, email) VALUES ('".$cpf."', '".$rg."', '".$nascimento."', '".$estado_civil."', '".$nome."', '".$cripto."', '".$email."');";
        
    //Insere o cliente no BD
    $insereDados = mysqli_query($conexao , $comando_sql1);
    
    //Caso inseriu corretamente o cliente
    if($insereDados){

        $comando_sql4 = "INSERT INTO `endereco` (`endereco_id`, `cpf_fk`, `rua`, `numero`, `cep`, `bairro`, `cidade`, `pais`) VALUES (NULL, '".$cpf."', '".$rua."', '".$numero."', '".$cep."', '".$bairro."', '".$cidade."', '".$pais."');";
        
        //Insere o endereco no BD
        $insereDados3 = mysqli_query($conexao , $comando_sql4);
        
        //Insere na tabela contato as informaçoes referentes ao cliente
        $comando_sql3 = "INSERT INTO `contato` (`contato_id`, `cpf_fk`, `telefone`, `celular`, `email`) VALUES (NULL, '".$cpf."', '".$tel1."', '".$tel2."', '".$email."');";

        //Insere o contato no BD
        $insereDados2 = mysqli_query($conexao , $comando_sql3);
        
        $_SESSION['msg_login'] = "<h4><p style='color:green;'>Cadastro Realizado Com Sucesso</p></h4>";
        header("Location: login.php");

    } else {
        
        session_start();
        $_SESSION['msg_cadastro'] = "<h5><p style='color:red;'>Houve Um Problema Com a Conexão Com o Banco de Dados</p></h5>";
        header("Location: cadastro.php");
    }

} else {
    
    session_start();
    $_SESSION['msg_cadastro'] = "<h5><p style='color:red;'>As Senhas São Distintas</p></h5>";
    header("Location: cadastro.php");  
}
?>