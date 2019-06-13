<?php
    session_start();
    include('connection.php');
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="images/cambio.png">

  <title>Página Inicial - UFSBRA Câmbio</title>

  <link href="styles/jumbotron.css" rel="stylesheet">
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
          <a class="nav-link active" href="index.php">Página Inicial</a>
        </li>
        <!-- -->
        <?php
          if(isset($_SESSION['usuario_cpf'])) {
        ?>
            <li class="nav-item">
              <a class="nav-link" href="compras.php">Compras</a>
            </li>
        <?php }
        ?>
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
            <a href="Central_1.php"><button class="btn btn-success my-2 my-sm-0 mr-sm-2" type="submit"><img src="images/central_user.png" width="30px" height="30px"> Seja Bem Vindo <b><?php echo $_SESSION['usuario_nome'] ?></b></button></a>
            <a href="logout.php"><button class="btn btn-danger my-1 my-sm-0" type="submit" style="height:43px;">Sair</button></a>
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
        <h1 class="display-3 text-center">UFSBRA Câmbio</h1>
        <p class="text-center">"A melhor casa de câmbio com as melhores cotações do mercado, proporcionando um bom negócio na venda da compra de moedas estrangeiras!"</p>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <center><img src="images/moedas.jpg" class="img-fluid" style="max-width: 50%"></center>
          <h2 class="text-center">Moedas em espécie disponiveis</h2>
          <p class="text-center">A UFSBRA tem uma variedade enorme de moedas estrangeiras disponíveis para compra e venda no mercado. Verfique as informações de cada uma delas.</p>
          <p class="text-center"><a class="btn btn-warning" href="moedas.php" role="button">Ver detalhes &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <center><img src="images/pagamento.jpg" class="img-fluid" style="max-width: 50%"></center>
          <h2 class="text-center">Escolha a forma de pagamento de suas transações</h2>
          <p class="text-center">Todos os nossos clientes tem a opção de escolher o método de pagamento na compra de alguma moeda, tendo a escolha por dinheiro, por cartão de crédito e débito!</p>
          <p class="text-center"><a class="btn btn-warning" href="informacoes.php" role="button">Ver detalhes &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <center><img src="images/central.png" class="img-fluid" style="max-width: 50%"></center>
          <h2 class="text-center">Central do Usuário</h2>
          <p class="text-center">Nosso sistema conta uma central de usuário contendo todas as operações realizadas no site como: status de pedidos de compra ou venda de moedas, histórico de suas transações até o momento, dados pessoais, entre outras
            informações.</p>
            <!-- -->
          <?php
          if(isset($_SESSION['usuario_cpf'])) {
 
            echo '<p class="text-center"><a class="btn btn-warning" href="Central_1.php" role="button">Acessar Central de Usuário &raquo;</a></p>';

          }else{
            echo '<p class="text-center"><a class="btn btn-warning" href="../cadastro_login/login.php" role="button">Acessar Central de Usuário &raquo;</a></p>';
          }
          ?>
        </div>
      </div>
    </div>
    <img src="images/negocios.jpg" class="img-fluid" alt="Imagem responsiva" style="width:100%;">
    <img src="images/negocios2.jpg" class="img-fluid" alt="Imagem responsiva" style="width:100%;">
    <img src="images/money.jpg" class="img-fluid" alt="Imagem responsiva" style="width:100%;">
  </main>

  <footer class="bg-dark">
    <p class="h6 text-center text-light pb-4 pt-4 mb-0">UFSBRA Câmbio - 2019 &copy; Todos os direitos reservados</p>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
