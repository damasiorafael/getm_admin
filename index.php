<?php
	$pag = "home";
?>
<?php
	session_start();
	if(isset($_POST['id'])){
		$id = $_POST['id'];
	} else {
		$id = "";
	}
	
	if(isset($_POST['senha'])){
		$senha = $_POST['senha'];
	} else {
		$senha = "";
	}
	
	$_SESSION['id'] = $id;
	$_SESSION['senha'] = $senha;
	if($id != ""){
		//echo "Você está logado como: $id";
		//header('location:http://localhost/GETM/index.php');
	} else {
		//echo 'Você não está logado' // Não logado
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.php"); ?>
</html>
<body>
    <div class="container">
        <div class="container-conteudo">
            <header>
                <?php include("includes/header-logo.php"); ?>

                <?php //include("includes/header-login.php"); ?>
                
                <?php include("includes/header-menu.php"); ?>
            </header>
            <div class="content">
                <section class="conteudo">
                    <?php include("includes/banner.php"); ?>
                    <?php include("includes/localiza-empresa.php"); ?>
                </section>
            </div>
        </div>
    </div>
	<?php include("includes/rodape.php"); ?>
</body>