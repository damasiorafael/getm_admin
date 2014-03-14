<!DOCTYPE html>
<html lang="en">
  <?php include('inc/head.php'); ?>

  <body class="table-sorter empresas">

    <div id="wrapper">

      <?php include('inc/navbar.php'); ?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Painel Administrativo <small></small></h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i> Home</li>
              <li class="active"><i class="fa fa-suitcase"></i> empresas</li>
            </ol>
            <div class="col-lg-8">
              <div class="cont-button-add-user">
                <a href="#" class="btn btn-default btn-success btn-ajax-add-empresa"><span class="fa fa-check"></span> Adicionar</a>
              </div>
              <h2>Empresas</h2>
              <div class="table-responsive table-users-relative">
                <table class="table table-bordered table-hover table-striped tablesorter table-users">
                  <thead>
                    <tr>
                      <th class="al-center">ID <i class="fa"></i></th>
                      <th>Nome <i class="fa"></i></th>
                      <th>Endereço <i class="fa"></i></th>
                      <th>Fone <i class="fa"></i></th>
                      <th>Site <i class="fa"></i></th>
                      <th>Ramo de Atividade <i class="fa"></i></th>
                      <th>Imagem <i class="fa"></i></th>
                      <th>Latitude <i class="fa"></i></th>
                      <th>Longitude <i class="fa"></i></th>
                      <th>Ativo <i class="fa"></i></th>
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
              <h2>Editar Empresa</h2>
              <div class="form-responsivo">
                <form role="form" id="formEditEmpresa" class="form form-validate" enctype="multipart/form-data" action="uploadImage.php">
                  <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="hidden" class="form-control" id="url" name="url" value="form-envia.php" />
                    <input type="hidden" class="form-control" id="acao" name="acao" value="" />
                    <input type="hidden" class="form-control" id="id" name="id" value="" />
                    <input class="form-control" id="nome" name="nome" value="" />
                  </div>
                  <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input class="form-control" id="endereco" name="endereco" value="" />
                  </div>
                  <div class="form-group">
                    <label for="fone">Fone</label>
                    <input class="form-control" id="fone" name="fone" value="" />
                  </div>
                  <div class="form-group">
                    <label for="site">Site</label>
                    <input class="form-control" id="site" name="site" value="" />
                  </div>
                  <div class="form-group">
                    <label for="ramo_atividade">Ramo de Atividade</label>
                    <input class="form-control" id="ramo_atividade" name="ramo_atividade" value="" />
                  </div>
                  <div class="form-group">
                    <label for="imagem">Imagem (Tamanho máximo 1MB)</label>
                    <input class="form-control" type="file" id="imagem" name="imagem" value="" />
                    <div id="envImg"></div>
                    <div class="form-group form-group-edit-imagem">
                      <label for="editarArquivo">Editar Arquivo</label>
                      <label>
                        <input type="checkbox" id="editarArquivo" name="editarArquivo" value="1" />
                      </label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="latitude">Latitude</label>
                    <input class="form-control" id="latitude" name="latitude" value="" />
                  </div>
                  <div class="form-group">
                    <label for="longitude">Longitude</label>
                    <input class="form-control" id="longitude" name="longitude" value="" />
                  </div>
                  <div class="form-group">
                    <label for="ativo">Ativo</label>
                    <label>
                      <input type="checkbox" id="ativo" name="ativo" value="1" checked="checked" />
                    </label>
                  </div>
                  <div class="form-group pull-right">
                    <button type="submit" class="btn btn-default btn-success btn-salva-user"><span class="fa fa-check"></span> Salvar</button>
                    <button type="reset" class="btn btn-default btn-danger btn-cancela"><span class="fa fa-times"></span> Cancelar</button>
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