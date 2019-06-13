<?php
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="Imagens/cambio.png">

    <title>Login - UFSBRA Câmbio</title>

    <!-- Bootstrap core CSS -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Custom styles for this template -->
    <link href="login.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin text-white" method="post" action="login_back.php" style="background-color: rgba(0, 0, 0, 0.8); border-radius: 30px"><br>
        <div class="form-group">
        <img class="mb-4" src="Imagens/cambio.png" alt="" width="9%" height="9%">
        <h1 class="h2 mb-3 text-warning">UFSBRA Câmbio - Login</h1>
            <?php
                if(isset($_SESSION['msg_login'])){   
                    echo($_SESSION['msg_login']);
                    unset($_SESSION['msg_login']);
                }
            ?>
            <label for="email" class="cols-sm-2 control-label"><p style="font-size:20px"><b>Email</b></p></label>
            <div class="cols-sm-10">
                <div class="input-group col-md-12">
				    <input type="email" class="form-control" name="email" id="email"  placeholder="meuemail@exemplo.com" autocomplete="off" value="" autofocus=""/ style="border-radius: 10px">
                </div>
            </div>
        </div>
        <div class="form-group col-md-12">
            <label for="password" class="cols-sm-2 control-label"><p style="font-size:20px"><b>Senha</b></p></label>
                <div class="cols-sm-10">
                    <div class="input-group">
				        <input type="password" class="form-control" name="password" id="password"  placeholder="Digite sua senha" autocomplete="off" value="" autofocus=""/ style="border-radius: 10px">
				    </div>
				</div>
        </div>
        <div class="form-group ">
            <button type="submit" class="btn btn-success btn-md">ENTRAR</button>
            <button type="reset" class="btn btn-primary" >LIMPAR</button>
        </div>
        <a href= "cadastro.php"><button type="button" class="btn btn-danger">Cadastrar</button></a><br><br>
    </form>
  </body>
</html>
