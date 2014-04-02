<?php
	include('../inc/config.php');

	$key 	= anti_injection($_REQUEST["key"]);
	$estado = anti_injection(utf8_decode($_REQUEST["estado"]));
	$cidade	= anti_injection(utf8_decode($_REQUEST["cidade"]));
	if($key != '' && $estado == '' && $cidade == ''){
		$json = Array();
		$sql = mysql_query("SELECT * FROM `tb_cidades` WHERE `estado` = $key ORDER by nome ASC") or die(mysql_error());
		$i = 0;
		while($dados = mysql_fetch_array($sql)){
			$json[$i]["id"] = $dados["id"];
			$json[$i]["uf"] = $dados["uf"];
			$json[$i]["nome"] = utf8_encode($dados["nome"]);
			$i++;
		}
		print_r(json_encode($json));
	} else if($key == '' && $estado == '' && $cidade == ''){
		$json = Array();
		$sql = mysql_query("SELECT * FROM `tb_estados` ORDER by nome ASC") or die(mysql_error());
		$i = 0;
		while($dados = mysql_fetch_array($sql)){
			$json[$i]["id"] = $dados["id"];
			$json[$i]["uf"] = $dados["uf"];
			$json[$i]["nome"] = utf8_encode($dados["nome"]);
			$i++;
		}
		print_r(json_encode($json));
	} else if($estado != '' && $cidade == '' && $key == ''){
		$json = Array();
		$sql = mysql_query("SELECT * FROM `tb_estados` WHERE `nome` like '%$estado%'") or die(mysql_error());
		$i = 0;
		while($dados = mysql_fetch_array($sql)){
			$json[$i]["id"] = $dados["id"];
			$i++;
		}
		print_r(json_encode($json));
	} else if($cidade != '' && $estado != ''){
		$json = Array();
		//echo "SELECT * FROM `tb_cidades` WHERE `nome` = '$cidade' AND estado = $estado";
		$sql = mysql_query("SELECT * FROM `tb_cidades` WHERE `nome` = '$cidade' AND estado = $estado") or die(mysql_error());
		$i = 0;
		while($dados = mysql_fetch_array($sql)){
			$json[$i]["id"] = $dados["id"];
			$i++;
		}
		print_r(json_encode($json));
	}
?>