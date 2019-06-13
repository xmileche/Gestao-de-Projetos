<?php
    session_start();
    include('connection.php');
    mysqli_set_charset($conn,"utf8");

    $consulta_sql="select c.cpf AS cpf, c.senha AS senha, c.nome AS nome, c.email AS email, c.estado_civil AS civil, c.senha AS senha, c.data_nasc AS nascimento, c1.telefone AS telefone, c1.celular AS celular, end.rua AS rua, end.numero AS numero, end.bairro AS bairro, end.cep AS cep, end.cidade AS cidade, end.pais AS pais from cliente AS c INNER JOIN contato AS c1 ON c1.cpf_fk = c.cpf INNER JOIN endereco AS end ON end.cpf_fk = c.cpf WHERE c.cpf = '".$_SESSION['usuario_cpf']."';";
    $result = $conn->query($consulta_sql);

    if(isset($_GET['excluir'])) { 
      $query = "DELETE FROM `cliente` WHERE `cpf`= '".$_SESSION['usuario_cpf']."'";
      $sql_query= mysqli_query($conn, $query);
      $_SESSION['msg_login'] = "<h5><p style='color:green;'>A conta foi deletada com sucesso!</p></h5>";
      header("Location: ../cadastro_login/login.php");
    
    } else if(isset($_GET['update'])){
        
        //Erro na confirmação da senha
        if($_POST['senha'] != $_POST['confirma_senha']) {
            
            session_start();
            $_SESSION['msg_senha'] = "<h5><p style='color:red;'>As senhas não são iguais para atualização</p></h5>";
            header("Location: Central_2.php");
            
        } else {
            
            $query1= "UPDATE `cliente` SET `nome` = '".$_POST['nome']."',`email` = '".$_POST['email']."',`estado_civil` = '".$_POST['civil']."',`data_nasc` = '".$_POST['nascimento']."' WHERE `cpf`= '".$_SESSION['usuario_cpf']."'";
            $query2= "UPDATE `contato` SET `telefone` = '".$_POST['telefone']."',`celular` = '".$_POST['celular']."',`email` = '".$_POST['email']."'  WHERE `cpf_fk`= '".$_SESSION['usuario_cpf']."' ";
            $query3= "UPDATE `endereco` SET `rua` = '".$_POST['rua']."',`numero` = '".$_POST['numero']."',`bairro` = '".$_POST['bairro']."',`cep` = '".$_POST['cep']."',`cidade` = '".$_POST['cidade']."',`pais` = '".$_POST['pais']."' WHERE `cpf_fk`= '".$_SESSION['usuario_cpf']."'";

            $sql_query= mysqli_query($conn, $query1);
            $sql_query= mysqli_query($conn, $query2);
            $sql_query= mysqli_query($conn, $query3);   
            $_SESSION['msg_senha'] = "<h5><p style='color:red;'>A conta foi atualizada com sucesso!</p></h5>";
            header("Location: Central_2.php");
        }
    }
