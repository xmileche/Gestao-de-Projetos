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

  <title>Informações - UFSBRA Câmbio</title>

  <link href="styles/jumbotron_info.css" rel="stylesheet">    
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
          <a class="nav-link active" href="informacoes.php">informações</a>
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
    <div class="flex-container-services">
      <h2 class="separation-title"> Como funciona </h2>
      <div class="service-description">Para sua comodidade, comprar moedas agora pode ser feito com um símples clique!</div>
      <div class="flex-item-services">
        <figure class=services-icon>
          <i style="color: #f3701e" class="fa fa-paint-brush" aria-hidden="true"></i>
        </figure>
        <div class="title-services"> Escolha a moeda </div>
        <div class="content-services"> Escolha a moeda a ser comprada e para o ato da compra, valor e modo de entrega. </div>
      </div>
      <div class="flex-item-services">
        <figure class=services-icon>
          <i style="color: #f3701e" class="fa fa-shopping-cart" aria-hidden="true"></i>
        </figure>
        <div class="title-services"> Confira seus dados </div>
        <div class="content-services"> Confira seus dados e informe o método de pagamento. </div>
      </div>
      <div class="flex-item-services">
        <figure class=services-icon>
          <i style="color: #f3701e" class="fa fa-line-chart" aria-hidden="true"></i>
        </figure>
        <div class="title-services"> Finalize sua compra </div>
        <div class="content-services"> Prontinho! Agora deixa com a gente. </div>
      </div>
      <div class="container section">
        <div class="row">
          <div class="col-md-6">
            <h3>
              Mais detalhes...
            </h3>
            <p>
              No ato de escolha da moeda a ser comprada e da moeda para a realização da compra, é possível visualizar todas as moedas que temos disponível para a transação e é só digitar o valor que a conversão é por nossa conta. Para o modo de
              entrega, pode ser realizado entrega à domicílio ou retirada. Finalmente, as formas de pagamento são: dinheiro, cartão de crédito ou débito. Agora é só finalizar a compra.
            </p>
          </div>
          <div class="col-md-6">
            <img src="https://preview.ibb.co/erdq8p/Employee-1.jpg" alt="" />
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <img src="https://preview.ibb.co/cu76g9/Employee-2.jpg" alt="" />
          </div>
          <div class="col-md-6">
            <h3>
              Casa de câmbio online e IOF
            </h3>
            <p>
              Em nosso sistema o cliente encontra comodidade em suas transações. O câmbio é feito sob troca e fornecimento de moedas requisitadas pelo cliente. Tais operações financeiras geram o IOF (Imposto sobre Operações Financeiras). Ele é um
              imposto federal e tem com intuito ser um regulador da economia nacional. A taxa cobrada em cada operação é vista como um recolhimento proporcional dos investimentos, dando conhecimento da demanda e oferta de crédito.
            </p>
          </div>
        </div>
      </div>
      <section class="our-webcoderskull padding-lg">
        <div class="container">
          <div class="row heading heading-icon">
            <h2>Nosso Time</h2>
          </div>
          <ul class="row">
            <li class="col-12 col-md-4 col-lg-4">
              <div class="cnt-block equal-hight" style="height: 349px;">
                <figure><img src="https://scontent.fsod3-1.fna.fbcdn.net/v/t1.0-9/20245393_1229850703793465_6595225626709931103_n.jpg?_nc_cat=111&_nc_ht=scontent.fsod3-1.fna&oh=554bbfc0e60cbea6d4ac2193647aea4d&oe=5D70764C" class="img-responsive"
                    alt=""></figure>
                <h3><a href="http://www.webcoderskull.com/">Leandro Naidhig</a></h3>
                <p>Desenvolvedor Web</p>
                <ul class="follow-us clearfix">
                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </li>
            <li class="col-12 col-md-4 col-lg-4">
              <div class="cnt-block equal-hight" style="height: 349px;">
                <figure><img src="https://scontent.fsod3-1.fna.fbcdn.net/v/t1.0-1/39834987_1830918130332786_8327691688566849536_n.jpg?_nc_cat=101&_nc_ht=scontent.fsod3-1.fna&oh=d7c136bdb3a4604f2427ca0992507730&oe=5D2D1E35" class="img-responsive"
                    alt=""></figure>
                <h3><a href="#">Lucas Andrade </a></h3>
                <p>Desenvolvedor Web</p>
                <ul class="follow-us clearfix">
                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </li>
            <li class="col-12 col-md-4 col-lg-4">
              <div class="cnt-block equal-hight" style="height: 349px;">
                <figure><img src="http://uxleris.sor.ufscar.br/c2y/img/equipe/Michele-Carvalho.jpg" class="img-responsive" alt=""></figure>
                <h3><a href="http://www.webcoderskull.com/">Michele Carvalho </a></h3>
                <p>Desenvolvedora Web</p>
                <ul class="follow-us clearfix">
                  <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                  <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </section>
    </div>
  </main>
  <footer class="bg-dark">
    <p class="h6 text-center text-light pb-4 pt-4 mb-0">UFSBRA Câmbio - 2019 &copy; Todos os direitos reservados</p>
  </footer>
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
