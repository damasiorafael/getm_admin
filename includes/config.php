<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', '1');
	//error_reporting(E_ALL ^ E_NOTICE);
	error_reporting(1);
	//VARIAVEIS DE AMBIENTE

	if($_SERVER['SERVER_NAME'] == "localhost"){
		$host 	= "localhost";
		$user 	= "root";
		$pass 	= "damasio";
		$dbname	= "getm_admin";
	} else {
		//admin
		//Mkt#2014
		$host 	= "localhost";
		$user 	= "admin";
		$pass 	= "Mkt#2014";
		$dbname	= "tutor";
	}

	//CONEXAO COM BANCO DE DADOS
	$conect = mysql_connect($host, $user, $pass);
	//CASO DE ERRO DE CONEXAO IMPRIME A MENSAGEM
	if (!$conect) die ("<h1>Falha na coneco com o Banco de Dados!</h1>");
	//SE A CONEXAO FOR BEM SUCEDIDA
	$db = mysql_select_db($dbname);
	//FINAL DA CONEXAO COM BANCO DE DADOS

	/* SQL INJECTION PROTECTION */
	function anti_injection($sql) {
	    $sql = preg_replace(sql_regcase("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"), "", $sql);
	    $sql = trim($sql); 
	    $sql = strip_tags($sql);
	    $sql = addslashes($sql);
	    return $sql;
	}

	// FUNÇÃO PARA SELECT NO DB
    function selectdbcount($tabela,$campo,$valor){
        //Trata os campos para o BD
        $campos = $campo;

        $checa = "SELECT * FROM $tabela WHERE $campo = '$valor'";

        //CHECA NO BANCO DE DADOS
		$checar = mysql_query($checa);
		if(mysql_num_rows($checar) >= 1){
			return mysql_num_rows($checar);
		} else {
			//echo "Já existe um cadastro utilizando esse CPF.";
		}
	}
?>