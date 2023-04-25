<?php 
session_start();

include_once('config.php');

if((!isset($_SESSION['username']) == true ) and (!isset($_SESSION['senha']) == true ) )
{
  unset($_SESSION['username']);
  unset($_SESSION['senha']);
header('Location: login.php');
}
$logado = $_SESSION['username'];


$sql = "SELECT * FROM cronograma where usuario='$logado'  ORDER BY hoje ASC ";

$result = $conecta->query($sql);
 
$n_pen = 0 ;

?>


<html lang="pt-br"><head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="estilo.css"></link>
  <title>Plataforma de estudos- Efraim</title>
</head>
<body id="bod" style=""  onload="pendente()"  background-color: #f8f8f9;
">
  <header id="header" style="
  width: 100%;
  height: 100%;    background-color: #f8f8f9;

">
  

<div id="loading" class="loader"></div>


  <main id="conteudo" role="main" class="container" style="
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
                                              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                  <h4 class="pb-0">Menu</h4>
                                              </div>
                                          </div>
                                      </div>
                                      <div class="widget-content widget-content-area" style="
  padding: 0;
  height: 65%;
">
                                          <div id="list" class="row">
                                              <div class="scrollmenu " style="
                                              overflow: visible;
                                              width: 128%;
                                              height: fit-content;
                                          ">
                                                  <div id="content_1" class="col-12 tabcontent story-area" style="
  display: inline-block;
"> 
                                                      <div class="col-12  scrollmenu" style="
    overflow: visible;
    overflow-y: hidden;
    height: calc(9rem + 7vw);
    background-color: transparent!important;
    overscroll-behavior: none;
    margin: 0;
    padding: 0;
    overflow-x: visible;
">
                                                          <div class="  single-create-story" style="
  /* margin: auto; */
  height: 100%;
  margin-top: 16px absolute!important;
  width: 100%;
  vertical-align: super;
  display: inline-block;
  color: white;
  text-align: center;
  text-decoration: none;
  max-width: calc(9rem + 2.5vw);
  max-height: 3px;
">
                                                            <a href="criar_editar.php">  <img class=" rounded-circle single-create-story-bg" style="
 
"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkffZT_SCVDt5v8gMjpVEArnQFRwfWduBMVA&usqp=CAU" rounded-circle="">
                                                              <p style="
  color: black;
">Nova Aula</p></a>
                                                          </div>
                                                          <div class="a single-story" style="  padding-bottom: 199px;
">
                                                             
                                                                  <a >
                                                             
<button type="button" class="btn  position-relative" style="
    padding: 0px;
    border-radius: 100%;
">
    <img type="button"  class="b rounded-circle single-create-story-bg" src="https://cdn-icons-png.flaticon.com/512/217/217888.png" style="
">
</button>
                                                             
                                                             
                                                             <p style="
  color: black;
">Meus conteudos</p></a>
                                                              
                                                          </div>

                                                         



                                          <div class="a single-story" style="  padding-bottom: 199px;
">
                                                              
                                                                  <a href="questoes.php"><img id="3" class="b rounded-circle single-create-story-bg" style="
 
