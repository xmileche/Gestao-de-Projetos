<?php
    session_start();
    include('connection.php');
    mysqli_set_charset($conn,"utf8");
    $consulta_sql="select * from cliente ORDER BY nome ASC";
    $result = $conn->query($consulta_sql); 
    $passou = 0;
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Imagens/cambio.png">

    <title>Clientes - UFSBRA Câmbio</title>
      
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
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-2 bg-secondary">
            <div class="bg-secondary text-center pb-2">
                <figure>
                    <img src="Imagens/cambio.png" class="img-fluid mt-3" alt="..." style="width: 5rem;">
                    <figcaption class="text-white font-weight-bold pt-2">UFSBRA Câmbio</figcaption>
                </figure>    
            </div>
            <hr>
            <center><img src="Imagens/man.png" class="img-fluid mt-3 mb-3" alt="..." style="width: 5rem;"></center>
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
                    <b>Clientes</b>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="Moedas.php">
                  <span data-feather="dollar-sign"></span>
                  Moedas
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
        <h2 class="text-center"><b>UFSBRA Câmbio - CLIENTES</b></h2>
        <hr>
        <form action="" method="post" class="bg-warning mr-1" style="border-radius: 10px">
          <label class="mx-4 mt-2 h6"><b>Procurar por RG:</b></label>
          <div class="form-group mx-4">
            <input type="number" name="search_rg" id="inputPassword6" class="form-control mr-sm-1" aria-describedby="passwordHelpInline" placeholder="Apenas dígitos">
            <input type="submit" class="btn btn-primary my-2 mb-3" value="Pesquisar">
          </div>
        </form>
            <?php
                if(isset($_POST["search_rg"])){
                  $search_value_rg=$_POST["search_rg"];
                  $sql="select * from cliente where rg = '".$search_value_rg."'";
                      
                  if(empty($search_value_rg) != 1){
                      $res=$conn->query($sql);
                  }
                }
              ?>
        <form action="" method="post" class="bg-warning mr-1" style="border-radius: 10px">
          <label class="mx-4 mt-2 h6"><b>Procurar por CPF:</b></label>
          <div class="form-group mx-4">
            <input type="number" name="search_cpf" id="inputPassword6" class="form-control mr-sm-1" aria-describedby="passwordHelpInline" placeholder="Apenas dígitos">
            <button type="submit" class="btn btn-primary my-2 mb-3">Pesquisar</button>
          </div>
        </form>
            <?php
              if(isset($_POST["search_cpf"])){
                  $search_value_cpf=$_POST["search_cpf"];
                  $sql="select * from cliente where cpf = '".$search_value_cpf."'";
                  
                  if(empty($search_value_cpf) != 1){
                      $res=$conn->query($sql);
                  }
                }
              ?>
        <form action="" method="post" class="bg-warning" style="border-radius: 10px">
          <label class="mx-4 mt-2 h6"><b>Procurar por Nome:</b></label>
          <div class="form-group mx-4">
            <input type="text" name="search_nome" id="inputPassword6" class="form-control mr-sm-1" aria-describedby="passwordHelpInline" placeholder="Nome completo">
            <button type="submit" class="btn btn-primary my-2 mb-3">Pesquisar</button>
               <?php
               if(isset($_POST["search_nome"])){
                  $search_value_nome=$_POST["search_nome"];
                  $sql="select * from cliente where nome = '".$search_value_nome."'";
                  
                  if(empty($search_value_nome) != 1){
                      $res=$conn->query($sql);
                  }
                }
              ?>
          </div>
        </form>
        <hr>
        <h2 class="pt-3 pb-4 text-center">Informações Gerais de Clientes</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>CPF comprador</th>
                  <th>Nome</th>
                  <th>RG</th>
                  <th>Estado Civil</th>
                  <th>Data de Nascimento</th>
                </tr>
              </thead>
              <tbody>
            <?php
                  if(empty($search_value_rg) != 1)
                    while ($obj = $res->fetch_object()) {
            ?>  
            <tr class="bg-light">
              <th scope="row"><?php echo $obj->cpf ?></th>
              <td><?php echo $obj->nome ?></td>
              <td><?php echo $obj->rg ?></td>
              <td><?php echo $obj->estado_civil ?></td>
              <td><?php echo $obj->data_nasc ?></td>
            </tr>
            <?php } else if (empty($search_value_cpf) != 1)
                        while ($obj = $res->fetch_object()) {
            ?>
            <tr class="bg-light">
              <th scope="row"><?php echo $obj->cpf ?></th>
              <td><?php echo $obj->nome ?></td>
              <td><?php echo $obj->rg ?></td>
              <td><?php echo $obj->estado_civil ?></td>
              <td><?php echo $obj->data_nasc ?></td>
            </tr>
            <?php } else if (empty($search_value_nome) != 1)
                        while ($obj = $res->fetch_object()) {
            ?>   
            <tr class="bg-light">
              <th scope="row"><?php echo $obj->cpf ?></th>
              <td><?php echo $obj->nome ?></td>
              <td><?php echo $obj->rg ?></td>
              <td><?php echo $obj->estado_civil ?></td>
              <td><?php echo $obj->data_nasc ?></td>
            </tr>
            <?php } else 
                        while ($obj = $result->fetch_object()) {
            ?>
            <tr class="bg-light">
              <th scope="row"><?php echo $obj->cpf ?></th>
              <td><?php echo $obj->nome ?></td>
              <td><?php echo $obj->rg ?></td>
              <td><?php echo $obj->estado_civil ?></td>
              <td><?php echo $obj->data_nasc ?></td>
            </tr>  
                   <?php } ?>
         </tbody>
        </table>
        </div>    
       </main>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../../../assets/js/vendor/popper.min.js"></script>
    <script src="../../../../dist/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>
  <footer class="bg-dark">
    <p class="h6 text-center text-light pb-4 pt-4 mb-0">UFSBRA Câmbio - 2019 &copy; Todos os direitos reservados</p>
  </footer>
  </body>
</html>
