<!-- <p class="user-logado">Site de: <a href="#" class="user "><?php echo $_POST["id"]; ?></a ></p> -->
<?php
if ($id == null) {
    ?>
	<div class="painel-login">
		<div class="siga">
			<span class="color-azul">Siga-nos</span>
			<p>
				<a href="http://facebook.com" title="Curta GETM no Facebook" class="siga-face"></a>
				<a href="http://youtube.com" title="Acompanhe GETM no Youtube" class="siga-youtube"></a>
			</p>
		</div>
		<form action="index.php" id="form-login" method="post">
			<span class="color-azul">Acesse sua conta</span>
			<p>
				<input type="radio" name="tipo-user" value="cliente" required="required">Cliente
				<input type="radio" name="tipo-user" value="lojista" required="required">Lojista
			</p>
			<p>
				<input type="text" id="txtId" name="id" placeholder="ID" required="required">
				<input type="password" id="txtSenha" name="senha" placeholder="Sua Senha" required="required">
				<input type="submit" id="" name="btnEntrar" value="Entrar" class="submit">
			</p>
			<a href="#" class="color-azul">Esqueci minha senha</a>
		</form>
	</div> 
<?php
} else {
?>
    <p class="user-logado">Site de: <a href="#" class="user "><?php echo $_POST["id"]; ?></a ></p>
<?php
	}
?>

<!-- <div class="painel-login">
	<div class="siga">
		<span class="color-azul">Siga-nos</span>
		<p>
			<a href="http://facebook.com" title="Curta GETM no Facebook" class="siga-face"></a>
			<a href="http://youtube.com" title="Acompanhe GETM no Youtube" class="siga-youtube"></a>
		</p>
	</div>
	<form action="index.php" id="form-login" method="post">
		<span class="color-azul">Acesse sua conta</span>
		<p>
			<input type="radio" name="tipo-user" value="cliente" required="required">Cliente
			<input type="radio" name="tipo-user" value="lojista" required="required">Lojista
		</p>
		<p>
			<input type="text" id="txtId" name="id" placeholder="ID" required="required">
			<input type="password" id="txtSenha" name="senha" placeholder="Sua Senha" required="required">
			<input type="submit" id="btnEntrar" name="btnEntrar" value="Entrar">
		</p>
		<a href="#" class="color-azul">Esqueci minha senha</a>
	</form>
</div>  -->