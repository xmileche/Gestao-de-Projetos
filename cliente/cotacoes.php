<?php
    session_start();
    include('classBd/connection.php');
    //AṔI
    include('includes/cotacoesAPI.php');
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="icons/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans+HK&display=swap" rel="stylesheet">

    <title>Cotações - UFSBRA Câmbio</title>

   <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="styles/jumbotron.css" rel="stylesheet">
</head>
<body>
  

  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <img style="height: 50px" src="images/cambio.png" class="img-fluid pr-3">
    <a class="navbar-brand" href="#">UFSBRA Câmbio</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Página Inicial</a>
        </li>
        <!---->
        <?php
          if(isset($_SESSION['usuario_cpf'])) {
        
            echo '<li class="nav-item">
              <a class="nav-link" href="compras.php">Compras</a>
            </li>';
          }
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
      
    <div class="wraper">
      <main role="main">
         <!-- Main jumbotron for a primary marketing message or call to action -->
     
      <form method="post" action="cotacoes.php" id="formulario"> 
          <div class="jumbotron">
            <div class="container text-white">
              <h1 class="display-3 text-center">Cotação de Moedas</h1>
            </div>
          </div>

          <div class="row date-header">     
              <div class="col-lg-3 col-md-5 invisble"></div>
              <div class="col-lg-5 col-md-4 col-sm-12" >
                <h3 style="margin-left:auto;margin-top:10px; margin-bottom:20px;"> Período: </h3>
              </div>
              <div class="col-lg-3 col-md-4 invisible" ></div>
          </div>

          
          <div class="row input-data">
          
              <div class="col-lg-3 col-md-3 col-sm-12 invisible" >
              </div>

              <div class="col-lg-1 col-md-1 col-sm-12 ">
                  <h5 id="input-inicio"> Incío:</h4>
              </div>

              
              <div class="col-lg-2 col-md-2 col-sm-12" style="padding-left:0; padding-right:100px;">
                  <span class="input-span"> Dia: </span>
                  <select class="custom-select input-data-elem" name="input-dia1" id="input-dia1">
                    <?php include('includes/selectDays.html') ?>
                  </select>
              </div>


              <div class="col-lg-2 col-md-2 col-sm-12" style="padding-left:0px; padding-right:100px;">
                  <span class="input-span"> Mês: </span>
                  <select class="custom-select input-data-elem" style="width:100px;" name="input-mes1" id="input-mes1">
                  <?php include('includes/selectMonths.html') ?>
                  </select>
              </div>


              <div class="col-lg-2 col-md-2 col-sm-12 dropdown" style="padding-left:0px; padding-right:100px;">
                  <span class="input-span"> Ano: </span>
                  <select class="custom-select input-data-elem" name="input-ano1" id="input-ano1"> 
                    <?php include("includes/selectYear.html")?>
                  </select>
                
              
            </div>

            

            <div class="col-lg-2 col-md-2 col-sm-12 invisble" >
            </div>

          </div>


          <div class="row input-data">
        
            <div class="col-lg-3 col-md-3 col-sm-12 invisible" >
            </div>

            <div class="col-lg-1 col-md-1 col-sm-12 "   >
                <h5 id="input-inicio"> Até:</h5>
            </div>

            
            <div class="col-lg-2 col-md-2 col-sm-12" style="padding-left:0; padding-right:100px;">
                <span class="input-span"> Dia: </span>
                <select class="custom-select input-data-elem" name="input-dia2" id="input-dia2">
                  <?php include('includes/selectDays.html') ?>
                </select>
            </div>


            <div class="col-lg-2 col-md-2 col-sm-12" style="padding-left:0px; padding-right:100px;">
                <span class="input-span"> Mês: </span>
                <select class="custom-select input-data-elem" style="width:100px;" name="input-mes2" id="input-mes2">
                <?php include('includes/selectMonths.html') ?>
                </select>
            </div>


            <div class="col-lg-2 col-md-2 col-sm-12 dropdown" style="padding-left:0px; padding-right:100px;">
                <span class="input-span"> Ano: </span>
                <select class="custom-select input-data-elem" name="input-ano2" id="input-ano2"> 
                  <?php include("includes/selectYear.html")?>
                </select>
            </div>            
        

            <div class="col-lg-2 col-md-2 col-sm-12 invisble" ></div>

          </div>

          
          <div class="row">
            <div class="col-lg-3 col-md-3 invisble"></div>

            <div class="col-lg-5 col-md-5 col-sm-12" >
                <h3 style="margin-left:auto; margin-bottom:20px;"> Selecione as Moedas: </h3>
            </div>
            
            <div class="col-lg-4 col-md-4 invisible" ></div>
            
          </div>

          <div class="row input-data">
            
                <div class="col-lg-3 col-md-3 col-sm-12 invisible" >
                </div>

                <div class="col-lg-1 col-md-1 col-sm-12 " style="padding-right:50px;">
                    <h5 id="input-inicio"> Sua Moeda:</h5>
                </div>

                
                <div class="col-lg-2 col-md-2 col-sm-12" style="padding-left:0; padding-right:80px;">
                    <select class="custom-select input-data-elem" name="input-moeda1" id="input-moeda1">
                      <?php include('includes/selectCurrency.html') ?>
                    </select>
                </div>

                <div class="col-lg-1 col-md-1 col-sm-12" style="padding-right:50px;">
                    <h5 id="input-inicio"> Moeda Desejada:</h5>
                </div>


                <div class="col-lg-2 col-md-2 col-sm-12" style="padding-left:0px; padding-right:70px;">
                    <select class="custom-select input-data-elem"  name="input-moeda2" id="input-moeda2">
                    <?php include('includes/selectCurrency.html') ?>
                    </select>
                </div>



              

                <div class="col-lg-2 col-md-2 col-sm-12 invisble" >
                </div>

              </div>     
              
              <div class="row" style="margin-top:50px; margin-left:50%  ;" >
                 <input class="btn" type="submit" value="Visualizar ">
              </div>

          </form>
        
          <!--grafico vai aqui:-->

          <div class="row">

            <div class="col-lg-1 col-md-1 col-sm-12" style="height:1px;"></div>
           
          
            <div class="col-lg-10 col-md-10 col-sm-12">
              <canvas id="lineChart" height="400" width="1000" ></canvas>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
              <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
              <script type="text/javascript">
                   var rotulos = <?php echo json_encode($labels); ?>;
                   var dados = <?php echo json_encode($data); ?>;
              </script>
              <script type="text/javascript" src="js/chart.js"></script>
            </div>



            <div class="col-lg-1 col-md-1 col-sm-12" style="height:1px;"></div>
            
          </div>

      </main>
    </div> 



    <div class="push"></div>
  

    <footer class="bg-dark footer">
      <p class="h6 text-center text-light pb-4 pt-4 mb-0">UFSBRA Câmbio - 2019 &copy; Todos os direitos reservados</p>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
