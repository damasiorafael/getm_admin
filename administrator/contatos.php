<?php include('inc/checa_login.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <?php include('inc/head.php'); ?>

  <body class="table-sorter contato">

    <div id="wrapper">

      <?php include('inc/navbar.php'); ?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1>Painel Administrativo <small></small></h1>
            <ol class="breadcrumb">
              <li><i class="fa fa-home"></i> Home</li>
              <li class="active"><i class="fa fa-envelope"></i> contatos</li>
            </ol>
            <div class="col-lg-12">
              <h2>Contatos</h2>
              <div class="table-responsive table-users-relative">
                <table class="table table-bordered table-hover table-striped tablesorter table-users">
                  <thead>
                    <tr>
                      <th class="al-center">ID <i class="fa"></i></th>
                      <th>Nome <i class="fa"></i></th>
                      <th>E-mail <i class="fa"></i></th>
                      <th>Departamento <i class="fa"></i></th>
                      <th>Mensagem <i class="fa"></i></th>
                      <th>Lido <i class="fa"></i></th>
                      <th>Respondido <i class="fa"></i></th>
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
          </div><!-- /.row -->
        </div><!-- /.row -->
      </div><!-- /#page-wrapper -->
    </div><!-- /#wrapper -->
    <?php include('inc/scripts.php'); ?>
  </body>
</html>