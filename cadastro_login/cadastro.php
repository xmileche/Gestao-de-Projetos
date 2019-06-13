<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../cambio.png">

    <title>Cadastro - UFSBRA Câmbio</title>

    <!-- Bootstrap core CSS -->
        <!-- Bootstrap core CSS -->
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      


    <!-- Custom styles for this template -->
    <link href="cadastro.css" rel="stylesheet">
  </head>
  <body class="text-center">
    <form class="form-signin mx-5" method="post" action="cadastro_back.php" style="background-color: rgba(0, 0, 0, 0.8); border-radius: 30px"><br>
        <div class="form-group text-white">
        <img class="mb-4" src="Imagens/cambio.png" alt="" width="9%" height="9%">
        <h1 class="h2 mb-3 text-warning">UFSBRA Câmbio - Cadastro</h1>
        <div class="row">
        <div class="col-md-12">
          <form class="needs-validation">
            <h5 class="mb-3 mt-4 bg-warning text-dark">DADOS PESSOAIS</h5>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="nome completo">Nome Completo</label>
                <input type="text" class="form-control" style="text-align: center" name="name" id="name" placeholder="Digite aqui seu nome completo" value="" required>
              </div>
              <div class="col-md-3 mb-3">
                <label for="rg">RG</label>
                <input type="text" class="form-control" style="text-align: center" name="rg" id="rg" placeholder="Apenas digitos" value="" required>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control" style="text-align: center" name="cpf" id="cpf" placeholder="Apenas digitos" value="" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="senha">Senha</label>
                <input type="password" class="form-control" style="text-align: center" name="senha" id="senha" placeholder="Digite aqui sua senha" value="" required>
              </div>
              <div class="col-md-6 mb-3">
                <label for="csenha">Confirme sua senha</label>
                <input type="password" class="form-control" style="text-align: center" name="csenha" id="csenha" placeholder="Digite aqui sua senha" value="" required>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label for="nascimento">Data de Nascimento</label>
                <input type="date" class="form-control" style="text-align: center" name="nascimento" id="nascimento" placeholder="00/00/0000" value="" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="pais de nascimento">País</label>
                <input type="text" class="form-control" style="text-align: center" name="pais" id="pais" placeholder="Digite aqui seu país de nascimento" value="" required>
              </div>
               <div class="col-md-4 mb-3">
                <label for="exampleFormControlSelect1">Estado Civil</label>
                    <select class="form-control" name="civil" id="civil">
                        <option value="Solteiro(a)">Solteiro(a)</option>
                        <option value="Casado(a)" >Casado(a)</option>
                    </select>
                </div>
            </div>
            <h5 class="mb-3 mt-4 bg-warning text-dark">ENDEREÇO</h5>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="logradouro">Logradouro</label>
                    <input type="text" class="form-control" style="text-align: center" name="logradouro" id="logradouro" placeholder="rua, avenida, rodovia, etc" value="" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" style="text-align: center" name="cep" id="cep" placeholder="00000-000" value="" required>
                </div>  
                <div class="col-md-3 mb-3">
                    <label for="numero">Número</label>
                    <input type="number" class="form-control" style="text-align: center" name="numero" id="numero" placeholder="Meu número" value="" required>
                </div>          
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" style="text-align: center" name="cidade" id="cidade" placeholder="Digite aqui sua cidade" value="" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" style="text-align: center" name="bairro" id="bairro" placeholder="Digite aqui seu bairro" value="" required>
                </div>          
            </div>
            <h5 class="mb-3 mt-4 bg-warning text-dark">CONTATO</h5>
            <div class="row">
                <div class="col-md-4 mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" style="text-align: center" name="email" id="email" placeholder="meuemail@exemplo.com" value="" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control" style="text-align: center" name="telefone1" id="telefone1" placeholder="(00)0000-0000" value="" required>
              </div>
              <div class="col-md-4 mb-3">
                <label for="celular">Celular</label>
                <input type="text" class="form-control" style="text-align: center" name="telefone2" id="telefone2" placeholder="(00)00000-0000" value="" required>
              </div>
            </div>
          </form>
        </div>
      </div>
        <div class="form-group pt-5">
            <button type="submit" class="btn btn-success btn-md">CADASTRAR</button>
            <button type="reset" class="btn btn-primary" >LIMPAR</button>
        </div>
        <a href= "login.php" ><button type="button" class="btn btn-danger">Já possuo uma conta</button></a><br>
        </div>
    </form>
      
    <script type="text/javascript">
        $("#cpf").mask("00000000000");
        $("#rg").mask("000000000");
        $("#cep").mask("00000-000");
        $("#telefone1").mask("(00)0000-0000");
        $("#telefone2").mask("(00)00000-0000");
    </script>
      
    <!-- Include jQuery -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> -->

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
