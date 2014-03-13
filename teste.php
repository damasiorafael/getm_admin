<?php
session_start();
$id = $_POST['id'];
$senha = $_POST['senha'];

$_SESSION['id'] = $id;
$_SESSION['senha'] = $senha;
if(isset($id)){
   // echo "Você está logado como: $id";
   header('location:http://localhost/GETM/index.php');
}
else
 echo 'Você não está logado' // Não logado

?>
