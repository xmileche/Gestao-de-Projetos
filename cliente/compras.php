<?php
      session_start();
      include('classBd/connection.php');
      
      //consultas

      

      #cpf vai vir da variavel de sessao, estou testando com um cpf genérico:
      #preciso que o leandro faça algo do tipo  $_SESSION['user-cpf'] = $clientes['cpf']; no login

      if(isset($_SESSION['usuario_cpf'])){
        $search_value_cpf = $_SESSION['usuario_cpf'];
      }
      
      //$search_value_cpf = "46798709860"; #Alterar essa atribuicao pela de cima
      
      $search_table_endereco = "SELECT * from endereco WHERE cpf_fk = '". $search_value_cpf."'";

      $result = $conn->query($search_table_endereco); 

      $num_moeda_comprada = 0;

      

      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $search_value_endid = $row["endereco_id"];
          $search_value_rua =  $row["rua"]; #mudar pra endereco
          $search_value_numero = $row["numero"]; #excluir isso no bd, vai fazer parte do endereco
          $search_value_cep = $row["cep"];
          $search_value_bairro = $row["bairro"];
          $search_value_cidade = $row["cidade"];
          $search_value_pais = $row["pais"];
          //$search_value_estado = $row["estado"];
        }
      }else{
        $search_value_rua =  $search_value_numero =  $search_value_bairro =  $search_value_cep =  $search_value_cidade =  $search_value_pais =  $search_value_estado = ""; 
      }


      $search_value_name = "SELECT nome from cliente WHERE cpf = '". $search_value_cpf."'";

      $result = $conn->query($search_value_name); 
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $search_value_nome = $row["nome"];
        }
      }else{
        $search_value_nome = "";
      }



    //step wizard:

    // step 1:
    if( isset($_POST["Moeda"]) && isset($_POST["Quantia"]) && is_numeric($_POST["Quantia"])) {
      $wizard_helper1 = "definido";
    }else{
      $wizard_helper1 = "indefinido";
    }

    //API

    if (isset($_POST["Moeda"]) && isset($_POST["Quantia"]) && is_numeric($_POST["Quantia"])) {
        $temp = $_POST["Moeda"];
        $exchange_api = 'https://api.exchangeratesapi.io/latest?base=' . urlencode($_POST["Moeda"]);
        $exchange_json = file_get_contents($exchange_api);
        $exchange_array = json_decode($exchange_json, true);
        $exchange_value = $exchange_array['rates']['BRL'];
        $val_flag1 = 1;
    }else{
      $temp = "";
      $exchange_value = 0;
      $val_flag1 = 0;
    }

    if ( (isset($_POST["Quantia"]) && isset($exchange_value )) && is_numeric($exchange_value) && is_numeric($_POST["Quantia"])) {
        $quantia_final = $_POST["Quantia"]*$exchange_value;

        $exchange_value = round ( $exchange_value , 2 );
        $quantia_final = round ( $quantia_final , 2  );

    }else{
      $quantia_final = 0;
    }

    if (isset($_POST["Quantia"]) && isset($exchange_value)) {
      $prefixo = 'R$';
      switch($temp){
        case 'USD':
            $prefixo = 'US $';
            $num_moeda_comprada = 2; 
            $full_name = "United States Dollar";
            break;
        case 'JPY':
            $prefixo = '¥';
            $full_name = "Japanese Yene";
            $num_moeda_comprada = 5;
            break;
        case 'CAD':
            $prefixo = 'C$';
            $full_name = "Canadian Dollar";
            $num_moeda_comprada = 3;
            break;
        case 'GBP':
            $prefixo = '£';
            $full_name = "Great Breatin Pound";
            $num_moeda_comprada = 4;
            break;
        case 'EUR':
            $prefixo = '€';
            $full_name = "Euro";
            $num_moeda_comprada = 6;
            break;
        case 'BRL':
            $prefixo = 'R$';
            $full_name = "Brazilian Real";
            $num_moeda_comprada = 1;
            break;
        
      }
    }else{
      $num_moeda_comprada = 0;
      $full_name = "";
      $prefixo = "";
    }


    

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="icons/favicon.ico"> <!-- alterei -->
  <link rel="stylesheet" href="styles/vendas.css">
  <link href="https://fonts.googleapis.com/css?family=Noto+Sans+HK&display=swap" rel="stylesheet">


  <title>Compras - UFSBRA Câmbio</title>

  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Include SmartWizard CSS -->
  <link href="styles/smart_wizard.css" rel="stylesheet" type="text/css" />

  <!-- Optional SmartWizard theme -->
  <link href="styles/smart_wizard_theme_dots.css" rel="stylesheet" type="text/css" />

