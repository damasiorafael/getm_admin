<?php
	include('../inc/config.php');

	$key = anti_injection($_REQUEST["key"]);
	//$json = "json({'items':[{'id':'1','usuario':'Rafael Damasio','username':'damasiorafael','email':'damasio_damasio@hotmail.com','lojista':'1'},{'id':'2','usuario':'Fernando Damasio','username':'damasiofernando','email':'kakaminhao_super@hotmail.com','lojista':'0'},{'id':'3','usuario':'Leonam Rodrigues','username':'rodriguesleonam','email':'leonan_aquariano@hotmail.com','lojista':'1'}]})";
	if($key == 'users'){
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
	}
?>