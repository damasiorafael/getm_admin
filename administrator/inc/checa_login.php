<?php
    //INICIA SESSAO
    session_start();
    echo $_SESSION['logado'];
    if(isset($_SESSION['logado'])){
    	if($_SESSION['logado'] == ""){
        	//header('Location: login.php');
        }
    } else {
    	header('Location: login.php');
    }
?>