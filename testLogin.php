<?php 
include_once('config.php');
session_start();

if(isset($_POST['submit']) && !empty($_POST['username']) && !empty($_POST['senha']))
{


$user = $_POST['username'];
$pwd = $_POST['senha'];

$sql =" SELECT * FROM estudante WHERE usuario = '$user' and senha='$pwd'";
 
$result = $conecta->query($sql);

print_r($result);

if(mysqli_num_rows($result) < 1){
    unset($_SESSION['username']);
    unset($_SESSION['senha']);
header('Location: login.php');

} else {
   header('Location: home.php'); 

   $_SESSION['username']= $user;
   $_SESSION['senha']= $pwd;
}


}else{
    header('location: login.php');
}

?>