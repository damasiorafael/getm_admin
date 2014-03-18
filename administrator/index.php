<?php include('inc/checa_login.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('inc/head.php'); ?>

  <body>
    <div id="wrapper">

      <?php include('inc/navbar.php'); ?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Painel Administrativo <small></small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-home"></i> Home</li>
            </ol>
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
              <li><a href="imagens.php"><i class="fa fa-camera"></i> Imagens</a></li>
              <li><a href="empresas.php"><i class="fa fa-suitcase"></i> Empresas</a></li>
              <li><a href="faq.php"><i class="fa fa-question-circle"></i> FAQ</a></li>
              <li><a href="socials.php"><i class="fa fa-share-square"></i> Redes Sociais</a></li>
              <li><a href="videos.php"><i class="fa fa-video-camera"></i> Vídeos</a></li>
              <li><a href="contatos.php"><i class="fa fa-envelope"></i> Contatos</a></li>
              <?php /*<li><a href="users.php"><i class="fa fa-user"></i> Users</a></li>*/ ?>
              <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Região <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">País</a></li>
                  <li><a href="#">Estado</a></li>
                  <li><a href="#">Cidade</a></li>
                </ul>
              </li> -->
            </ul>
          </div>
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include('inc/scripts.php'); ?>
  </body>
</html>
