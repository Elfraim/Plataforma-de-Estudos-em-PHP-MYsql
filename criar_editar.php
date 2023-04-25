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





 if(!empty($_GET['conteudo'])){

  include_once('config.php');
  $conteudo =$_GET['conteudo'];

  
  $sele= "SELECT * FROM cronograma WHERE  materia = '$conteudo' AND usuario = '$logado'";

$result = $conecta->query($sele);
  
 

  if($result->num_rows > 0)
  {

    while($user_data = mysqli_fetch_assoc($result)){

  $materia =$user_data['nomeconcurso'];
  $conteudo =$user_data['materia'];
  $areaconhecimento= $user_data['areaconhecimento'];
  $video = $user_data['linkaula'];
  $link = $user_data['links'];
  $descricao = $user_data['descricao'];
  
    }

  }
  
  else{
  
  header('Location: home.php');

  }

  }


if(isset($_POST['submit'])){


 

print_r($_POST['nome']);
print_r($_POST['username']);
print_r($_POST['senha']);
print_r($_POST['nasc']);

$materia =$_POST['materia'];
$conteudo = $_POST['conteudo'];
$areaconhecimento= $_POST['areaconhecimento'];
$video = $_POST['video'];
$link = $_POST['link'];
$descricao = $_POST['descricao'];
$resultado= mysqli_query($conecta,"INSERT INTO cronograma (nomeconcurso,areaconhecimento,materia,linkaula,links,usuario,descricao) VALUES ('$materia','$areaconhecimento','$conteudo','$video','$link','$logado','$descricao');");

echo 'alert(cadastrado com sucesso!);';
header('Location: home.php');
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
          
          <form method="post"  id="form" ectype="multipart/formdata">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Matéria;</label>
      <input type="text" class="form-control" id="materia" placeholder="Materia principal" name="materia" required="" 
      value="<?php if(!empty($conteudo)){
    echo $materia;
}  ?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Contéudo</label>
      <input type="text" class="form-control" id="conteudo" required="" placeholder="Contéudo para estudar" name="conteudo" 
      value="<?php if(!empty($conteudo)){
    echo $conteudo;
}  ?>"
      >
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputAddress">Selecione uma Aréa de conhecimento da sua matéria:</label>
    <select required="" value="0"class="col-12" name="areaconhecimento">
           <option>Ciências Exatas e da Terra</option>
           <option> Ciências Biológicas</option>
           <option> Engenharia</option>
           <option>Tecnologia</option>
           <option> Ciências da Saúde</option>
           <option> Ciências Agrárias</option>
           <option> Ciências Sociais</option>
           <option>Ciências Humanas</option>
           <option> Lingüística</option>
           <option> Letras</option>
           <option>Artes</option>
</select>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Link video:</label>
    <input onblur="mudar();" type="text" id="linkv" required="" placeholder="Ex:https://www.youtube.com/wa.. COLOQUE SEU LINK AQUI" name="linkv" onclass="form-control" 
    value="<?php if(!empty($conteudo)){
    echo $video;
}  ?>">
 
</div><div class="form-group">
    <input style="border: none;" onblur="mudar();" type="text" id="video" required="" placeholder="Ex: https://www.youtube.com/watch?v=..." disabled="true" name="video" onclass="form-control" src="">
  </div><div class="form-group">
    
  
  <label for="inputAddress2">Coloque um Link de site para consulta neste conteudo :</label>
    <input type="text" class="form-control" id="link" required="" placeholder="Ex: aula sobre.." name="link"
      value="<?php if(!empty($conteudo)){
    echo $video;
}  ?>"
      >

   
  <div style="margin: 3% ;width:100%" class="form-group">
    <label name="arquivo" for="exampleFormControlFile1" >Descreva seu conteudo:</label>
    <br>

    <input class="form-control" name="descricao" name="link"
      value="<?php if(!empty($conteudo)){
    echo $descricao;
}  ?>" type="text" class="form-control-file"  placeholder="Descreva seu conteudo" id="exampleFormControlFile1">
    <br>
  </div>

  </div>
  
  <div class="form-group">
    
  </div>
  <button style=" <?php if(!empty($conteudo)){
    echo "display:flex !important;";
}  ?> display:none;  margin-left: calc(6.5rem + 6vw);margin-right: auto;" name="submit"id="submit" onclick="document.getElementById('form').action = 'saveEdit.php';"
class="justify-content-center btn btn-primary" name="envio">Editar</button> 

  <button type="submit" style=" <?php if(!empty($conteudo)){
    echo "display:none !important;";
}  ?>     margin-left: calc(6.5rem + 6vw);margin-right: auto;"
 name="submit"id="submit" class="justify-content-center btn btn-primary" onclick="document.getElementById('form').action = 'criar_editar.php';">Continuar</button>
</form>
          
          
    
        </div> <div class="col-10 col-md-8 col-lg-6 my-3 p-3 bg-white rounded shadow-sm" style="
    margin: auto;
    padding: 0 !important;
  ">
          
          
          
          
          
        </div>
  
        
  
        
      </main>
  <script>
function mudar(){
    var exemplo = document.getElementById('linkv');
    var video = document.getElementById('video');
    
var resultado = exemplo.value.replace("watch?v=", "embed/");
var resultado = exemplo.value.replace("shorts/", "embed/");
exemplo.disabled=true;
video.disabled=false; 
video.value=resultado;

}



  </script>
      <!-- Principal JavaScript do Bootstrap
      ================================================== -->
      <!-- Foi colocado no final para a página carregar mais rápido -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  
    
  </header></body></html>