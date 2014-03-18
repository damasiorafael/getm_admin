<?php
	$pag = "faq";
?>
<?php
session_start();
//$id = $_POST['id'];
//$senha = $_POST['senha'];

//$_SESSION['id'] = $id;
//$_SESSION['senha'] = $senha;
if(isset($id)){
   //echo "Você está logado como: $id";
   //header('location:http://localhost/GETM/index.php');
}
else
 // echo 'Você não está logado' // Não logado

?>
<!DOCTYPE html>
<html lang="en">
<?php
    include("includes/config.php");
    $sql            = "SELECT `pergunta`, `resposta` FROM `faq` WHERE `ativo` = 1 ORDER BY id ASC";
    $query          = mysql_query($sql);
    $num_rows_faq   = mysql_num_rows($query);
    include("includes/head.php");
?>
</html>
<body>
    <div class="container">
        <div class=" container-conteudo">
            <header>
                <?php include("includes/header-logo.php"); ?>
                
                <?php include("includes/header-menu.php"); ?>
            </header>
            
            <div class="content">
                <section class="conteudo faq">
                    <h2>FAQ - PERGUNTAS FREQUENTES</h2>
                    <?php
                        if($num_rows_faq > 0){
                            while($dados = mysql_fetch_array($query)){
                    ?>
                                <p class="pergunta"><?php echo $dados["pergunta"]; ?></p>
                                <p class="resposta"><?php echo $dados["resposta"]; ?></p>
                    <?php
                            }
                        } else {
                    ?>
                                <p class="pergunta">Nenhuma pergunta encontrada</p>
                    <?php
                        }
                    ?>
                </section>
            </div>
        </div>
        </div>
        <?php include("includes/rodape.php"); ?>
    
</body>