<?php
    session_start();
    include('connection.php');

    mysqli_set_charset($conn,"utf8");
    $consulta_sql="select c.compra_id, c.cpf_fk, m1.nome as moeda_entrada, m2.nome as moeda_saida, c.valor, c.date, c.status FROM `compra` as c INNER JOIN `moeda` as m1 on c.moeda_usada_fk = m1.moeda_id INNER JOIN `moeda` as m2 on c.moeda_comprada_fk = m2.moeda_id ORDER BY c.date DESC";
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
    <link rel="icon" href="../../../../cambio.png">

    <title>Página Inicial - UFSBRA Câmbio</title>

    <  <!-- Bootstrap core CSS -->
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
        <div class="sidebar-sticky bg-secondary" style="height:1300px; width:250px;">
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
      
            <hr>


        <form action="" method="post" class="bg-warning mr-1" style="border-radius: 10px">
          <label class="mx-4 mt-2 h6">Procurar por Código:</label>
          <div class="form-group mx-4">
            <input type="number" name="search_cod" id="inputPassword6" class="form-control mr-sm-1" aria-describedby="passwordHelpInline" placeholder="Apenas dígitos">
            <input type="submit" class="btn btn-primary my-2 mb-3" value="Pesquisar">
          </div>
        </form>
            <?php
              if(isset($_POST["search_cod"])){
                  $search_value_cod=$_POST["search_cod"];
                  $sql="select c.compra_id, c.cpf_fk, m1.nome as moeda_entrada, m2.nome as moeda_saida, c.valor, c.date, c.status FROM `compra` as c INNER JOIN `moeda` as m1 on c.moeda_usada_fk = m1.moeda_id INNER JOIN `moeda` as m2 on c.moeda_comprada_fk = m2.moeda_id WHERE c.compra_id = '".$search_value_cod."' ORDER BY c.date DESC ";
                      
                  if(empty($search_value_cod) != 1){
                      $res=$conn->query($sql);
                  }
                }

              ?>
 
        <form action="" method="post" class="bg-warning mr-1" style="border-radius: 10px">
          <label class="mx-4 mt-2 h6">Procurar por CPF:</label>
          <div class="form-group mx-4">
            <input type="number" name="search_cpf" id="inputPassword6" class="form-control mr-sm-1" aria-describedby="passwordHelpInline" placeholder="Apenas dígitos">
            <button type="submit" class="btn btn-primary my-2 mb-3">Pesquisar</button>
          </div>
        </form>
            <?php
                if(isset($_POST["search_cpf"])){
                  $search_value_cpf=$_POST["search_cpf"];
                  $sql="select c.compra_id, c.cpf_fk, m1.nome as moeda_entrada, m2.nome as moeda_saida, c.valor, c.date, c.status FROM `compra` as c INNER JOIN `moeda` as m1 on c.moeda_usada_fk = m1.moeda_id INNER JOIN `moeda` as m2 on c.moeda_comprada_fk = m2.moeda_id WHERE c.cpf_fk = '".$search_value_cpf."' ORDER BY c.date DESC";
                  
                  if(empty($search_value_cpf) != 1){
                      $res=$conn->query($sql);
                  }
                }

              ?>


      <form action="" method="post" class="bg-warning mr-1" style="border-radius: 10px">
          <label class="mx-4 mt-2 h6">Procurar por Código de Moeda:</label>
          <div class="form-group mx-4">
            <input type="number" name="search_moeda" id="search_moeda" class="form-control mr-sm-1" aria-describedby="passwordHelpInline" placeholder="Códifo da moeda">
            <input type="submit" class="btn btn-primary my-2 mb-3" value="Pesquisar">
          </div>
        </form>
            <?php
              if(isset($_POST["search_moeda"])){
                  $search_value_moeda=$_POST["search_moeda"];
                  $sql="select c.compra_id, c.cpf_fk, m1.nome as moeda_entrada, m2.nome as moeda_saida, c.valor, c.date, c.status FROM `compra` as c INNER JOIN `moeda` as m1 on c.moeda_usada_fk = m1.moeda_id INNER JOIN `moeda` as m2 on c.moeda_comprada_fk = m2.moeda_id WHERE c.moeda_comprada_fk = '".$search_value_moeda."' ORDER BY c.date DESC ";
                      
                  if(empty($search_value_moeda) != 1){
                    
                      $res=$conn->query($sql);
                  }
                }

              ?>



          <h2 class="pt-5 text-center">Últimas transações</h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th>Código</th>
                  <th>CPF comprador</th>
                  <th>Moeda de entrada</th>
                  <th>Moeda de saída</th>
                  <th>Valor (com IOF)</th>
                  <th>Data e horário</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
            <?php
                  if(empty($search_value_cod) != 1)
                    while ($obj = $res->fetch_object()) {
            ?>  
              
              <tr>
                  <td><?php echo $obj->compra_id?></td>
                  <td><?php echo $obj->cpf_fk?></td>
                  <td><?php echo $obj->moeda_entrada?></td>
                  <td><?php echo $obj->moeda_saida?></td>
                  <td><?php echo $obj->valor?></td>
                  <td><?php echo $obj->date?></td>
                  <td><?php echo $obj->status?></td>
                </tr>
            <?php }  else if (empty($search_value_moeda) != 1)
                        while ($obj = $res->fetch_object()) {
            ?>
                <tr>
                  <td><?php echo $obj->compra_id?></td>
                  <td><?php echo $obj->cpf_fk?></td>
                  <td><?php echo $obj->moeda_entrada?></td>
                  <td><?php echo $obj->moeda_saida?></td>
                  <td><?php echo $obj->valor?></td>
                  <td><?php echo $obj->date?></td>
                  <td><?php echo $obj->status?></td>
                </tr>
            <?php }  else if (empty($search_value_cpf) != 1)
                        while ($obj = $res->fetch_object()) {
            ?>
                  <tr>
                  <td><?php echo $obj->compra_id?></td>
                  <td><?php echo $obj->cpf_fk?></td>
                  <td><?php echo $obj->moeda_entrada?></td>
                  <td><?php echo $obj->moeda_saida?></td>
                  <td><?php echo $obj->valor?></td>
                  <td><?php echo $obj->date?></td>
                  <td><?php echo $obj->status?></td>
                </tr>

                
            <?php }  else{ 
                        while ($obj = $result->fetch_object()) {
            ?>
                  
                  <tr>
                  <td><?php echo $obj->compra_id?></td>
                  <td><?php echo $obj->cpf_fk?></td>
                  <td><?php echo $obj->moeda_entrada?></td>
                  <td><?php echo $obj->moeda_saida?></td>
                  <td><?php echo $obj->valor?></td>
                  <td><?php echo $obj->date?></td>
                  <td><?php echo $obj->status?></td>
                </tr>
            <?php }}   ?>
                  
              </tbody>
            </table>
            <br><br><br>
          </div>
          </main>
      </div>    
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="/assets/js/vendor/popper.min.js"></script>
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
