<?php
    include('inc/config.php');
    session_start("logado");
	session_unset("logado");
	session_destroy("logado");
    header("location: login.php");
?>