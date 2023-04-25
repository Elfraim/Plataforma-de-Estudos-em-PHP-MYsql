<?php
include_once('config.php');
session_start();
$logado = $_SESSION['username'];

if((!isset($_SESSION['username']) == true ) and (!isset($_SESSION['senha']) == true ) )
{
  unset($_SESSION['username']);
  unset($_SESSION['senha']);
header('Location: login.php');
}





 if(!empty($_GET['areaconhecimento'])){

  include_once('config.php');
  $id =$_GET['id'];

  
  $sele= "SELECT * FROM cronograma WHERE  id = '$id' AND dono = '$logado'";

$result = $conecta->query($sele);
  
 

  if($result->num_rows > 0)
  {

    while($user_data = mysqli_fetch_assoc($result)){

  $dono =$logado;
  $enunciado =$user_data['enunciado'];
  $a= $user_data['a'];
  $b = $user_data['b'];
  $c = $user_data['c'];
  $d = $user_data['d'];
  $e = $user_data['e'];
  $resposta =$user_data['resposta'];
  $justificativa =$user_data['justificativa'];
    }

  }
  
  else{
  
  header('Location: home.php');

  }

  }


if(isset($_POST['submit'])){

echo 'alert('.$resposta.')';


$dono =$logado;
$enunciado = $_POST['enunciado'];
$a= $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$resposta =$_POST['resposta'];
$justificativa =$_POST['justificativa'];
$resultado= mysqli_query($conecta,"INSERT INTO questoes (dono,enunciado,a, b, c, d,  resposta, justificativa)
 VALUES ('$logado',  '$enunciado', '$a', '$b', '$c', '$d',  '$resposta', '$justificativa')");

echo 'alert(cadastrado com sucesso!);';
header('Location: questoes.php');
}


?>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="estilo.css" ></link>
    <title>Document</title>
  </head>
  <body onmousemove="prev();">
    <header id="header" style="
    width: 100%;
    height: 100%;
  ">
    
    <main role="main" class="container" style="
    background-color: #f8f9f9;
  ">
        <div class="row" style="
  ">
  
  
  
            
                    </div>
  
  
  
                        
                        
                       
                        
                        <div class="container" style="
  ">
                            <div class="row" style="
    ">
                                <div class="col-lg-12 layout-spacing" style="">
                                    <div class="statbox widget box box-shadow" style="">
                                        <div class="widget-header" style="
    height: 10%;
  ">
                                            <div class="row">
                                                <div class="col-xl-12 col-md-12 col-sm-12 col-12" style="height:calc(2.5rem + 2.5vw);z-index: 1;">
                                                    <button class="pb-0" onclick="window.history.back();"style="height:calc(1.5rem + 1.5vw);border:0;background-color: transparent">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg> Voltar </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content widget-content-area" style="
    padding: 0;
    height: 65%;
  ">
                                            <div class="row">
                                                <div class="scrollmenu " style="
                                                overflow: visible;
                                                width: 128%;
                                                height: fit-content;
                                            ">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
  
  
        <div class="col-10 col-md-8 col-lg-6 my-3 p-3 bg-white rounded shadow-sm" style="
    margin: auto;
    padding: 0 !important;
  ">
          
          <form method="post" action="cria_editaprova.php" id="form" ectype="multipart/formdata">
          <div class="form-group">
    <textarea   type="text" required="" placeholder=" Digite o enunciado da questão" style="margin: 5%;" name="enunciado" onclass="form-control" src=""></textarea>
  </div><div class="form-group">
  <div class="form-group">
  <div class="form-group">
    <textarea    type="text" required="" placeholder=" Alternativa A" style="margin: 5%;" name="a" onclass="form-control" src=""></textarea >
  </div><div class="form-group">
  <div class="form-group">
  <div class="form-group">
    <textarea    type="text" required="" placeholder=" Alternativa B" style="margin: 5%;" name="b" onclass="form-control" src=""></textarea >
  </div><div class="form-group">
  <div class="form-group">
  <div class="form-group">
    <textarea   type="text" required="" placeholder=" Alternativa C" style="margin: 5%;" name="c" onclass="form-control" src=""></textarea >
  </div><div class="form-group">
  <div class="form-group">
    <textarea    type="text" required="" placeholder=" Alternativa D" style="margin: 5%;" name="d" onclass="form-control" src=""></textarea >
  </div><div class="form-group">
    
  
  <label for="inputAddress2">Selcione a resposta :</label>
   <select name="resposta">
   <option value="a">A</option>
   <option value="b">B</option>
   <option value="c">C</option>
   <option value="d">D</option>
   
</select >

   
  <div style="margin: 3% ;width:100%" class="form-group">
    <label name="arquivo" for="exampleFormControlFile1" >Escreva a Justificativa da questão:</label>
    <br>

    <textarea class="form-control" name="justificativa" name="link"
      value="<?php if(!empty($justificativa)){
    echo $justificativa;
}  ?>" type="text" class="form-control-file"  placeholder="Justifique sua Resposta" id="exampleFormControlFile1"></textarea>
    <br>
  </div>

  </div>
  
  <div class="form-group">
    
  </div>

  <button type="submit"     margin-left: calc(6.5rem + 6vw);margin-right: auto;"
 name="submit"id="submit" class="justify-content-center btn btn-primary" href="criar_editarprova.php">Continuar</button>
</form>
          
          
    
        </div> <div class="col-10 col-md-8 col-lg-6 my-3 p-3 bg-white rounded shadow-sm" style="
    margin: auto;
    padding: 0 !important;
  ">
          
          
          
          
          
        </div>
  
        
  
        

  <!-- FOOTER -->
  <footer class="container">
    <p class="float-end"><a href="#">Back to top</a></p>
    <p>© 2023 Efraim Oliveira Melo <a href="#"></a> · <a href=""></a></p>
  </footer>
</main>

      <!-- Principal JavaScript do Bootstrap
      ================================================== -->
      <!-- Foi colocado no final para a página carregar mais rápido -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
    
  </header></body></html>