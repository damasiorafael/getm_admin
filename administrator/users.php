<?php
	include('inc/checa_login.php');
	include('inc/config.php');
	$idUser 		= anti_injection($_REQUEST['idUser']);
	if($idUser == ''){
		header('Location: index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
  <?php include('inc/head.php'); ?>

  <body class="table-sorter users">

    <div id="wrapper">

      <?php include('inc/navbar.php'); ?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Painel Administrativo <small></small></h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i> Home</li>
              <li class="active"><i class="fa fa-user"></i> users</li>
            </ol>
            <div class="col-lg-4 col-add-edit" style="display: block">
              <div class="el-overlay overlay-load overlay-load-users col-lg-12">
                <div class="progress progress-striped active progress-bar-form">
                  <div class="progress-bar"></div>
                </div>
              </div>
              <h2>Trocar Senha</h2>
              <div class="form-responsivo">
                <form role="form" id="formEditUser" class="form form-validate">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="url" name="url" value="form-envia.php" />
                        <input type="hidden" class="form-control" id="acao" name="acao" value="editaUser" />
                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $idUser; ?>" />
                        <label for="senhaatual">Senha atual</label>
                        <input class="form-control" id="senhaatual" type="password" name="senhaatual" value="" />
                    </div>
                    <div class="form-group">
                        <label for="novasenha">Nova senha</label>
                        <input class="form-control" id="novasenha" type="password" name="novasenha" value="" />
                    </div>
                    <div class="form-group">
                        <label for="confirmaSenhaAltera">Confirmar senha</label>
                        <input class="form-control" id="confirmaSenhaAltera" type="password" name="confirmaSenhaAltera" value="" />
                    </div>
                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-default btn-success btn-salva-user"><span class="fa fa-check"></span> Salvar</button>
                        <button type="reset" class="btn btn-default btn-danger btn-cancela-troca-senha"><span class="fa fa-times"></span> Cancelar</button>
                    </div>
                </form>
              </div>
            </div>
          </div><!-- /.row -->
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include('inc/scripts.php'); ?>
  </body>
</html>