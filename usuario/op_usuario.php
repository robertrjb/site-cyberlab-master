<?php

if (!$_SESSION['logado']){
    header('location: ../index.html');
}

require_once('../config.php');

// login do usuario e select agendamento
if (isset($_POST['txt_login'])){
    $txt_login = isset($_POST['txt_login'])?$_POST['txt_login']:'';
    $txt_senha = isset($_POST['txt_senha'])?$_POST['txt_senha']:'';

    if (empty($txt_login) || empty($txt_senha)){
        header('location:login.php?msg=*Preencha os campos');
        exit;
    }

    $user = new Usuario();

    $user->efetuarLogin($txt_login,$txt_senha);

    if (($user->getId()==null)){
        echo $user->getId();
        header('location:login.php?msg=*Usuário ou senha incorretos');
        exit;
    }

    // registrar sessão do usuário
    $_SESSION['logado'] = true;
    $_SESSION['id_user'] = $user->getId();
    $_SESSION['nome_user'] = $user->getNome();
    $_SESSION['login_user'] = $user->getLogin();

    header('location:principal.php');

}

    //encerrar sessão do usuario
    if ($_GET['sair']){
        $_SESSION['logado'] = false;
        $_SESSION['id_user'] = null;
        $_SESSION['nome_user'] = null;
        $_SESSION['login_user'] = null;

        header('location:login.php');
    }

?>