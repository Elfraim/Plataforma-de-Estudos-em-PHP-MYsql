<?php
include_once('config.php');

if(isset($_POST['submit']))
{
    //arquivo que recebe os POSTS DA PAGINA editar_criar e atribui a varivael de cada post
    $materia =$_POST['materia'];
    $conteudo = $_POST['conteudo'];
    $areaconhecimento= $_POST['areaconhecimento'];
    $video = $_POST['linkv'];
    $link = $_POST['link'];
    $descricao = $_POST['descricao'];
    $update =" UPDATE cronograma SET nomeconcurso='$materia',materia='$conteudo',areaconhecimento='$areaconhecimento',linkaula='$video',links='$link',descricao='$descricao' WHERE materia='$conteudo' " ;

    $result= $conecta->query($update);

    //por fim ela faz a query  para atualizar a materia
    header('Location: home.php');
}else 

if(isset($_GET['submit'])){
    $materia =$_POST['materia'];
    $conteudo = $_POST['conteudo'];
    $areaconhecimento= $_POST['areaconhecimento'];
    $video = $_POST['linkv'];
    $link = $_POST['link'];
    $descricao = $_POST['descricao'];
    $update =" UPDATE cronograma SET nomeconcurso='$materia',materia='$conteudo',areaconhecimento='$areaconhecimento',linkaula='$video',links='$link',descricao='$descricao' WHERE materia='$conteudo' " ;


}

?>