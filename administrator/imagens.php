<!DOCTYPE html>
<html lang="en">
  <?php include('inc/head.php'); ?>

  <body class="table-sorter">

    <div id="wrapper">

      <?php include('inc/navbar.php'); ?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Painel Administrativo <small></small></h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i> Home</li>
              <li class="active"><i class="fa fa-camera"></i> imagens</li>
            </ol>
            <div class="col-lg-8">
              <div class="cont-button-add-user">
                <a href="#" class="btn btn-default btn-success btn-ajax-add"><span class="fa fa-check"></span> Adicionar</a>
              </div>
              <h2>Imagens</h2>
              <div class="table-responsive table-users-relative">
                <table class="table table-bordered table-hover table-striped tablesorter table-users">
                  <thead>
                    <tr>
                      <th class="al-center">ID <i class="fa"></i></th>
                      <th>Usuário <i class="fa"></i></th>
                      <th>Username <i class="fa"></i></th>
                      <th>E-mail <i class="fa"></i></th>
                      <th>Ações <i class="fa"></i></th>
                    </tr>
                  </thead>
                  <!-- <tbody>
                    <tr>
                      <td class="al-center">1</td>
                      <td>Rafael Damasio</td>
                      <td>damasiorafael</td>
                      <td>damasio_damasio@hotmail.com</td>
                      <td class="al-center">
                        <a href="#" class="btn btn-default btn-warning btn-ajax-edit"><span class="fa fa-edit"></span> Editar</a>
                        <a href="#" class="btn btn-default btn-danger btn-ajax-trash"><span class="fa fa-trash-o"></span> Excluir</a>
                      </td>
                    </tr>
                  </tbody> -->
                </table>
              </div>
            </div>
            <div class="col-lg-4 col-add-edit">
              <div class="el-overlay overlay-load">
                <div class="progress progress-striped active progress-bar-form">
                  <div class="progress-bar"></div>
                </div>
              </div>
              <h2>Editar Usuário</h2>
              <div class="form-responsivo">
                <form role="form" id="formEditUser" class="form form-validate">
                  <div class="form-group">
                    <label for="usuario">Usuário</label>
                    <input type="hidden" class="form-control" id="url" name="url" value="form-envia.php" />
                    <input type="hidden" class="form-control" id="acao" name="acao" value="" />
                    <input type="hidden" class="form-control" id="id" name="id" value="" />
                    <input class="form-control" id="usuario" name="usuario" value="" />
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input class="form-control" id="username" name="username" value="" />
                  </div>
                  <div class="form-group">
                    <label for="email">E-mail</label>
                    <input class="form-control" id="email" name="email" value="" />
                  </div>
                  <div class="form-group">
                    <label for="senha">Senha</label>
                    <input class="form-control" id="senha" type="password" name="senha" value="" />
                  </div>
                  <div class="form-group">
                    <label for="confirmaSenha">Confirmar senha</label>
                    <input class="form-control" id="confirmaSenha" type="password" name="confirmaSenha" value="" />
                  </div>
                  <div class="form-group pull-right">
                    <button type="submit" class="btn btn-default btn-success btn-salva-user"><span class="fa fa-check"></span> Salvar</button>
                    <button type="reset" class="btn btn-default btn-danger btn-cancela-user"><span class="fa fa-times"></span> Cancelar</button>
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