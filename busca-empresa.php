<?php
	$pag = "busca-empresa";
?>
<?php
session_start();
$id = $_POST['id'];
$senha = $_POST['senha'];

$_SESSION['id'] = $id;
$_SESSION['senha'] = $senha;
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

				<form action="" name="form-busca-empresa" id="form-busca-empresa" method="post">
					<div class="nome-empresa">
						<label for="txt-nome-empresa">Nome da Empresa</label>
						<input type="text" id="txt-nome-empresa">
					</div>
					<div class="pais">
						<label for="sel-pais-empresa">País</label>
						<select name ="sel-pais" id="sel-pais-empresa" class="select" >
							<option value="pais1">País 1
							<option value="pais2">País 2
							<option value="pais3">País 3
							<option value="pais4">País 4
						</select>
					</div>
					<div class="estado">
						<label for="sel-estado-empresa">Estado</label>
						<select name ="sel-estado" id="sel-estado-empresa" class="select" >
							<option value="estado1">Estado 1
							<option value="estado2">Estado 2
							<option value="estado3">Estado 3
							<option value="estado4">Estado 4
						</select>
					</div>
					<div class="cidade">
						<label for="sel-cidade-empresa">Cidade</label>
						<select name ="sel-cidade" id="sel-cidade-empresa" class="select" >
							<option value="cidade1">Cidade 1
							<option value="cidade2">Cidade 2
							<option value="cidade3">Cidade 3
							<option value="cidade4">Cidade 4
						</select>
					</div>
					<input type="submit" name="btn-pesquisar-empresa" id="btn-pesquisar-empresa" value="Pesquisa" class="submit">
				</form>
				<div class="wrapper-empresa">
					<div class="foto-endereco">
						<div class="foto-empresa">
							<img src="http://lorempixel.com/410/300/city" alt="">
						</div>

						<div class="endereco-empresa">
							<h3>Nome Empresa</h3>
							<p class="sublinhado endereco">Av. Boa Viagem, 9 Pina, Recife - PE</p>
							<p class="telefone">(81) 2122-1100</p>
							<a href="http://recifepraiahotel.com.br" target="blank" class="sublinhado site">recifepraiahotel.com.br</a>
							<p class="tipo-estabelecimento">Hotel</p>
						</div>
					</div>
					<div class="mapa">
						<iframe width="598" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=pt&amp;geocode=&amp;q=Av.Boa+Viagem,+9+Pina,+Recife+-+PE&amp;aq=t&amp;sll=37.0625,-95.677068&amp;sspn=35.494074,83.935547&amp;ie=UTF8&amp;hq=&amp;hnear=Avenida+Boa+Viagem,+9+-+Boa+Viagem,+Pernambuco,+Brasil&amp;t=h&amp;ll=-8.077416,-34.8773&amp;spn=0.038241,0.051241&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
					</div>
				</div>
			</section>
		</div>
    </div>
   <!--  </div> -->
    <?php include("includes/rodape.php"); ?>
</body>