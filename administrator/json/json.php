<?php
	include('../inc/config.php');
	
	function filtraEstado($id){
		$sqlEstado 		= "SELECT nome FROM `tb_estados` WHERE `id` = $id";
		$queryEstado	= mysql_query($sqlEstado);
		$estado 		= mysql_fetch_array($queryEstado);
		return $estado["nome"];
	}
	
	function filtraCidade($id){
		$sqlCidade 		= "SELECT nome FROM `tb_cidades` WHERE `id` = $id";
		$queryCidade	= mysql_query($sqlCidade);
		$cidade 		= mysql_fetch_array($queryCidade);
		return $cidade["nome"];
	}

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
				$json .= "'pais':'".$dados["pais"]."',";
				$json .= "'estado':'".utf8_encode(filtraEstado($dados["estado"]))."',"; //$dados["estado"]."',";
				//$json .= "'estado':'".$dados["estado"]."',";
				$json .= "'cidade':'".utf8_encode(filtraCidade($dados["cidade"]))."',";
				//$json .= "'cidade':'".$dados["cidade"]."',";
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
			$json = Array();
			$sql = mysql_query("SELECT * FROM faq") or die(mysql_error());
			$i = 0;
			while($dados = mysql_fetch_array($sql)){
				$json[$i]["id"] = $dados["id"];
				$json[$i]["pergunta"] = $dados["pergunta"];
				$json[$i]["resposta"] = $dados["resposta"];
				$json[$i]["ativo"] = $dados["ativo"];
				$i++;
			}
			print_r(json_encode($json));
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
		case 'contato':
			$json = "json({'items':[";
			$sql = mysql_query("SELECT * FROM contato") or die(mysql_error());
			while($dados = mysql_fetch_array($sql)){
				$json .= "{'id':'".$dados["id"]."',";
				$json .= "'nome':'".$dados["nome"]."',";
				$json .= "'email':'".$dados["email"]."',";
				$json .= "'departamento':'".$dados["departamento"]."',";
				$json .= "'mensagem':'".$dados["mensagem"]."'},";
				//$json .= "'lido':'".$dados["lido"]."',";
				//$json .= "'respondido':'".$dados["respondido"]."'},";
			}
			$json .= "]})";
			$json = substr_replace($json, '', -4, 1);
			echo $json;
		break;
		case 'videos':
			$json = "json({'items':[";
			$sql = mysql_query("SELECT * FROM videos") or die(mysql_error());
			//echo "SELECT * FROM videos";
			while($dados = mysql_fetch_array($sql)){
				$json .= "{'id':'".$dados["id"]."',";
				$json .= "'titulo':'".$dados["titulo"]."',";
				$json .= "'resumo':'".$dados["resumo"]."',";
				$json .= "'link':'".$dados["link"]."',";
				$json .= "'ativo':'".$dados["ativo"]."'},";
			}
			$json .= "]})";
			$json = substr_replace($json, '', -4, 1);
			echo $json;
		break;
		case 'videos_linha':
			$json = "json({'items':[";
			$sql = mysql_query("SELECT * FROM videos_linha") or die(mysql_error());
			//echo "SELECT * FROM videos";
			while($dados = mysql_fetch_array($sql)){
				$json .= "{'id':'".$dados["id"]."',";
				$json .= "'titulo':'".$dados["titulo"]."',";
				$json .= "'resumo':'".$dados["resumo"]."',";
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