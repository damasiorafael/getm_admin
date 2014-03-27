<?php
	$pag = "home";
	include("includes/config.php");
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

                <?php include("includes/header-login.php"); ?>
                
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