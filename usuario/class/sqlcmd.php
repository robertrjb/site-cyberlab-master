<?php

class SqlCmd extends PDO {
    private $conn;

    public function __construct(){
        $this->conn = new PDO("mysql:host=127.0.0.1;dbname=db_cyberlab","root","");
    }

    public function setParametros ($comando, $parametros = array()){
        foreach ($parametros as $key => $value){
            $this->setParametro($comando, $key, $value);
        }
    }

    public function setParametro($cmd, $key, $value){
        $cmd->bindParam($key, $value);
    }

    public function querySql($comandoSql, $parametros = array()){
        $cmd = $this->conn->prepare($comandoSql);
        $this->setParametros($cmd,$parametros);
        $cmd->execute();
        return $cmd;
    }

    public function selectSql($comandoSql, $parametros = array()){
        $cmdRetornado = $this->querySql($comandoSql,$parametros);
        return $cmdRetornado->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>