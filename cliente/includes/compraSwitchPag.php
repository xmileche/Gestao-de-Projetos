<?php

if (isset($_POST["Quantia"]) && isset($exchange_value)) {
      $prefixo2 = 'R$';
      switch($temp_comprada){
        case 'USD':
            $prefixo2 = 'US $';
            $num_moeda_usada = 2; 
            $full_name_usada = "United States Dollar";
            break;
        case 'JPY':
            $prefixo2 = '¥';
            $full_name_usada = "Japanese Yene";
            $num_moeda_usada = 5;
            break;
        case 'CAD':
            $prefixo2 = 'C$';
            $full_name_usada = "Canadian Dollar";
            $num_moeda_usada = 3;
            break;
        case 'GBP':
            $prefixo2 = '£';
            $full_name_usada = "Great Breatin Pound";
            $num_moeda_usada = 4;
            break;
        case 'EUR':
            $prefixo2 = '€';
            $full_name_usada = "Euro";
            $num_moeda_usada = 6;
            break;
        case 'BRL':
            $prefixo2 = 'R$';
            $full_name_usada = "Brazilian Real";
            $num_moeda_usada = 1;
            break;
        
      }
    }else{
      $num_moeda_usada = 0;
      $full_name_usada = "";
      $prefixo2 = "";
    }
?>