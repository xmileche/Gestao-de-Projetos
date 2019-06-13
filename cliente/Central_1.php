<?php
    session_start();
    include('connection.php');
    mysqli_set_charset($conn,"utf8");

    //Recebe os dados das compras do cliente
    $sql = "SELECT compra.valor AS valor, compra.forma_pgmto AS pagamento, compra.date AS data, compra.status AS status, m1.nome AS moeda_entrada, m2.nome AS moeda_saida FROM `compra` INNER JOIN `moeda` AS m1 ON compra.moeda_usada_fk = m1.moeda_id INNER JOIN `moeda` AS m2 ON compra.moeda_comprada_fk = m2.moeda_id WHERE `cpf_fk` = '".$_SESSION['usuario_cpf']."' ORDER BY date";
    $result = $conn->query($sql);
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icons/favicon.ico">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet" />

    <title>Central de Usuário - UFSBRA Câmbio</title>

    <link href="styles/jumbotron_central.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body>    
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <img style="height: 50px" src="images/cambio.png" class="img-fluid pr-3">
        <a class="navbar-brand text-white">UFSBRA Câmbio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Página Inicial</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="compras.php">Compras</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cotacoes.php">Cotações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="informacoes.php">informações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="moedas.php">Moedas</a>
                </li>
              </ul>
              <?php
                if(isset($_SESSION['usuario_cpf'])) {
                ?>
                    <a href="../cliente/Central_1.php"><button class="btn btn-success my-2 my-sm-0 mr-sm-2" type="submit"><img src="images/central_user.png" width="30px" height="30px"> Seja Bem Vindo <b><?php echo $_SESSION['usuario_nome'] ?></b></button></a>
                    <a href="../cliente/logout.php"><button class="btn btn-danger my-1 my-sm-0" type="submit" style="height:43px;">Sair</button></a>
              <?php
                } else {   
               ?>
                    <a href="../cadastro_login/login.php"><button class="btn btn-success my-2 my-sm-0 mr-sm-2" type="submit">Login</button></a>
                    <a href="../cadastro_login/cadastro.php"><button class="btn btn-danger my-1 my-sm-0" type="submit">Cadastrar</button></a>
               <?php
                }
               ?>
        </div>
    </nav>
    <main role="main">
    <div class="jumbotron">
      <div class="container text-white">
        <h1 class="display-3 text-center">Central de Usuário</h1>
        <p class="text-center">"Encontre todas as suas informações referentes a informações pessoais e o histórico de compras"</p>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div id="admin-sidebar" class="col-md-2 p-x-0 p-y-3">
          <ul class="sidenav admin-sidenav list-unstyled">
            <li><a href="Central_1.php">Meus Pedidos</a></li>
            <li><a href="Central_2.php">Dados Pessoais</a></li>
          </ul>
        </div>
        <div id="admin-main-control" class="col-md-10 p-x-3 p-y-1">
          <div class="content-title m-x-auto">
            <span data-feather="shopping-cart"></span></i> Meus Pedidos
          </div>
          <p class="display-4">Todos os Pedidos</p>
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
          <div class="container">
            <div class="row">
            <?php
                if($result->num_rows > 0) {
                    while($obj = $result->fetch_object()) {
            ?>
              <div class="col-md-12">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                  <div class="card-body d-flex flex-column align-items-start">
                    <strong class="d-inline-block mb-2 text-primary"><?php echo $obj->moeda_entrada;?> -> <?php echo $obj->moeda_saida;?></strong>
                    <p class="card-text mb-auto"><b>Valor da Compra: </b><?php echo $obj->valor;?></p>
                    <p class="card-text mb-auto"><b>Método de pagamento: </b><?php echo $obj->pagamento;?></p>
                    <p class="card-text mb-auto"><b>Status do Pedido: </b><?php echo $obj->status;?></p>
                    <div class="mb-1 text-muted small"><?php echo $obj->data;?></div>
                  </div>
                </div>
              </div>
            <?php
                   }
               } else {
            ?>
                <h5 class="text-dark">Você ainda não realizou nenhuma compra no site!</h5>
            <?php
                }
            ?>
            </div>
          </div>
        </div>
      </div>
    <hr>
  </main>
  <footer class="bg-dark fixed-bottom">
    <p class="h6 text-center text-light pb-4 pt-4 mb-0">UFSBRA Câmbio - 2019 &copy; Todos os direitos reservados</p>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <script>
     feather.replace()
  </script>
</body>
</html>