"  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAOEAAADhCAMAAAAJbSJIAAAAZlBMVEX///9NTU0+Pj7U1NTa2trR0dFHR0dKSkqQkJBmZmby8vJpaWk6OjpDQ0Pv7++pqamEhIT5+flcXFydnZ1VVVV0dHTf39+vr6+Xl5eenp7o6OioqKi2trZaWlosLCyAgIBwcHC/v785KSAzAAAELUlEQVR4nO3d4VLqMBCG4TZAIpgicGxV1IPn/m/yCDqdItskTbLt1vnev1bxmUXapgWLAiGEEEIIIYQQQgghhBBCCKFxaxYrWS2anLzVSVklLatOq0y+bW11KTFt600O4LGS6Tun9TEduNVmaocjY9Kn+CF3gud0nQpc2akNnuwiUVjLHuHnEHdpwL30EZZllSZcqqkB3mzay+lCvlAtf70w7aUGQgFBCCGE0wchhBBOH4QQQjh9EEIIYWrpy82ihUZVj1olrldKFqr6vIjU1GmPIVionr8f5DVpUVauUP1pH+UphShW2AEWxUMCUarwCpg0RaHCH8AUokzhDTCBKFJIAOOJEoXtbiILUaCQnOC516gHkyfsmeC5j5ijVHHC3gnGPpo0oWOCkdfUhQmdwKKoZi/0ALezn6EHWLzNfYY+4D7qjF+Q0Acs7qPO9uUImYDsQmMCn1lcQGahtu/rQ9BSEhuQV6jq883Wx53/qcwHZBW2B2Bvvv0YI5BTqF7azTxETiCj8OoQ2klkBfIJOxP0EHmBbMLwpSR1xwrkEhJneT1TZJ4gl9C+ENuSU+SeIJNQUUCSyA9kEVZ9T7wb4ghADqE59G7+gzgGkENY/evf/oo4CpBD6Lz9v0McB8ghVFvXd7TEkYAsQve7N7+vBY4FZPk7pPcVbZcpjgbk2Vt43vP3akcEsgjN+979XQ9/xwPyHNPog4fo2J/kBjIdl3qJ4wG5zi2SiFmBbOeHCcT7mLX78YXxxMxAxnWaSGJuIOdaWxQxO5B1vTSC6H6RMbot/CoU65r3YKIHeNi11cFE5usW/SfDw4Gl7hwJNcEXvZivPQ2aom8/2BWGv02e++raAKJ3Ry9TGE70v4oKFYYSA3YTUoVhxJD9oFhhCDFoRy9X6N9phJ1NCBb6phh4uiRZ6CaGng+KFpa6f+0m+IRXtrDUjz3E8DN64cJPIrnIOGDJQrqQJg5ZkxEvpJ6ogxad5AtvpzhsVW0Gwp9THLhsOAfh9RSHrovOQtid4nrowu88hJ/Er8uL28HAuQhLo+5Wy9Vz5V5KMkRVV2ipLaifOcVd0Fop31217/dros6NVs2B2mBNEOXc592teor7dTbURXeZwoe4X2cLIYQQQgghhBDOSKhf9hui7skl9fVNQyydyxReDl1v/59D58PHl3+pLahrA0KFNHsmZ0/xQUgHIYQQ5gxCOgghhDBnENJBCCGEOYOQDkIIpxKKuVc/b/LeUSIiCCGEcPoghBDC6YMQQginD0IIIZw+CCH89cIm6R+GjZLzQw4Dkj/DKg1YnLJ+ahVDeudHOFtIf5ratD9D+UPUp1RgsRmw/Dx+xiR9NN5XRyN3irp0fpZqaJvayjRqe8owwUuLk7LUTcmTZtVumcl3qVlKy/1JuAghhBBCCCGEEEIIIYQQQgjl7z+4NYXO1y9+tQAAAABJRU5ErkJggg==" rounded-circle="">
                                                              <p style="
  color: black;
">Provas</p></a>
                                                             
                                                          </div>
                                                              <div class="a single-story" style="  padding-bottom: 199px;
">
                                                             
                                                                  <a href="explorar.php"><img id="4"class="b rounded-circle single-create-story-bg" style="
  margin-left: 0px;
  width: 93%;
  
"  src="data:image/jpeg;base64,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" rounded-circle="">
                                                              <p style="
  color: black;
">Explorar</p></a>
                                                              </div>                 

                                                              <div class="a single-story" style="  padding-bottom: 199px;
">
                                                              
                                                                  <a href="sair.php" ><img id="3" class="b rounded-circle single-create-story-bg" style="
 
"  src="data:image/png;base64,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" rounded-circle="">
                                                              <p style="
  color: black;
">Sair</p></a>
                                                             
                                                          </div>      
 
</div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </di>
                          </div>





     <div id="a1"class=" row col-10 col-md-8 col-lg-6 my-3 p-3 bg-white rounded shadow-sm" style="
  margin: auto;
  padding: 0 !important;
">

<div style="    background-color: #f8f9f9;
    padding: 1%;">
      <?php

//define a data atual com base no horario de são paulo
  setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');

$data_extenso = strftime('%A, %d de %B de %Y', strtotime('today'));

  echo '<h4 >'; echo utf8_encode($data_extenso);echo '</h4>';

?>


      <h3 style=" background-color: #f8f9f9;
    padding: 5%; height:3%;margin:0:margin-bottom:5%" >Conteudos criados:</h3>
</div> 
      <br>
      
      <?php 
      
 $mostra = 0;
