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
		$dbname	= "getm";
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

	// FUNÇÃO PARA GRAVAR NO BD
    function gravanobd($tabela,$campos,$valores){
        //Trata os campos para o BD
        $campos = explode("|",$campos);
        $totaldecampos = count($campos);
        $totaldecampos2 = count($campos);

        $grava = "INSERT INTO $tabela (";
        for ($i=0;$i<$totaldecampos;$i++){
        	$grava .= $campos[$i];
            if($totaldecampos2 -= 1){
                $grava .= ",";
            }
        }
        //Trata os valores para o BD
        $valores = explode("|",$valores);
        $totaldevalores = count($valores);
        $totaldevalores2 = count($valores);
		$grava .= ") VALUES (";
	    for($i=0;$i<$totaldevalores;$i++){
	      	$grava .= "'".$valores[$i]."'";
	        if($totaldevalores2 -= 1){
	        	$grava .= ",";
	        }
	    }
		$grava .= ")";
      	//GRAVA NO BANCO DE DADOS
		if($gravar = mysql_query($grava)){
			return true;
		} else {
			return false;
		}
	}

	// FUNÇÃO PARA EDITAR NO BD
    function editanobd($tabela,$campos,$valores,$id){
        //REFERENCIA DE CONSULTA//UPDATE table_name SET column1=value, column2=value2,... WHERE some_column=some_value
	    //Trata os campos para o BD
        $campos = explode("|",$campos);
        $totaldecampos = count($campos);
        $totaldecampos2 = count($campos);
        //Trata os valores para o BD
        $valores = explode("|",$valores);
        //$totaldevalores = count($valores);
        $grava = "UPDATE $tabela SET ";
        for ($i=0;$i<$totaldecampos;$i++){
        	$grava .= $campos[$i]."='";
        	$grava .= $valores[$i]."'";
            if($totaldecampos2 -= 1){
                $grava .= ",";
            }
        }

        $grava .= " WHERE id=$id";
  		
      	//GRAVA NO BANCO DE DADOS
		if($gravar = mysql_query($grava)){
			return true;
		} else {
			return false;
		}
	}

	// FUNÇÃO PARA APAGAR NO BD
	function deletadb($id){
		$deleta = "DELETE FROM users WHERE id = $id";
		//DELETA NO BANCO DE DADOS
		if($deleta = mysql_query($deleta)){
			return true;
		} else {
			return false;
		}	
	}
?>