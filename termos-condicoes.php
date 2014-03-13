<?php
	$pag = "termos-condicoes";
?>
<?php
session_start();
$id = $_POST['id'];
$senha = $_POST['senha'];

$_SESSION['id'] = $id;
$_SESSION['senha'] = $senha;
if(isset($id)){
   //echo "Você está logado como: $id";
   //header('location:http://localhost/GETM/index.php');
}
else
 // echo 'Você não está logado' // Não logado

?>
<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.php"); ?>
</html>
<body>
    <div class="container">
        <div class=" container-conteudo">
            <header>
                <?php include("includes/header-logo.php"); ?>
                
                <?php include("includes/header-menu.php"); ?>
            </header>
            <div class="content">
                <section class="conteudo termos-condicoes">
                    <h2>TERMOS E CONDIÇÕES</h2>

                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. <br> Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. <br> Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.</p>

                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa. <br> Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. <br> Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nam cursus. Morbi ut mi. Nullam enim leo, egestas id, condimentum at, laoreet mattis, massa.</p>
                </section>
            </div>
        </div>
    </div>
        <?php include("includes/rodape.php"); ?>
    
</body>