?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="images/favicon.ico">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css" rel="stylesheet" />

  <title>Central de Usuário - UFSBRA Câmbio</title>

  <link href="styles/jumbotron_central.css" rel="stylesheet">
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <img style="height: 50px" src="Imagens/cambio.png" class="img-fluid pr-3">
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
            <a href="Central_1.php"><button class="btn btn-success my-2 my-sm-0 mr-sm-2" type="submit"><img src="Imagens/central_user.png" width="30px" height="30px"> Seja Bem Vindo <b><?php echo $_SESSION['usuario_nome'] ?></b></button></a>
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
        <h1 class="display-3 text-center">Central de Usuário</h1>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div id="admin-sidebar" class="col-md-2 p-x-0 p-y-3">
          <ul class="sidenav admin-sidenav list-unstyled">
            <li><a href="Central_1.php">Meus Pedidos</a></li>
            <li><a href="Central_2.php">Dados Pessoais</a></li>
          </ul>
        </div> <!-- /#admin-sidebar -->
        <div id="admin-main-control" class="col-md-10 p-x-3 p-y-1">
          <div class="content-title m-x-auto">
            <i class="fa fa-dashboard"></i> Dados Pessoais
          </div>
          <p class="display-4">Informações pessoais</p>
           <?php
                if(isset($_SESSION['msg_senha'])){   
                    echo($_SESSION['msg_senha']);
                    unset($_SESSION['msg_senha']);
                }
            ?>
            <fieldset>
             <form action="Central_2.php?update=<?php echo $obj->cpf;?>"  method="post">
              <div class="form-group">
            <?php 
                while ($obj = $result->fetch_object()) {
            ?>
                <label class="col-md-12 control-label" for="textinput">Nome</label>
                <div class="col-md-12">
                  <input id="textinput" name="nome" type="text" placeholder="" class="form-control input-md" value="<?php echo $obj->nome;?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label" for="selectbasic">Email</label>
                <div class="col-md-12">
                    <input class="form-control" name="email" id="registration-date" type="text" value="<?php echo $obj->email; ?>" required>
                </div>
              </div>
              <?php if($obj->civil == "Solteiro(a)") { ?>
              <div class="form-group">
                <label class="col-md-12 control-label" for="radios">Estado Civil</label>                  
                  <div class="col-md-12">
                  <label class="radio-inline" for="radios-0">
                    <input type="radio" name="civil" value="Solteiro(a)" checked="checked">
                    Solteiro(a)
                  </label>
                  <label class="radio-inline" for="radios-1">
                    <input type="radio" name="civil" value="Casado(a)">
                    Casado(a)
                  </label>
                </div>
              </div>
              <?php  } else { ?>
                <div class="form-group">
                <label class="col-md-12 control-label" for="radios">Estado Civil</label>
                  <div class="col-md-12">
                  <label class="radio-inline" for="radios-0">
                    <input type="radio" name="civil" value="Solteiro(a)">
                    Solteiro(a)
                  </label>
                  <label class="radio-inline" for="radios-1">
                    <input type="radio" name="civil" value="Casado(a)" checked="checked">
                    Casado(a)
                  </label>
                </div>
              </div>  
            <?php
                }
            ?>
              <div class="form-group">
                <label class="col-md-12 control-label" for="selectbasic">Data de Nascimento</label>
                <div class="col-md-12">
                    <input class="form-control" name="nascimento" id="registration-date" type="text" value="<?php echo $obj->nascimento; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label" for="selectbasic">Rua</label>
                <div class="col-md-12">
                    <input class="form-control" name="rua" id="registration-date" type="text" value="<?php echo $obj->rua; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label" for="selectbasic">Número</label>
                <div class="col-md-12">
                    <input class="form-control" name="numero" id="registration-date" type="text" value="<?php echo $obj->numero; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label" for="selectbasic">Bairro</label>
                <div class="col-md-12">
                    <input class="form-control" name="bairro" id="registration-date" type="text" value="<?php echo $obj->bairro; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label" for="selectbasic">CEP</label>
                <div class="col-md-12">
                    <input class="form-control" name="cep" id="registration-date" type="text" value="<?php echo $obj->cep; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label" for="selectbasic">Cidade</label>
                <div class="col-md-12">
                    <input class="form-control" name="cidade" id="registration-date" type="text" value="<?php echo $obj->cidade; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label" for="selectbasic">País</label>
                <div class="col-md-12">
                    <input class="form-control" name="pais" id="registration-date" type="text" value="<?php echo $obj->pais; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label" for="selectbasic">Telefone</label>
                <div class="col-md-12">
                    <input class="form-control" name="telefone" id="registration-date" type="text" value="<?php echo $obj->telefone; ?>" required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label" for="selectbasic">Celular</label>
                <div class="col-md-12">
                    <input class="form-control" name="celular" id="registration-date" type="text" value="<?php echo $obj->celular; ?>"  required>
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-12 control-label" for="singlebutton"></label>
                <div class="col-md-12">  
                  <a href="Central_2.php?update=<?php echo $obj->cpf?>"><button type="submit" id="singlebutton" name="singlebutton" class="btn btn-primary">Editar</button></a>
                </div>
              </div>
              <?php
                }
             ?>
              </form>
              <a class="ml-2" href="Central_2.php?excluir=<?php echo $obj->cpf?>"><button onclick="return confirm('Você tem certeza que deseja excluir sua conta?');" class="btn btn-danger my-1 my-sm-0" name="status">Excluir</button></a><br><br>
            </fieldset>
        </div> 
      </div> 
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
