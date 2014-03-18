<!-- Sidebar -->
<nav class="navbar navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html">GETM</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
      <li class="active"><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
      <li><a href="imagens.php"><i class="fa fa-camera"></i> Imagens</a></li>
      <li><a href="empresas.php"><i class="fa fa-suitcase"></i> Empresas</a></li>
      <li><a href="faq.php"><i class="fa fa-question-circle"></i> FAQ</a></li>
      <li><a href="socials.php"><i class="fa fa-share-square"></i> Redes Sociais</a></li>
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

    <ul class="nav navbar-nav navbar-right navbar-user">
      <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['user_logado'];//Rafael Damasio ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <!-- <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li> -->
          <!-- <li class="divider"></li> -->
          <li><a href="logout.php"><i class="fa fa-power-off"></i> Sair</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>