while($user_data = mysqli_fetch_assoc($result))
{



  $data =new DateTime($user_data['hoje']);
  $hoje = date('d/m/Y',strtotime('-4 hours'));
  $datastr = $data->format('d/m/Y');
  $hora = $data->format('h:i');


   

    $aspa = "'";
  //getDate(strtotimes($now));
  

//exibe a data dos conteudos antigos 
  if($datastr > $hoje ){
  $data_extenso = strftime('%A, %d de %B de %Y', strtotime($user_data['hoje']));
  echo '<h4 >';echo utf8_encode($data_extenso); echo '</h4>';
  }

  $conteudo= $user_data['materia'];
  $dono = $user_data['usuario'];
  $concluido= $user_data['concluido'];
  
      //exibe o conteudo correspondente com o link para visualização e se o conteudo e publico ou privado 
  echo' 

 <a style="text-decoration:none"class="col-12" href="explorar.php?conteudo='.$conteudo.'&concluido='.$user_data['concluido'].'&dono='.$dono.'">';
  if ($user_data['publicacao']=='publico'){
    $conteudo= $user_data['materia'];
    $dono = $user_data['usuario'];
    $concluido= $user_data['concluido'];
    
    //checa se o conteudo e publico
    echo' 
  

<p class="col-3" style="
    height: 0px;float:right;
">público<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe-americas" viewBox="0 0 16 16">
    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"></path>
  </svg></p>';
  } else if ($user_data['publicacao']=='privado' || $user_data['publicacao']==null){

    //ou checa se o conteudo e privado
    echo'<p class="col-3" style="
    height: 0px;float:right
">privado<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lock" viewBox="0 0 16 16">
<path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 5.996V14H3s-1 0-1-1 1-4 6-4c.564 0 1.077.038 1.544.107a4.524 4.524 0 0 0-.803.918A10.46 10.46 0 0 0 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h5ZM9 13a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1v-2Zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1Z"/>
</svg></p>';
  }
  echo ' 
  
            <div data-src="holder.js/32x32?theme=thumb&amp;bg=007bff&amp;fg=007bff&amp;size=1" alt="32x32" class=" rounded-circle" style="width: auto;height: 42px;float: left;    margin-left: calc(1.2rem + 0.5vw);
            margin-top: calc(1rem + 0.5vw);  "> 
            '.$user_data['nomeconcurso'].'</div>

            <p class="col-8 media-body pb-3 mb-0 small lh-125 border-bottom border-gray" style="margin-left: calc(1.2rem + 0.5vw);
            margin-top: calc(0.5rem + 0.5vw);
    float: right;  ">
              <strong class="d-block text-gray-dark">'.$user_data['materia'].'</strong> </p><div class="card" style="width: 100%;">
  <iframe style="min-height: 310px;" width="100%" height="auto" src="'.$user_data['linkaula'].'" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
  <div class="card-body" style="
    margin: 0;
    padding: 0;
  ">
  <div class="row">  <div class="col-12" style="
  "> 
<a href="criar_editar.php?conteudo='.$user_data['materia'].'">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
  <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/>
</svg>
</a><a      onclick="publico('.$aspa.$user_data['materia'].$aspa.');">

<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16" style="
    margin: calc(0.3rem + 0.3vw);
  ">
  <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"></path>
  </svg>
  </a>
  <button  onclick="  excluir('.$aspa.$user_data['materia'].$aspa.');" style="float: right; background-color:transparent; border:none;">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg>
</button>

  </div>
    <div class="col-12" style=""><img class="col-2 rounded-circle " style="margin-left: 0.5rem;margin-right: 0;float: left;"><img class="col-2 rounded-circle " style="float: left;"><p class="col-8 card-text" style="float: left;margin: 1%;">Postado por<strong>'.$user_data['usuario'].'  </strong>&gt;</p></div> 
    
  <div class="col-10">
  <p class="card-text" style="float: right;"><strong>   </strong>'.$user_data['descricao'].'</p> </div>
    
    <div class="" style="
      margin: 0;
      padding: 0;
      
)    ">

  <hr>
  
  </div>
  </div>
  </div>
          </div>"
          
          
   </a>       
          ';
   
          
 
  
  
}

?> 
 
<?php
   //função checa se há conteudos criados pelo usuario 
if($result->num_rows == 0){
  echo'<div style="font-size:x-large; margin:auto" >Não há  nada por aqui...<br> Que tal criarmos uma  nova aula?</div>';
}




?>
        
        
  
      </div>

</div>



      
      
      
      <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">
Feito por Efraim Oliveira Melo
<br>
<p>Visite meu:</p>
<a class="" href="https://www.linkedin.com/in/efraim-oliveira-melo-2659911a6/" role="link" tabindex="0" style="    text-decoration: none;">Linkedin</a> 
e 
<a class="" href="https://github.com/Elfraim" role="link" tabindex="0" style=" text-decoration: none;">Github</a>
<br>
Português (Brasil)
 <?php $mesano = strftime(' %m / %Y', strtotime('today'));
      echo $mesano;
 ?></p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>

    </main>
<script>
 


  var i = setInterval(function () {
    
    clearInterval(i);
  
    // faz com que a barra de carregamento pare de carregar
    document.getElementById("loading").style.display = "none";
   

}, 4000);

function excluir (conteudo){

//pergunta ao usuario se ele deseja excluir o conteudo

  var resultado = confirm("Deseja excluir o item  ?");
    if (resultado == true) {
      var cont=conteudo;
        window.location.href="delete.php?conteudo="+cont+""; 
         
          
    }
    else{
        alert("Você desistiu de excluir ");
    }}

    function publico (conteudo){

      //pergunta ao usuario se ele deseja publicar o post
var resultado = confirm("Deseja tornar publico o post ?");
  if (resultado == true) {
    var cont=conteudo;
      window.location.href="publico.php?conteudo="+cont+""; 
       
        
  }
  else{
      alert("Você desistiu de tornar publico");
  }}




</script>
    <!-- Principal JavaScript do Bootstrap
    ================================================== -->
    <!-- Foi colocado no final para a página carregar mais rápido -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  
</header></body></html>.