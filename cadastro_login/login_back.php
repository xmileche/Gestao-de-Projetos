<?php

//Conexão com o banco de dados
$conexao = mysqli_connect("localhost", "root", "", "UFSBRA_Cambio");

//Recebe as variaveis do POST
$email  = $_POST['email'];  
$senha  = $_POST['password'];

if(isset($email) && isset($senha)){
    
    //Verifica se existe o email no banco de dados
    $sql = "SELECT * FROM `cliente` WHERE `email` = '".$email."' LIMIT 1";
    $result = $conexao->query($sql);
    $obj = $result->fetch_object();
    
    //Se foi encontrado um resultado
    if($result->num_rows > 0) {
            
        //Confere a senha criptografada com a senha colocada
        if (password_verify($senha, $obj->senha)) {
            
            session_start();
            $_SESSION['usuario_cpf'] = $obj->cpf;
            $_SESSION['usuario_nome'] = $obj->nome;
            header("Location: ../cliente/index.php");
        
        } else {
            
            session_start();
            $_SESSION['msg_login'] = "<h5><p style='color:red;'>Senha inválida, tente novamente</p></h5>";
            header("Location: login.php");
        }
    
    } else {
        
        //Verifica se existe o email no banco de dados
        $sql = "SELECT * FROM `funcionario` WHERE `email` = '".$email."' AND `senha` = 'admin123' LIMIT 1";
        $result = $conexao->query($sql);
        
        //Se foi encontrado um resultado
        if($result->num_rows > 0) {

            //Coloca todos os resultados num objeto
            $obj = $result->fetch_object();
            
            session_start();
            $_SESSION['usuario_cpf']=$obj->nome;
            $_SESSION['usuario_nome']=$obj->email;
            header("Location: ../administrativo/index.php");
        
        } else {

            session_start();
            $_SESSION['msg_login'] = "<h5><p style='color:red;'>Email inválido, tente novamente</p></h5>";
            header("Location: login.php");    
        }
    
    }
}
?>
