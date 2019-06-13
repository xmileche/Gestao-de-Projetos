<?php
    session_start();
    include('connection.php');
    if(isset($_GET['update'])) {
                       
      $id = $_GET['update'];
      $query = "UPDATE `compra` SET `status`='Finalizado' WHERE `compra_id`= '".$id."'";
      $result = $conn->query($query); 
    }
    mysqli_set_charset($conn,"utf8");
    $consulta_sql="select c.compra_id, c.cpf_fk, cli.nome, m1.nome as moeda_entrada, m2.nome as moeda_saida, c.valor, c.date, c.status, e.endereco_id, e.rua, e.numero, e.bairro, e.cidade, e.cep, e.pais FROM `compra` as c INNER JOIN `moeda` as m1 on c.moeda_usada_fk = m1.moeda_id INNER JOIN `moeda` as m2 on c.moeda_comprada_fk = m2.moeda_id INNER JOIN `cliente` as cli on c.cpf_fk = cli.cpf INNER JOIN `endereco` as e on e.cpf_fk = c.cpf_fk WHERE c.status = 'Pagamento pendente' ORDER BY c.date DESC";
    $result = $conn->query($consulta_sql); 
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Imagens/cambio.png">

    <title>Página Inicial - UFSBRA Câmbio</title>

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
        <div class="col-md-2 bg-secondary" style="height:900px;">
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
                  <b>Página Inicial</b><span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="Clientes.php">
                  <span data-feather="users"></span>
                    Clientes
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
              <br><br><br>
            </ul>
          </div>
        <main role="main" class="col-lg-10">
        <h2 class="text-center pt-3"><b>UFSBRA Câmbio - Pagamentos pendentes</b></h2>
        <hr>
        <div class="col-md-12 row pt-5">  
            <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">CPF</th>
              <th scope="col">Nome</th>
              <th scope="col">Moeda de Entrada</th>
              <th scope="col">Moeda de Saída</th>
              <th scope="col">Valor Total</th>
              <th scope="col">Data</th>
              <th scope="col">Status</th>
              <th scope="col">Endereço</th>
            </tr>
          </thead>
          <tbody>
            <?php 
                 while ($obj = $result->fetch_object()) {
            ?>
            <tr>
              <th scope="row"><?php echo $obj->compra_id?></th>
              <td><?php echo $obj->cpf_fk?></td>
              <td><?php echo $obj->nome?></td>
              <td><?php echo $obj->moeda_entrada?></td>
              <td><?php echo $obj->moeda_saida?></td>
              <td><?php echo $obj->valor?></td>
              <td><?php echo $obj->date?></td>
              <td>
              <a href="index.php?update=<?php echo $obj->compra_id?>"><button onclick="return confirm('Você tem certeza que deseja modificar o status do pedido?');" class="btn btn-success my-1 my-sm-0" onclick="alert(id)" type="submit" name="status">Finalizado</button></a>
              </td>
              <td>
                <a href="index_extensao.php?endereco=<?php echo $obj->endereco_id; ?>"><button class="btn btn-primary my-1 my-sm-0" type="submit" >Visualizar</button></a> 
              </td>
            </tr>
            <?php }
              ?>
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
    <footer class="bg-dark fixed-bottom">
        <p class="h6 text-center text-light pb-4 pt-4 mb-0">UFSBRA Câmbio - 2019 &copy; Todos os direitos reservados</p>
    </footer>
  </body>
</html>
