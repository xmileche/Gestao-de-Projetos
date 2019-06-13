<?php
    session_start();
    include('connection.php');
    mysqli_set_charset($conn,"utf8");
    $consulta_sql="SELECT * FROM `moeda`";
    $consulta_n_clientes = "select count(*) as qtd_cliente from cliente";
    $consulta_n_compras = "select count(*) as qtd_compra from compra";
    $consulta_n_moedas = "select count(*) as qtd_moeda from moeda";
    $result = $conn->query($consulta_sql); 
    $result_n_clientes = $conn->query($consulta_n_clientes); 
    $result_n_compra = $conn->query($consulta_n_compras); 
    $result_n_moeda = $conn->query($consulta_n_moedas); 
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Imagens/cambio.png">

    <title>Moedas - UFSBRA Câmbio</title>

      <!-- Bootstrap core CSS -->
      <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="styles/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <div class="container-fluid ">
      <div class="row" style="height:900px;">
        <div class="col-md-2 bg-secondary">
            <div class="bg-secondary text-center pb-2">
                <figure>
                    <img src="Imagens/cambio.png" class="img-fluid mt-3" style="width: 5rem;">
                    <figcaption class="text-white font-weight-bold pt-2">UFSBRA Câmbio</figcaption>
                </figure>    
            </div>
            <hr>
            <center><img src="Imagens/man.png" class="img-fluid mt-3 mb-3" style="width: 5rem;"></center>
            <p class="text-center text-white font-weight-bold">Leandro Naidhig</p>
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link text-light" href="index.php">
                  <span data-feather="home"></span>
                  Página Inicial
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="Clientes.php">
                  <span data-feather="users"></span>
                    Clientes
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" active href="Moedas.php">
                  <span data-feather="dollar-sign"></span>
                  <b>Moedas</b>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="Compras.php">
                  <span data-feather="shopping-cart"></span>
                  Compras
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="logout.php">
                  <span data-feather="log-out"></span>
                  Logout
                </a>
              </li>
            </ul>
          </div>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">  
         <h2 class="text-center"><b>UFSBRA Câmbio - MOEDAS</b></h2>
          <hr>
          <h2 class="pt-2 text-center">Informações Gerais sobre Moedas</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>Sigla</th>
                  <th>Nome</th>
                  <th>País</th>
                </tr>
              </thead>
              <tbody>
            <?php
                while ($obj = $result->fetch_object()) {
            ?>
                <tr>
                  <td><?php echo $obj->moeda_id?></td>
                  <td><?php echo $obj->sigla?></td>
                  <td><?php echo $obj->nome?></td>
                  <td><?php echo $obj->pais?></td>
                  </tr>
            <?php } ?>
              </tbody>
            </table>
          </div>
        </main>
      </div>    
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/js/vendor/popper.min.js"></script>
    <script src="/dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
    <footer class="bg-dark fixed-bottom">
        <p class="h6 text-center text-light pb-4 pt-4 mb-0">UFSBRA Câmbio - 2019 &copy; Todos os direitos reservados</p>
    </footer>
  </body>
</html>
