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


$conteudo =$_GET['conteudo'];

  
$sele= "UPDATE  cronograma SET publicacao = 'publico' WHERE  materia = '$conteudo' AND usuario = '$logado'";
$result = $conecta->query($sele);
Header('Location: home.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="publico()">
    <script>
    function publico(){
        alert("sua publicação agora é pública");
    }


    </script>
</body>
</html>