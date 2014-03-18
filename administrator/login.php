<!DOCTYPE html>
<html>
<?php
    session_start();
    include('inc/config.php');
    include('inc/head.php');
?>
<body class="pag-login">
    <div class="logo_unopar"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Efetue seu login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" action="logar.php" method="post" class="formLogin">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Login" name="username" type="login" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="senha" type="password">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Lembre-se de mim
                                    </label>
                                    <?php 
                                        if(isset($_SESSION['erro_login'])){
                                    ?>
                                            <br /><span class="error"><?php echo $_SESSION['erro_login']; ?></span>
                                    <?php
                                        }
                                    ?>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-success btn-large btn-lg btn-success btn-block" value="Entrar">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php //include('inc/scripts.php'); ?>
</body>

</html>
