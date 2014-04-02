<?php
    session_start();
    include('inc/config.php');

    $controle = false;

    $arrayRequest   = array();
    $arrayCampos    = array();

    $username    = anti_injection($_REQUEST['username']);
    $senha       = anti_injection($_REQUEST['senha']);

    $tabela         = "users";

    if(selectdbcount($tabela, "username", $username)){
        if(logaBanco($tabela,$username,SHA1($senha))){
            $_SESSION['logado'] = "1";
            header('Location: index.php');
        } else {
            $_SESSION['erro_login'] = "Usuário ou senha incorretos, por favor tente novamente!";
            header('Location: login.php');
        }
    } else {
        $_SESSION['erro_login'] = "Usuário não encontrado, por favor tente novamente!";
        header('Location: login.php');
    }
?>