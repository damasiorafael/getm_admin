<?php
	$pag = "busca-empresa";
	include("includes/config.php");
	
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
	
	$empresa 	= anti_injection($_REQUEST["txtNomeEmpresa"]);
	$estado 	= anti_injection($_REQUEST["selEstado"]);
	$cidade 	= anti_injection($_REQUEST["selCidade"]);
	
	$json 	= Array();
	if($empresa != '' || $estado != '' || $cidade != ''){
		$sql 	= "SELECT * FROM `empresas`";
		//if($empresa != '' || $estado != '' || $cidade != ''){
		$sql	.= " WHERE";
		//}
		if($empresa != '' && $estado == '' && $cidade == ''){
			$sql 	.= " `nome` like '%$empresa%'";
		} else if($empresa != '' || $empresa != '' && $estado == '' && $cidade == ''){
			$sql 	.= " `nome` like '%$empresa%' OR";
		}
		if($estado != '' && $cidade == ''){
			$sql 	.= " `estado` = $estado";
		} else if($estado != '' && $cidade != ''){
			$sql 	.= " `estado` = $estado AND";
		}
		if($cidade != ''){
			$sql	.= " `cidade` = $cidade";
		}
		//if($empresa != '' || $estado != '' || $cidade != ''){
		$sql	.= " AND `ativo` = 1 ORDER by nome ASC";
		//}
		
		//echo $sql;
		$query = mysql_query($sql) or die(mysql_error());
		$i = 0;
		while($dados = mysql_fetch_array($query)){
			$json[$i]["id"] = $dados["id"];
			$json[$i]["nome"] = $dados["nome"];
			$json[$i]["pais"] = $dados["pais"];
			$json[$i]["estado"] = utf8_encode(filtraEstado($dados["estado"]));
			$json[$i]["cidade"] = utf8_encode(filtraCidade($dados["cidade"]));
			$json[$i]["endereco"] = $dados["endereco"];
			$json[$i]["fone"] = $dados["fone"];
			$json[$i]["site"] = $dados["site"];
			$json[$i]["ramo_atividade"] = $dados["ramo_atividade"];
			$json[$i]["arquivo"] = $dados["arquivo"];
			$json[$i]["latitude"] = $dados["latitude"];
			$json[$i]["longitude"] = $dados["longitude"];
			$i++;
		}
	}
	//print_r(json_encode($json));
	//json_encode($json)
?>

<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.php"); ?>
</html>
<body>
    <div class="container container-conteudo ">
        <header>
            <?php include("includes/header-logo.php"); ?>

            <?php include("includes/header-login.php"); ?>
            
            <?php include("includes/header-menu.php"); ?>
        </header>
        <div class="content">
	        <section class="conteudo busca-empresa">
				<h2>LOCALIZAÇÃO DE EMPRESAS CREDENCIADAS</h2>

				<form name="form-busca-empresa" id="form-busca-empresa">
					<div class="nome-empresa">
						<label for="txt-nome-empresa">Nome da Empresa</label>
						<input type="text" id="txtNomeEmpresa" name="txtNomeEmpresa" />
					</div>
					<div class="pais">
						<label for="sel-pais-empresa">País</label>
						<select name="selPais" id="selPais" class="select">
							<option value="Brasil">Brasil</option>
						</select>
					</div>
					<div class="estado">
						<label for="sel-estado-empresa">Estado</label>
						<select name="selEstado" id="selEstado" class="select">
							<option value="">-- Selecione --</option>
						</select>
					</div>
					<div class="cidade">
						<label for="sel-cidade-empresa">Cidade</label>
						<select name="selCidade" id="selCidade" class="select">
							<option value="">-- Selecione o estado --</option>
						</select>
					</div>
					<input type="submit" name="btnPesquisarEmpresa" id="btnPesquisarEmpresa" class="submit" value="Pesquisa" />
                    	<?php /*?><span>Pesquisa</span>
                    </button><?php */?>
				</form>
				<div class="wrapper-empresa">
                	<?php /*?><script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDfVpzxaQRLeD6z-r-RaEzNbRfD-c6aWmo&amp;sensor=false"></script><?php */?>
                	<ul class="listaEmpresas">
                    	<?php
							$l = count($json);
							if($l > 0){
                        		for($i = 0; $i < $l; $i++){
						?>
                                    <li>
                                        <div class="foto-endereco">
                                            <div class="foto-empresa">
                                                <img src="administrator/uploads/images/<?php echo $json[$i]["arquivo"]; ?>" alt="">
                                            </div>
                    
                                            <div class="endereco-empresa">
                                                <h3><?php echo $json[$i]["nome"]; ?></h3>
                                                <p class="sublinhado endereco"><?php echo $json[$i]["endereco"]; ?> - <?php echo $json[$i]["cidade"]; ?> - <?php echo $json[$i]["estado"]; ?></p>
                                                <p class="telefone"><?php echo $json[$i]["fone"]; ?></p>
                                                <?php if($json[$i]["site"] != ""){ ?>
                                                    <a href="<?php echo $json[$i]["site"]; ?>" target="blank" class="sublinhado site"><?php echo $json[$i]["site"]; ?></a>
                                                <?php } ?>
                                                <?php if($json[$i]["ramo_atividade"] != ""){ ?>
                                                    <p class="tipo-estabelecimento"><?php echo $json[$i]["ramo_atividade"]; ?></p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <?php /*?><div id="mapa" class="mapa">
                                            <?php /*?><iframe width="598" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=pt&amp;geocode=&amp;q=Av.Boa+Viagem,+9+Pina,+Recife+-+PE&amp;aq=t&amp;sll=37.0625,-95.677068&amp;sspn=35.494074,83.935547&amp;ie=UTF8&amp;hq=&amp;hnear=Avenida+Boa+Viagem,+9+-+Boa+Viagem,+Pernambuco,+Brasil&amp;t=h&amp;ll=-8.077416,-34.8773&amp;spn=0.038241,0.051241&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><?php * /?>
                                        </div><?php */?>
                                    </li>
                        <?php
								}
							} else {
						?>
                        	<p class="msg-faca-busca">Nenhuma empresa encontrada!</p>
                        <?php
							}
						?>
                    </ul>
				</div>
			</section>
		</div>
    </div>
   <!--  </div> -->
    <?php include("includes/rodape.php"); ?>
</body>