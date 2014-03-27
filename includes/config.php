<?php
	ini_set('error_reporting', E_ALL);
	ini_set('display_errors', '1');
	//error_reporting(E_ALL ^ E_NOTICE);
	error_reporting(1);
	//VARIAVEIS DE AMBIENTE
	session_start();
	if($_SERVER['SERVER_NAME'] == "localhost"){
		$host 	= "localhost";
		$user 	= "root";
		$pass 	= "komeia";//i7O51H&v9p_C
		$dbname	= "getm_admin";
	} else {
		$host 	= "localhost";
		$user 	= "getmcom_admin";
		$pass 	= "i7O51H&v9p_C";//i7O51H&v9p_C
		$dbname	= "getmcom_admin";
	}

	//CONEXAO COM BANCO DE DADOS
	$conect = mysql_connect($host, $user, $pass);
	//CASO DE ERRO DE CONEXAO IMPRIME A MENSAGEM
	if (!$conect) die ("<h1>Falha na conexão com o Banco de Dados!</h1>");
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

	// FUNÇÃO PARA VERIFICAR SE EXISTE ALGUM REGISTRO COM AQUELE VALOR ESPECIFICO NO DB
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
	
	// FUNÇÃO PARA VERIFICAR SE EXISTE ALGUM REGISTRO COM VALOR APROXIMADO NO DB
    function selectdbcountlike($tabela,$campo,$valor){
        //Trata os campos para o BD
        $campos = $campo;

        $checa = "SELECT * FROM $tabela WHERE $campo LIKE '$valor'";

        //CHECA NO BANCO DE DADOS
		$checar = mysql_query($checa);
		if(mysql_num_rows($checar) >= 1){
			return mysql_num_rows($checar);
		} else {
			//echo "Já existe um cadastro utilizando esse CPF.";
		}
	}
	
	// FUNÇÃO PARA RETORNAR UM CAMPO ESPECIFICO DE UMA TABELA
    function selectCampo($tabela,$campoRetorno,$campoCompara,$valor){
        //Trata os campos para o BD
        $campos = $campo;

        $checa = "SELECT $campoRetorno FROM $tabela WHERE $campoCompara LIKE '$valor'";

        //CHECA NO BANCO DE DADOS
		$checar = mysql_query($checa);
		$dado = mysql_fetch_array($checar);
		return $dado[$campoRetorno];
	}
	
	function linkRedeSocial($nomeRede){
		$countDb = selectdbcountlike("redes_sociais","nome",$nomeRede);
		if($countDb > 0 && $countDb <= 1){
			$a;
			$a .= '<a href="'.selectCampo("redes_sociais","link","nome", $nomeRede).'" ';
			$a .= 'title="Curta GETM no '.strtolower(selectCampo("redes_sociais","nome","nome", $nomeRede)).'" class="siga-'.strtolower(selectCampo("redes_sociais","nome","nome", $nomeRede)).' '.strtolower(selectCampo("redes_sociais","nome","nome", $nomeRede)).'" target="_blank"></a>';
			echo $a;
		} else {
			echo "";
		}
	}
?>