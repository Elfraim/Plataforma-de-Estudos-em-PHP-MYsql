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

$conteudo = $_GET['conteudo'];
$dono = $_GET['dono'];

$resultado= mysqli_query($conecta,"UPDATE cronograma SET
concluido= 'sim' where materia = '$conteudo' and usuario ='$logado' ");

header('Location: questoes.php');
?>