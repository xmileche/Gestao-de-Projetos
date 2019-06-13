<?php

#variaveis da compra:

if(isset($_POST['valor'])){
  $valor = filter_input(INPUT_POST,'valor', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['valor'])){
  $valor = filter_input(INPUT_GET,'valor', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
  $valor = "";
}


if(isset($_POST['cpf'])){
  $cpf = filter_input(INPUT_POST,'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['cpf'])){
  $cpf = filter_input(INPUT_GET,'cpf', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
  $cpf = "";
}


if(isset($_POST['entrega'])){
  $entrega = filter_input(INPUT_POST,'entrega', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['entrega'])){
  $entrega = filter_input(INPUT_GET,'entrega', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
  $entrega = "";
}

if(isset($_POST['forma_pgto'])){
  $forma_pgto = filter_input(INPUT_POST,'forma_pgto', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['forma_pgto'])){
  $forma_pgto = filter_input(INPUT_GET,'forma_pgto', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
  $forma_pgto = "";
}

if(isset($_POST['moeda_usada'])){
  $moeda_usada = filter_input(INPUT_POST,'moeda_usada', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['moeda_usada'])){
  $moeda_usada = filter_input(INPUT_GET,'moeda_usada', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
  $moeda_usada = "";
}

if(isset($_POST['moeda_comprada'])){
  $moeda_comprada = filter_input(INPUT_POST,'moeda_comprada', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['moeda_comprada'])){
  $moeda_comprada = filter_input(INPUT_GET,'moeda_comprada', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
  $moeda_comprada = "";
}

if(isset($_POST['status'])){
  $status = filter_input(INPUT_POST,'status', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['status'])){
  $status = filter_input(INPUT_GET,'status', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
  $status = "";
}

if(isset($_POST['endereco'])){
  $endereco = filter_input(INPUT_POST,'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['endereco'])){
  $endereco = filter_input(INPUT_GET,'endereco', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
  $endereco = "";
}

if(isset($_POST['bairro'])){
  $bairro = filter_input(INPUT_POST,'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['bairro'])){
  $bairro = filter_input(INPUT_GET,'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
  $bairro = "";
}

if(isset($_POST['cidade'])){
  $cidade = filter_input(INPUT_POST,'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['cidade'])){
  $cidade = filter_input(INPUT_GET,'cidade', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
  $cidade = "";
}

  if(isset($_POST['cep'])){
    $cep = filter_input(INPUT_POST,'cep', FILTER_SANITIZE_SPECIAL_CHARS);
  }elseif(isset($_GET['cep'])){
    $cep = filter_input(INPUT_GET,'cep', FILTER_SANITIZE_SPECIAL_CHARS);
  }else{
    $cep = "";
}

if(isset($_POST['estado'])){
  $estado = filter_input(INPUT_POST,'estado', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['estado'])){
  $estado = filter_input(INPUT_GET,'estado', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
  $estado = "";
}

if(isset($_POST['input_update'])){
  $input_update = filter_input(INPUT_POST,'input_update', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['input_update'])){
  $input_update = filter_input(INPUT_GET,'input_update', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
  $input_update = "";
}


if(isset($_POST['numero'])){
  $numero = filter_input(INPUT_POST,'numero', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['numero'])){
  $numero = filter_input(INPUT_GET,'numero', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
  $numero = "";
}
  

if(isset($_POST['end_id'])){
  $end_id = filter_input(INPUT_POST,'end_id', FILTER_SANITIZE_SPECIAL_CHARS);
}elseif(isset($_GET['end_id'])){
  $end_id = filter_input(INPUT_GET,'end_id', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
  $end_id = "";
}

date_default_timezone_set('America/Sao_Paulo');
$date = date('m/d/Y h:i:s a', time());
$date = date('Y-m-d H:i:s', strtotime($date));  

$pais = "Brazil"  ;

?>