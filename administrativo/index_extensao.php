<?php
    session_start();
    include('connection.php');
    mysqli_set_charset($conn,"utf8");
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Imagens/cambio.png">

    <title>Informações Extras - UFSBRA Câmbio</title>

    <link href="../../../../dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
  <nav class="navbar bg-dark">
    <div class="mx-auto row">
        <img style="height: 60px" src="Imagens/cambio.png" class="img-fluid pr-3">
        <h5 class="text-white"><b>UFSBRA Câmbio</b></h5>
    </div>
  </nav>
    <div class="container-fluid">
      <div class="row"> 
            <div class="col-md-12">
                <hr>    
                <center><img src="../cliente/Imagens/man%20.png" class="img-fluid" alt="Imagem responsiva" style="max-width: 10%"></center>
                <table class="table table-td">
                  <thead><p class="text-center h4">Informações do Endereço do Cliente</p>
                      <hr>
                    <tr>
                      <th scope="col">Rua</th>
                      <th scope="col">Número</th>
                      <th scope="col">Bairro</th>
                      <th scope="col">CEP</th>
                      <th scope="col">Cidade</th>
                      <th scope="col">País</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php
                      if(isset($_GET['endereco'])) {
                            $id = $_GET['endereco'];
                            $query = "SELECT `rua`, `numero`, `bairro`, `cep`, `cidade`, `pais` FROM `endereco` WHERE `endereco_id` = '".$id."'";
                            $result = $conn->query($query); 
                        }
                         while ($obj = $result->fetch_object()) {
                      ?>
                    <tr>
                      <td><?php echo $obj->rua?></td>
                      <td><?php echo $obj->numero?></td>
                      <td><?php echo $obj->bairro?></td>
                      <td><?php echo $obj->cep?></td>
                      <td><?php echo $obj->cidade?></td>
                      <td><?php echo $obj->pais?></td>
                    </tr>
                      <?php } ?>
                  </tbody>
                </table>
            </div>
        </div>
      </div>
      <center><a href="index.php"><button class="btn btn-danger my-1 my-sm-0" type="submit">Voltar</button></a></center>
    <br>
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
