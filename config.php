<?php
if (!isset($_SESSION)){
    session_start();
}

date_default_timezone_get("America/Sao_Paulo");

spl_autoload_register(function($nome_classe){
    $nome_arquivo = "class".DIRECTORY_SEPARATOR.$nome_classe.".php";
    if (file_exists($nome_arquivo)){
        require_once($nome_arquivo);
    }
});

?>