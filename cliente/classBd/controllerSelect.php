<?php

include("ClassCrud.php");
include("Variables.php");

$Crud = new ClassCrud();

$BFetch=$Crud->selectDB(
  "*",
  "endereco",
  "",
  "",
  array()
);

while($Result=$BFetch->fetch_all()){
  foreach($Result as $Fetch){
    var_dump($Fetch);
  }

}



?>