<?php
    $pag = "home";
?>
<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.php"); ?>
</html>
<body>
    <div class="container">
        <header>
            <?php include("includes/header-logo.php"); ?>

            <?php include("includes/header-login_logado.php"); ?>
            
            <?php include("includes/header-menu.php"); ?>
        </header>
    
        <section class="conteudo">
            <?
            session_start();
            $id = $_POST['id'];
            $senha = $_POST['senha'];

            $_SESSION['id'] = $id;
            $_SESSION['senha'] = $senha;
            if(isset($id)){
               echo "Você está logado como: $id";
            }
            else
             echo 'Você não está logado' // Não logado

            ?>
            Bem vindo <?php echo $_POST["id"]; ?><br />
            Sua senha: <?php echo $_POST["senha"]; ?><br />
            Tipo Cliente <?php echo $_POST["tipo-user"]; ?><br />

            <?php include("includes/banner.php"); ?>
            <?php include("includes/localiza-empresa.php"); ?>
        </section>
    </div>
    
    <?php include("includes/rodape.php"); ?>
</body>