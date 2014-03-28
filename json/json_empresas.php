<?php
	include('../includes/config.php');

	//$key = anti_injection($_REQUEST["key"]);
	$empresa 	= anti_injection($_REQUEST["txtNomeEmpresa"]);
	$estado 	= anti_injection($_REQUEST["selEstado"]);
	$cidade 	= anti_injection($_REQUEST["selCidade"]);
	
	$json 	= Array();
	$sql 	= "SELECT * FROM `empresas`";
	if($empresa != '' || $estado != '' || $cidade != ''){
		$sql	.= " WHERE";
	}
	if($empresa != ''){
		$sql 	.= " `nome` like '%$empresa%'";
	}
	if($estado != ''){
		$sql 	.= " OR `estado` = $estado";
	}
	if($cidade != ''){
		$sql	.= " AND `cidade` = $cidade";
	}
	$sql	.= " AND `ativo` = 1 ORDER by nome ASC";
	
	//echo $sql;
	$query = mysql_query($sql) or die(mysql_error());
	$i = 0;
	while($dados = mysql_fetch_array($query)){
		$json[$i]["id"] = $dados["id"];
		$json[$i]["nome"] = utf8_encode($dados["nome"]);
		$json[$i]["pais"] = $dados["pais"];
		$json[$i]["estado"] = $dados["estado"];
		$json[$i]["cidade"] = $dados["cidade"];
		$json[$i]["endereco"] = $dados["endereco"];
		$json[$i]["fone"] = $dados["fone"];
		$json[$i]["site"] = $dados["site"];
		$json[$i]["ramo_atividade"] = $dados["ramo_atividade"];
		$json[$i]["arquivo"] = $dados["arquivo"];
		$json[$i]["latitude"] = $dados["latitude"];
		$json[$i]["longitude"] = $dados["longitude"];
		$i++;
	}
	print_r(json_encode($json));
?>