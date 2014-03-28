<?php
	include('../inc/config.php');

	$key = anti_injection($_REQUEST["key"]);
	if($key != ''){
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
	} else {
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
	}
?>