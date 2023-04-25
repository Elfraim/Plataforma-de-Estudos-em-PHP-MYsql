<?php

include_once('config.php');
session_start();
if((!isset($_SESSION['username']) == true ) and (!isset($_SESSION['senha']) == true ) )
{
  unset($_SESSION['username']);
  unset($_SESSION['senha']);
header('Location: login.php');
}
$logado = $_SESSION['username'];



if (!empty($_POST['materia'])) {
  $materia = $_POST['materia'];
  }
if (!empty($_POST['conteudo'])) {
$conteudo = $_POST['conteudo'];
}
if (!empty($_POST['dono'])) {
$dono = $_POST['dono'];
}

//receber dados do formulario


//verificar se o usuario clicou
$tamanho =intval($_POST['tamanho']);
$a = 1;

if(!empty($dono) && !empty($_POST['resposta1']) || !empty($_POST['resposta2']) || !empty($_POST['resposta3'])){
 while ($a <= $tamanho) {


$resposta = $_POST['resposta'.$a];
$id = $_POST['id'.$a];
  

echo $resposta;
echo $id;
 
$resultado= mysqli_query($conecta,"INSERT INTO resposta(materia, dono, conteudo, id, respostaq, usuario) VALUES ('$materia','$dono','$conteudo','$id','$resposta','$logado');");

$a++;
 }
}else{
  echo'Erro';
}

$local = 'explorar.php?conteudo='.$conteudo.'&concluido=sim&dono='.$dono.'&materia='.$materia;

header('Location:'.$local.'');
?>