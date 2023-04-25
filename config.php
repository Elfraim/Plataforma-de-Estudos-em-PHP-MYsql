<?php
$Dbhost ='localhost';
$dbUsername ='root';
$dbpwd ='';
$dbname ='plataforma';

$conecta = new mysqli($Dbhost , $dbUsername , $dbpwd , $dbname );

if($conecta->connect_errno){
echo'ERRo no servidor:';


 } else {
   
 }


?>