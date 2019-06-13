   <?php

//include('connection.php');

class ClassCrud{

  #atributos:
  private $Crud;
  private $Contador;
  private $Resultado;



  #prep das decl
  private function preparedStatements($Query, $Tipos, $Parametros)
  { 
    $this->countParameters($Parametros);
    $this->Crud = $conn->prepare($Query);

    if($this->Contador > 0){
      $CallParametros = array();
      foreach($Parametros as $Key => $Parametro){
        $CallParametros[$Key] = &$Parametros[$Key]; 
      }
      array_unshift($CallParametros, $Tipos);
      call_user_func_array(array($this->Crud, 'bind_param'), $CallParametros);
    }

    $this->Crud->execute();
    $this->Resultado = $this->Crud->get_result();
  }

  private function countParameters($Parametros)
  {
    $this->Contador = count($Parametros);
  }

  #insercao no bd
  public function insertDB($Tabela, $Condicoes, $Tipos, $Parametros){
    $this->preparedStatements("insert into {$Tabela} values ({$Condicoes})", $Tipos, $Parametros);
    return $this->Crud;  
  }
}


?>
