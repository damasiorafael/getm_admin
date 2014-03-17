<?php
	include('../inc/config.php');

	$key = anti_injection($_REQUEST["key"]);
	//$json = "json({'items':[{'id':'1','usuario':'Rafael Damasio','username':'damasiorafael','email':'damasio_damasio@hotmail.com','lojista':'1'},{'id':'2','usuario':'Fernando Damasio','username':'damasiofernando','email':'kakaminhao_super@hotmail.com','lojista':'0'},{'id':'3','usuario':'Leonam Rodrigues','username':'rodriguesleonam','email':'leonan_aquariano@hotmail.com','lojista':'1'}]})";
	switch($key){
		case 'users':
			$json = "json({'items':[";
			$sql = mysql_query("SELECT * FROM users") or die(mysql_error());
			while($dados = mysql_fetch_array($sql)){
				$json .= "{'id':'".$dados["id"]."',";
				$json .= "'nome':'".$dados["nome"]."',";
				$json .= "'username':'".$dados["username"]."',";
				$json .= "'email':'".$dados["email"]."',";
				$json .= "'lojista':'".$dados["lojista"]."'},";
			}
			$json .= "]})";
			$json = substr_replace($json, '', -4, 1);
			echo $json;
		break;
		case 'imagens':
			$json = "json({'items':[";
			$sql = mysql_query("SELECT * FROM imagens") or die(mysql_error());
			while($dados = mysql_fetch_array($sql)){
				$json .= "{'id':'".$dados["id"]."',";
				$json .= "'nome':'".$dados["nome"]."',";
				$json .= "'arquivo':'".$dados["arquivo"]."',";
				$json .= "'destaque':'".$dados["destaque"]."',";
				$json .= "'ativo':'".$dados["ativo"]."'},";
			}
			$json .= "]})";
			$json = substr_replace($json, '', -4, 1);
			echo $json;
		break;
		case 'empresas':
			$json = "json({'items':[";
			$sql = mysql_query("SELECT * FROM empresas") or die(mysql_error());
			while($dados = mysql_fetch_array($sql)){
				$json .= "{'id':'".$dados["id"]."',";
				$json .= "'nome':'".$dados["nome"]."',";
				$json .= "'endereco':'".$dados["endereco"]."',";
				$json .= "'fone':'".$dados["fone"]."',";
				$json .= "'site':'".$dados["site"]."',";
				$json .= "'ramo_atividade':'".$dados["ramo_atividade"]."',";
				$json .= "'arquivo':'".$dados["arquivo"]."',";
				$json .= "'latitude':'".$dados["latitude"]."',";
				$json .= "'longitude':'".$dados["longitude"]."',";
				$json .= "'ativo':'".$dados["ativo"]."'},";
			}
			$json .= "]})";
			$json = substr_replace($json, '', -4, 1);
			echo $json;
		break;
		case 'faq':
			$json = "json({'items':[";
			$sql = mysql_query("SELECT * FROM faq") or die(mysql_error());
			while($dados = mysql_fetch_array($sql)){
				$json .= "{'id':'".$dados["id"]."',";
				$json .= "'pergunta':'".$dados["pergunta"]."',";
				$json .= "'resposta':'".$dados["resposta"]."',";
				$json .= "'ativo':'".$dados["ativo"]."'},";
			}
			$json .= "]})";
			$json = substr_replace($json, '', -4, 1);
			echo $json;
		break;
		case 'socials':
			$json = "json({'items':[";
			$sql = mysql_query("SELECT * FROM redes_sociais") or die(mysql_error());
			while($dados = mysql_fetch_array($sql)){
				$json .= "{'id':'".$dados["id"]."',";
				$json .= "'nome':'".$dados["nome"]."',";
				$json .= "'link':'".$dados["link"]."',";
				$json .= "'ativo':'".$dados["ativo"]."'},";
			}
			$json .= "]})";
			$json = substr_replace($json, '', -4, 1);
			echo $json;
		break;
		default:
			# code...
			break;
	}
?>