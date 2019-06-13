<?php 
    
    

    if(isset($_POST["input-dia1"]) && isset($_POST["input-mes1"]) && isset($_POST["input-ano1"])
        && isset($_POST["input-dia2"]) && isset($_POST["input-mes2"]) && isset($_POST["input-ano2"])
        && isset($_POST["input-moeda1"]) && isset($_POST["input-moeda2"])){
            $flag = 1;
            $urlRequest = 'https://api.exchangeratesapi.io/history?start_at='.urlencode($_POST["input-ano1"]).'-'.urlencode($_POST["input-mes1"]).'-'.urlencode($_POST["input-dia1"]).'&end_at='.urlencode($_POST["input-ano2"]).'-'.urlencode($_POST["input-mes2"]).'-'.urlencode($_POST["input-dia2"]).'&symbols='.urlencode($_POST["input-moeda2"]).'&base='.urlencode($_POST["input-moeda1"]);
            $jsonData = file_get_contents($urlRequest);
            $jsonData = json_decode($jsonData, true);
    }else{
        $flag = 0;
        $jsonData = 0;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <?php
    
            
        if($flag == 1){
        
            $keys[] = array_keys($jsonData["rates"]);
            $values[] = array_values($jsonData["rates"]);
            $n = count($keys[0]);
            $labels = [];
            $data = [];

            for($i = 0; $i < $n; $i = $i + 1){
                array_push($labels, $keys[0][$i]);
                array_push($data, $values[0][$i]);
                $data[$i] = implode(" ", $data[$i]);
            }
            
            $data = array_map('floatval', $data);
           /* var_dump($data);
            print_r("\n");
            print_r("\n");
            var_dump($labels);  */


        }
    ?>

    


</body>
</html>