</head>

<body style="font-family: 'Noto Sans HK', sans-serif;">

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
        if (isset($_SESSION['usuario_cpf'])) {
            ?>
      <a href="../cliente/Central_1.php"><button class="btn btn-success my-2 my-sm-0 mr-sm-2" type="submit"><img src="images/central_user.png" width="30px" height="30px"> Seja Bem Vindo <b><?php echo $_SESSION['usuario_nome'] ?></b></button></a>
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

  <main role="main">

    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
      <div class="container text-white">
        <h1 class="display-3 text-center">Venda de Moedas Estrangeiras</h1>
      </div>
    </div>

    <!-- olar -->

    <div class="container">
      <br />


      <!-- SmartWizard html -->
      <div id="smartwizard">
        <ul>
          <li><a href="#step-1">Passo 1<br /><small>Seleionar pedido</small></a></li>
          <li><a href="#step-2">Passo 2<br /><small>Selecionar pagamento</small></a></li>
          <li><a href="#step-3">Passo 3<br /><small>Endereço de entrega</small></a></li>
          <li><a href="#step-4">Passo 4<br /><small>Finalizar pedido</small></a></li>
        </ul>

        <div>
          <div id="step-1">
            <h2>Pedido:</h2>

            <form action="" method="post">

              <div id="form-step-0" role="form" data-toggle="validator">
                <div class="form-group">

                  <label for="moeda">Moeda Desejada:</label>

                  <!--onchange="this.form.submit()-->


                  <select name="Moeda" id="moedaDes" class="form-control"  >
                         <option value="" disabled selected>Selecione a moeda que deseja </option>
                         <option value="USD">(USD) Dólar americano</option>
                         <option value="BRL"> (BRL) Real brasileiro</option>
                         <option value="JPY">(JPY) Yene japonês</option>
                         <option value="EUR">(EUR) Euro</option>
                         <option value="CAD">(CAD) Dólar canadense</option>
                         <option value="GBP">(GBP) Libra esterlina</option>
                       </select>



                  <div class="help-block with-errors"></div>
                </div>
              </div>

              <div id="form-step-0" role="form" data-toggle="validator">
                <div class="form-group">

                  <label for="moeda">Sua Moeda:</label>

                  <!--onchange="this.form.submit()-->


                  <select name="MoedaPag" id="moedaPag" class="form-control"  >
                         <option value="" disabled selected>Selecione a moeda que deseja </option>
                         <option value="USD">(USD) Dólar americano</option>
                         <option value="BRL"> (BRL) Real brasileiro</option>
                         <option value="JPY">(JPY) Yene japonês</option>
                         <option value="EUR">(EUR) Euro</option>
                         <option value="CAD">(CAD) Dólar canadense</option>
                         <option value="GBP">(GBP) Libra esterlina</option>
                       </select>



                  <div class="help-block with-errors"></div>
                </div>
              </div>


              <div id="form-step-0" role="form" data-toggle="validator">


                <div class="form-group">
                  <label for="quantia">Valor Desejado:</label>
                  <?php if (isset($_POST["Quantia"]) && $_POST["Quantia"] > 0 && isset($_POST["Moeda"])) {
                      echo '<input class="form-control" name="Quantia" id="quantia" placeholder="'.$prefixo.' '.$_POST["Quantia"].',00">';
                  } else {
                      echo '<input class="form-control" name="Quantia" id="quantia" placeholder="Digite a quantia da moeda que deseja" >';
                  }
                ?>
                  <div class="help-block with-errors"></div>
                </div>

                <div class="form-group">

                  <button style="display: flex; justify-content: center;margin-top:40px; margin-bottom: 0;" class="form-group" stype="submit"> Calcular </button>

                </div>

            </form>

          </div>

          <div class="row">
            <div class="col-md-6 col-sm-6 col-12" style="margin:0 auto 0 auto;">
              <div class="row" style="text-align:center;">
              
              <?php if(isset($_POST["Moeda"])){
                echo '
                
                <div class="col-lg-1 col-md-1 col-sm-1 col-6 " style="margin: 30px auto 30px auto; ">
                  <img src="images/flags/'.$_POST["Moeda"].'-flag.png" class="product-image" style=" height:60px; width:60px;">
                </div>
                
                ';
              }
              ?>
              
                <div class="col-lg-5 col-md-5 col-sm-5 col-6" style="margin: 30px auto 30px 0;">
                  <?php if (isset($_POST["Moeda"]) && isset($_POST["Quantia"])) {
                        echo '
                          <div style="text-align:left;">
                          <h6> <strong> '.$prefixo.' 1,00 vale '.$exchange_value . 'R$ </strong></h6>
                          <label >Total a pagar:</label>
                          </div>
                          <input class="form-control" style="width:200px; height:40px;" type="text" placeholder=" R$ '.$quantia_final.'">';
                        }else{
                          echo '
                          <div style="text-align:left;">
                          <label >Total a pagar:</label>
                          </div>
                          <input class="form-control" style="width:200px; height:40px;" type="text" placeholder="Valor">';

                        }
                  ?>
                </div>
              </div>
            </div>
          </div>

        </div>




        <div id="step-2">
          <h2>Pagamento</h2>
          <div id="form-step-1" role="form" data-toggle="validator">
            <div class="form-group">
              <label for="moeda">Forma de Pagamento:</label>
              
              <select name="forma_pgto" id="select_pgto" class="form-control">
                <option value="" disabled selected>Selecione a forma de pagamento </option>
                <option value="credito">Cartão de Crédito</option>
                <option value="debito">Cartão de Débito</option>
              </select>
              
            <div class="help-block with-errors"></div>

            </div>
          </div>

          <div id="form-step-1" role="form" data-toggle="validator">
            <div class="form-group">
              <label for="quantia">Número do Cartão:</label>
              <input class="form-control" name="card_number" id="card_number" placeholder="Digite o número do cartão" required>
              <div class="help-block with-errors"></div>
            </div>
          </div>

          <div id="form-step-1" role="form" data-toggle="validator">
            <div class="form-group">
              <label for="quantia">Validade:</label>
              <label for="quantia" style="margin-left:30%" ;>CVV:</label>
              <div class="row" style="padding-left:3%;">

                <input class="form-control"  style="width:30%; margin-right:11%;" name="validade" id="validade" placeholder="mm/aa" required>

                <input class="form-control" style="width:30%;" name="quantia" id="cvv" placeholder="Código CVV" required>

              </div>

              <div class="help-block with-errors"></div>
            </div>
          </div>


        </div>



        <div id="step-3">
          <h2>Your Address</h2>
          <form>
          
        
          
            
            <div class="form-group">
              <label class="my-1 mr-2 font-weight-bold" style="font-weight:normal!important;" for="inlineFormCustomSelectPref">Rua:</label>
            
              <div class="input-group">
                <input type="text" style="font-weight:normal!important;" class="form-control" id="input_end"  value="<?php echo $search_value_rua; ?>"  required autofocus />
                <span class="input-group-addon" style="font-weight: normal!important;"><span class="glyphicon glyphicon-lock"></span></span>
              </div>
            </div>

            <div class="form-group" style="position:relative; margin-bottom:50px;">
              <div style="display:block;">
              
                <label class="my-1 mr-2 font-weight-bold" style="font-weight: normal!important;" for="inlineFormCustomSelectPref">Número:</label>        
                <!--<label class="my-1 mr-2 font-weight-bold" style="font-weight: normal!important;padding-left:55px" for="inlineFormCustomSelectPref">Estado:</label>-->
                <label style="padding-left:35px; font-weight: normal!important;" class="my-1 mr-2 font-weight-bold" for="inlineFormCustomSelectPref">CEP:</label>

                <div style="position:absolute;">
                  <input type="number" class="form-control" style="font-weight: normal!important;width:75px" id="input_numero" value="<?php echo $search_value_numero; ?>" required />
                </div>

              <!-- <div style="position:absolute; left:128px;">
                  <select name="input_estado" id="input_estado" style = "width:75px;"id="select_pgto" class="form-control">
                   
                      <option value=" <?php echo $search_value_estado; ?>" disabled selected> <?php echo $search_value_estado; ?></option>
                      <option value="AC">Acre</option>
                      <option value="AL">Alagoas</option>
                      <option value="AP">Amapá</option>
                      <option value="AM">Amazonas</option>
                      <option value="BA">Bahia</option>
                      <option value="CE">Ceará</option>
                      <option value="DF">Distrito Federal</option>
                      <option value="ES">Espírito Santo</option>
                      <option value="GO">Goiás</option>
                      <option value="MA">Maranhão</option>
                      <option value="MT">Mato Grosso</option>
                      <option value="MS">Mato Grosso do Sul</option>
                      <option value="MG">Minas Gerais</option>
                      <option value="PA">Pará</option>
                      <option value="PB">Paraíba</option>
                      <option value="PR">Paraná</option>
                      <option value="PE">Pernambuco</option>
                      <option value="PI">Piauí</option>
                      <option value="RJ">Rio de Janeiro</option>
                      <option value="RN">Rio Grande do Norte</option>
                      <option value="RS">Rio Grande do Sul</option>
                      <option value="RO">Rondônia</option>
                      <option value="RR">Roraima</option>
                      <option value="SC">Santa Catarina</option>
                      <option value="SP">São Paulo</option>
                      <option value="SE">Sergipe</option>
                      <option value="TO">Tocantins</option>
                      <option value="ES">Estrangeiro</option>

                  </select>           
               </div>-->
               
                    

          
                <div style="position:absolute; left:110px;">
                  <input type="text" style="width:150px; font-weight: normal!important;" class="form-control" id="input_cep"  value="<?php echo $search_value_cep; ?>" required />
                </div>


              </div>
            </div>

            
            
         
            <div class="form-group">
              <label class="my-1 mr-2 font-weight-bold" style="font-weight:normal!important;" for="inlineFormCustomSelectPref">Bairro:</label>
              <div class="input-group">
                <input type="text" style="font-weight:normal!important;" class="form-control" id="input_bairro"  value="<?php echo $search_value_bairro; ?>"  required autofocus />
                <span class="input-group-addon" style="font-weight: normal!important;"><span class="glyphicon glyphicon-lock"></span></span>
              </div>
            </div>



            <div class="form-group">
              <label class="my-1 mr-2 font-weight-bold" style="font-weight: normal!important;" for="inlineFormCustomSelectPref">Cidade:</label>
              <div class="input-group">
                <input type="text" class="form-control" id="input_cidade" value="<?php echo $search_value_cidade; ?>" required autofocus />
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
              </div>
            </div>

            <div class="form-group" style="position:relative; margin-bottom:50px;">
              <div style="display:block;">
              

              <div style="position:relative; ">
                  <label> <input type="checkbox" id="input_update" > Salvar Endereço </label>
                </div>

              </div>
            </div>

           

          </form>

        </div>


        <div id="step-4" class="sw-main sw-theme-dots">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <div class="center-wrapper">
            <div class="content">

              <div class="bag-product">
                <div>
                 <?php echo '<img src="images/flags/'.$_POST["Moeda"].'-flag.png" class="product-image">'; ?>
                </div>
                <div class="description">
                  
                  <h1 id="resumo-pedido">Resumo do pedido:</h1>

                  <p class="description-text"> <?php echo '('.$temp.') '.$full_name.''; ?></p>

                  <div class="quantity-wrapper">
                    <div>
                      <p style="margin-bottom:">Valor desejado:</p>
                      <h3> <?php echo ''.$prefixo.' '.$exchange_value.' ('.$temp.')';?></h3>


                    </div>

                  </div>
                </div>
              </div>
              <div class="bag-total">

                <div class="delivery">
                  <p class="small">Entrega padrão ( 4 dias úteis) - gratuita<br>


                </div>
                <div class="total">
                  <h3>Total:</h3>
                  <h3> <?php echo 'R$ '.$quantia_final .''; ?> </h3>
                </div>

                <div class="acc-type-address">
                  <div class="acc-payment-address-header"><span class="acc-payment-open-icon"></span><strong class="acc-payment-title"> <br>
                      <span class="acc-payment-featured">
                        <?php echo $search_value_nome; ?>
                      </span>
                    </strong></div>
                  <div class="acc-payment-address-body">
                    <p>
                    <?php echo ''.$search_value_rua.', '.$search_value_numero; ?>
                      <br>
                      <?php echo $search_value_bairro; ?>
                      <br>
                      <?php echo ''.$search_value_cidade;//','.$search_value_estado; ?>
                      <br>
                      <br>CEP: <?php echo $search_value_cep; ?>
                    </p>
                  </div>
                </div>


              </div>

            </div>
          </div>


        </div>
      </div>
    </div>

    </div>


  </main>

  <footer class="bg-dark" style="margin-top:100px;">
    <p class="h6 text-center text-light pb-4 pt-4 mb-0">UFSBRA Câmbio - 2019 &copy; Todos os direitos reservados</p>
  </footer>

  <!-- Include jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <!-- Include jQuery Validator plugin -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>


  <!-- Include SmartWizard JavaScript source -->
  <script type="text/javascript" src="js/jquery.smartWizard.min.js"></script>

  <script type="text/javascript">



    $(document).ready(function() {
      
      

      // Toolbar extra buttons
      var btnFinish = $('<button type="button" class="btn btn-dark">Dark</button>').text('Finalizar')
        .addClass('btn btn-info')
        .on('click', function() {
          if (!$(this).hasClass('disabled')) {
            var elmForm = $("#myForm");
            if (elmForm) {
              elmForm.validator('validate');
              var elmErr = elmForm.find('.has-error');
              if (elmErr && elmErr.length > 0) {
                alert('Por favor, preencha o formulário corretamente!');
                return false;
              } else {  

                var quantia_final = <?php echo $quantia_final; ?>;
                var select_pgto = document.getElementById("select_pgto").value;
                var input_end = document.getElementById("input_end").value;
                var input_bairro = document.getElementById("input_bairro").value;
                var input_cidade = document.getElementById("input_cidade").value;
                var input_cep = document.getElementById("input_cep").value;
                //var input_estado = document.getElementById("input_estado").value;
                var input_update = document.getElementById("input_update").checked;
                var input_numero = document.getElementById("input_numero").value;
                
                $.ajax({
                  url: "classBd/controllerInsert.php",
                  //url: 'teste.php',
                  method: 'post',
                  dataType: 'html',
                  data  : {"valor": quantia_final,
                            "cpf": <?php echo $search_value_cpf; ?>,
                            "forma_pgto": select_pgto,
                            "moeda_usada": 1,
                            "moeda_comprada": <?php echo $num_moeda_comprada; ?>,
                            "status":"Pagamento Pendente",
                            "endereco": input_end,
                            "bairro": input_bairro,
                            "cidade": input_cidade,
                            "cep": input_cep,
                           //"estado":input_estado,
                            "numero": input_numero,
                            "input_update": input_update,
                            "end_id": <?php echo $search_value_endid; ?> 
                  },
                  error: function(){
                    alert('Erro: Pedido não efetuado!');
                  },
                  success : function(result){
                    //alert('Pedido Efetuado com Sucesso!');
                    window.location.replace("includes/pedidoSucesso.php");

                  }
                  
                 
                });
                
              }
            }
          }

          
        });
      var btnCancel = $('<button></button>').text('Cancel')
        .addClass('btn btn-danger')
        .on('click', function() {
          $('#smartwizard').smartWizard("reset");
          $('#myForm').find("input, textarea").val("");
        });



      // Smart Wizard
      $('#smartwizard').smartWizard({
        selected: 0,
        theme: 'dots',
        transitionEffect: 'fade',
        toolbarSettings: {
          toolbarPosition: 'bottom',
          toolbarExtraButtons: [btnFinish /*, btnCancel*/ ]
        },
        anchorSettings: {
          markDoneStep: true, // add done css
          markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
          removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
          enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
        }
      });

      $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
        var elmForm = $("#form-step-" + stepNumber);
        // stepDirection === 'forward' :- this condition allows to do the form validation
        // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
        if (stepDirection === 'forward' && elmForm) {
          elmForm.validator('validate');
          var elmErr = elmForm.children('.has-error');
          if (elmErr && elmErr.length > 0) {
            // Form validation failed
            return false;
          }

          var
            card_number = $('#card_number'),
            validade = $('#validade'),
            cvv = $('#cvv'),
            endereco = $('#end'),
            cidade = $('#cidade'),
            //estado = $('#estado'),
            valor_desejado = $('#Quantia');
            moeda_desejada = $('#Moeda');
            moeda_usada =$('#MoedaPag');

          /****** testing for step 1: ******/
          var step1_checker1 = "<?php echo $wizard_helper1 ?>";
         
          if ( step1_checker1 == "indefinido" && stepNumber == 0 && ( valor_desejado.val() === undefined|| moeda_desejada.val() === undefined ||
               moeda_usada.val() === undefined || !isNaN(document.getElementById("quantia").value))) {
            

            if(document.getElementById("moedaDes").value == "" ){
              document.getElementById("moedaDes").style.borderColor="red";
            }else{
              document.getElementById("moedaDes").style.borderColor="#ced4da";
            }

            if(document.getElementById("quantia").value == "" || isNaN(document.getElementById("quantia").value) ){
                document.getElementById("quantia").style.borderColor="red";
                document.getElementById("quantia").placeholder = 'Valor Inválido!';
            }else{  
              document.getElementById("quantia").style.borderColor="#ced4da";
              document.getElementById("quantia").placeholder = document.getElementById("quantia").value;
            }


            if(document.getElementById("moedaPag").value == "" ){
                document.getElementById("moedaPag").style.borderColor="red";
            }else{  
              document.getElementById("moedaPag").style.borderColor="#ced4da";
            }

            return false;
          }

          /****** testing for step 2: ******/

          if ( (document.getElementById("select_pgto").value == "" || card_number.val() == "" || card_number.val().toString().length != 16 || validade.val().toString().length != 8 
              || cvv.val().toString().length  != 3 || isNaN(cvv.val().toString()) ) && stepNumber == 1) {
            
            if(document.getElementById("select_pgto").value == "" ){
              document.getElementById("select_pgto").style.borderColor="red";
              document.getElementById("select_pgto").placeholder = 'Valor Inválido!';

            }else{
              document.getElementById("select_pgto").style.borderColor= "#ced4da";              
            }

            if(document.getElementById("card_number").value == "" ||  card_number.val().toString().length != 16){
              document.getElementById("card_number").style.borderColor="red";
              document.getElementById("card_number").placeholder = 'Valor Inválido!';

            }else{
              document.getElementById("card_number").style.borderColor="#ced4da";

            }

            if(validade.val().toString().length !=8){
              document.getElementById("validade").style.borderColor="red";
              document.getElementById("validade").placeholder = 'Valor Inválido!';


            }else{
              document.getElementById("validade").style.borderColor="#ced4da";              
            }

            if(cvv.val().toString().length  != 3 || isNaN(cvv.val().toString())){
              document.getElementById("cvv").style.borderColor="red";
              document.getElementById("cvv").placeholder = 'Valor Inválido!';
            }else{
              document.getElementById("cvv").style.borderColor="#ced4da";
            }


            return false;
          }


          /****** testing for step 3: ******/
       
          if ((endereco.val() == "" || cidade.val() == "" ) && stepNumber == 2) {
            
        
          

            return false;
          }

        }
        return true;
      });

      $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
        // Enable finish button only on last step
        if (stepNumber == 3) {
          $('.btn-finish').removeClass('disabled');
        } else {
          $('.btn-finish').addClass('disabled');
        }
      });

    });
  </script>
</body>

</html>
