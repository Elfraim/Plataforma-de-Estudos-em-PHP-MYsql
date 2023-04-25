<?php include_once('config.php');
session_start();
 $logado = $_SESSION['username'];


    echo'alert("voce excluira");';
      
   
 

 if(!empty($_GET['conteudo'])){

  include_once('config.php');
  $conteudo =$_GET['conteudo'];

  $sele= "SELECT * FROM cronograma WHERE  materia = '$conteudo'";

$result = $conecta->query($sele);
  
  print_r($result);

  if($result->num_rows > 0)
  {

    $delete = "DELETE FROM cronograma WHERE materia ='$conteudo' ";
    $resultD = $conecta->query($delete);
    header('Location: home.php');
  }
  
  

  }else{
  echo'alert("O arquivo não foi encontrado verifique se há titulo no conteudo do mesmo");';
  header('Location: home.php');

  }
  ?><!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  </head>
  <body onload="voltar();">


  </body>
  </html>