<?php
class Usuario{
    private $id;
    private $nome;
    private $login;
    private $senha;

    public function getId(){
        return $this->id;
    }
    
    public function setId($value){
        $this->id=$value;
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($value){
        $this->nome=$value;
    }

    public function getLogin(){
        return $this->login;
    }
    public function setLogin($value){
        $this->login=$value;
    }

    public function getSenha(){
        return $this->senha;
    }
   
    public function setSenha($value){
        $this->senha=$value;
    }

    public function efetuarLogin($_login, $_senha){ 
        $sql = new SqlCmd();
        $senha_cript = md5($_senha);
        $resultado = $sql->selectSql("SELECT * FROM clientes WHERE login_cli = :login AND senha_cli = :senha",
        array(':login'=>$_login,':senha'=>$senha_cript));
        if (count($resultado)>0){
            $this->setData($resultado[0]);
        }
    }

    public function setData($dados){
        $this->setId($dados['idClientes']);
        $this->setNome($dados['nome_cli']);
        $this->setLogin($dados['login_cli']);
        $this->setSenha($dados['senha_cli']);
    }

    public static function getListAgend($id_cli){
        $sql = new SqlCmd();
        return $sql->selectSql("SELECT DATE_FORMAT (data_agen, '%d/%m/%Y') AS data_agen,
         TIME_FORMAT (hora_agen, '%H:%i') AS hora_agen, tipo_agen FROM agendamentos WHERE Clientes_idClientes = :id_cli ORDER BY data_agen",
        array(':id_cli'=>$id_cli));
        
    }

    public function __construct($_nome="",$_login="",$_senha=""){
        $this->nome = $_nome;
        $this->login = $_login;
        $this->senha = $_senha;
        $this->tipoAgen = $_tipo;
        $this->dataAgen = $_data;
        $this->horaAgen = $_hora;
    }

}

?>