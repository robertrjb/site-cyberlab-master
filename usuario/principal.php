<?php
require_once('../config.php');
if(!$_SESSION['logado']){
    header('location: ../index.html');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendamentos</title>

    <!-- ESTILO -->
   <link href="../css/estiloagenda.css" rel="stylesheet" type="text/css" media="screen">
</head>

<body>
    <section class="sectable">
        <table>
            <caption>Agendamentos</caption>
            <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Tipo do Agendamento</th>
            </tr>

            <?php //inicio PHP getListAgend
                require_once('../config.php');
                $agendamentos =  Usuario::getListAgend($_SESSION['id_user']);

                if (count($agendamentos) > 0){

                foreach($agendamentos as $agenda){
            ?>

            <tr>
                <td><?php echo $agenda['data_agen']; ?></td>
                <td><?php echo $agenda['hora_agen']; ?></td>
                <td><?php echo utf8_encode($agenda['tipo_agen']); ?></td>
            </tr>

            <?php }; } else { ?>
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <?php }; //FIM PHP getListAgend ?>
            
        </table>
        
        <!-- Número de agendamentos. -->
        <article>
        <?php 
            if (count($agendamentos) == 0){ ?>
                <p>
                    <?php echo $_SESSION['nome_user']; ?>, 
                    você tem não tem agendamentos.
                </p> <?php } ?>
        
        <?php 
            if (count($agendamentos) == 1){ ?>
                <p>
                    <?php echo $_SESSION['nome_user']; ?>, 
                    você tem <?php echo count($agendamentos) ?> agendamento marcado.
                </p> <?php } ?>
        
        <?php 
            if (count($agendamentos) > 1){ ?>
                <p>
                    <?php echo $_SESSION['nome_user']; ?>, 
                    você tem <?php echo count($agendamentos) ?> agendamentos.
                </p> <?php } ?>                       
        </article>  
        <!-- Fim Número de agendamentos. -->
        
        <article class="botao">
            <article>
                <div> <a href="op_usuario.php?sair=true">sair</a> </div>
            </article>
        </article>
        
    </section>

    <!-- TEMA ESCURO -->
      <script type="text/javascript" src="../js/temaescuro.js"></script>

</body>
</html>