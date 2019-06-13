<?php
include("connection.php");
include("Variables.php");



function insertDB($Tabela, $Condicoes, $Tipos, $Parametros)
    { 
      global $conn;
      //  var_dump($conn);

      $count = count($Parametros);
      $query = "INSERT INTO {$Tabela} VALUES ({$Condicoes})";
      $Crud = $conn->prepare($query);
  
      if($count > 0){
        $CallParametros = array();
        foreach($Parametros as $Key => $Parametro){
          $CallParametros[$Key] = &$Parametros[$Key]; 
        }
        array_unshift($CallParametros, $Tipos);
        call_user_func_array(array($Crud, 'bind_param'), $CallParametros);
      }
  
      $Crud->execute();
      return $Crud->get_result();
    }


  
  if($status ==   true){
    
    $query = "UPDATE endereco SET endereco_id = '$end_id', cpf_fk = '$cpf', rua = '$endereco', numero = '$numero', bairro = '$bairro', cep = '$cep', cidade = '$cidade', pais = '$pais', estado = '$estado' WHERE cpf_fk = '$cpf'";
    $Crud=$conn->prepare($query);
    $Crud->execute();

  }

  $insert = insertDB(
    "compra",
    "?,?,?,?,?,?,?,?,?",
    "isdssiiss",
    array(
      '',
      $cpf,
      $valor,
      $entrega,
      $forma_pgto,
      $moeda_usada,
      $moeda_comprada,
      $date,
      $status,

  ));

  echo $insert;
  



?>