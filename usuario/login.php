<?php 
include_once('../config.php');

    if (isset($_SESSION['logado']) == false){
      $_SESSION['logado'] = false;
    }

    if ($_SESSION['logado']){
        header('location:principal.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login do Usuário</title>

   <!-- ESTILO -->
   <link href="../css/estiloform.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
   <main>
      <section class="form">
         <form action="op_usuario.php" method="post" id="frm-login" name="frm-login">
            <article class="artform">
               <legend>Login - Cyberlab</legend>

               <label for=""> <span>Login</span> </label>
               <input type="text" name="txt_login" id="txtlogin" placeholder="Digite seu login:">

               <label for=""> <span>Senha</span> </label>
               <input type="password" name="txt_senha" id="txt_senha" placeholder="Digite sua senha:">

               <input type="submit" name="logar" id="logar" value="Entrar" class="botton">
               <br>

               <span><?php echo (isset($_GET['msg']))?$_GET['msg']:""; ?></span>
            </article>
         </form>

         <article class="botao">
            <p> Não possui cadastro? <br> Baixe o nosso App! </p>
            <div>
               <a href="#">Cyberlab App</a>
            </div>
         </article>
      </section>

      <!-- TEMA ESCURO -->
      <script type="text/javascript" src="../js/temaescuro.js"></script>
   </main>
</body>
</html>
