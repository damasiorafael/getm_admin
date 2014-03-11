<!DOCTYPE html>
<html lang="en">
  <?php include('inc/head.php'); ?>

  <body class="table-sorter imagens">

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
                <a href="#" class="btn btn-default btn-success btn-ajax-add-imagem"><span class="fa fa-check"></span> Adicionar</a>
              </div>
              <h2>Imagens</h2>
              <div class="table-responsive table-users-relative">
                <table class="table table-bordered table-hover table-striped tablesorter table-users">
                  <thead>
                    <tr>
                      <th class="al-center">ID <i class="fa fa-sorter"></i></th>
                      <th>Título <i class="fa fa-sorter"></i></th>
                      <th class="al-center">Arquivo <i class="fa fa-sorter"></i></th>
                      <th class="al-center">Destaque <i class="fa"></i></th>
                      <th class="al-center">Ativo <i class="fa"></i></th>
                      <th class="al-center">Ações</th>
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
              <h2>Editar Imagem</h2>
              <div class="form-responsivo">
                <form role="form" id="formEditImagem" method="post" action="uploadImage.php" class="form form-validate" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="imagem">Nome</label>
                    <input type="hidden" class="form-control" id="url" name="url" value="form-envia.php" />
                    <input type="hidden" class="form-control" id="acao" name="acao" value="" />
                    <input type="hidden" class="form-control" id="id" name="id" value="" />
                    <input class="form-control" id="nome" name="nome" value="" />
                  </div>
                  <div class="form-group">
                    <label for="arquivo">Arquivo</label>
                    <input type="file" class="form-control" id="arquivo" name="arquivo" />
                    <div id="envImg"></div>
                    <div class="form-group form-group-edit-imagem">
                      <label for="editarArquivo">Editar Arquivo</label>
                      <label>
                        <input type="checkbox" id="editarArquivo" name="editarArquivo" value="1" />
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="destaque">Destaque</label>
                    <label>
                      <input type="checkbox" id="destaque" name="destaque" value="1" checked="" />
                    </label>
                  </div>
                  <div class="form-group">
                    <label for="ativo">Ativo</label>
                    <label>
                      <input type="checkbox" id="ativo" name="ativo" value="1" checked="checked" />
                    </label>
                  </div>
                  <div class="form-group pull-right">
                    <button type="submit" class="btn btn-default btn-success btn-salva-img"><span class="fa fa-check"></span> Salvar</button>
                    <button type="reset" class="btn btn-default btn-danger btn-cancela-img"><span class="fa fa-times"></span> Cancelar</button>
                  </div>
                </form>
                <div id="output"></div>
              </div>
            </div>
          </div><!-- /.row -->
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include('inc/scripts.php'); ?>
  </body>
</html>