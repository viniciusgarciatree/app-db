<?php

namespace App\Services;

use PDO;
use PDOException;

class DataBase{
    
    private $dbtype   = "mysql";
    private $host     = "localhost";
    private $port     = "3306";
    private $user     = "root";
    private $password = "123";
    private $db       = "teste";
    private $conexao;

    /*Método construtor do banco de dados*/
    public function __construct($host, $user = null, $password = null, $db = null){
        $this->dbtype = 'mysql';
        $this->host = $host;
        $this->port = 3306;
        $this->user = $user;
        $this->password = $password;
        $this->db = $db;
    }
     
    /*Evita que a classe seja clonada*/
    private function __clone(){}
     
    /*Método que destroi a conexão com banco de dados e remove da memória todas as variáveis setadas*/
    public function __destruct() {
        $this->disconnect();
        foreach ($this as $key => $value) {
            unset($this->$key);
        }
    }
     
    /*Metodos que trazem o conteudo da variavel desejada
    @return   $xxx = conteudo da variavel solicitada*/
    private function getDBType()  {return $this->dbtype;}
    private function getHost()    {return $this->host;}
    private function getPort()    {return $this->port;}
    private function getUser()    {return $this->user;}
    private function getPassword(){return $this->password;}
    private function getDB()      {return $this->db;}
    
    public function setDBType($dbtype)  {self::$dbtype = $dbtype;}
    public function setHost($host)    {self::$host = $host;}
    public function setPort($port)    {self::$port = $port;}
    public function setUser($user)    {self::$user = $user;}
    public function setPassword($password) {self::$password = $password;}
    public function setDB($db)      {self::$db = $db;}

    private $erro = "";

    private function setErro($erro)
    {
        $this->erro = $erro;
    }
    public function getErro(){
        return $this->erro;
    }

    private function connect(){
        try
        {
            $this->conexao = new PDO($this->getDBType().":host=".$this->getHost().";port=".$this->getPort().";dbname=".$this->getDB(), $this->getUser(), $this->getPassword());
        }
        catch (PDOException $i)
        {
            $this->setErro("Erro: <code>" . $i->getMessage() . "</code>");
        }
         
        return ($this->conexao);
    }
     
    private function disconnect(){
        $this->conexao = null;
    }
     
    /*Método select que retorna um VO ou um array de objetos*/
    public function selectDB($sql,$params=null,$class=null){
        try{
            $query=$this->connect()->prepare($sql);
            $query->execute($params);
            
            if(isset($class)){
                $rs = $query->fetchAll(PDO::FETCH_CLASS,$class) or die(print_r($query->errorInfo(), true));
            }else{
                $rs = $query->fetchAll(PDO::FETCH_OBJ) or die(print_r($query->errorInfo(), true));
            }
            self::__destruct();
            return $rs;
        }
        catch (PDOException $i)
        {
            $this->setErro("Erro: <code>" . $i->getMessage() . "</code>");
        }
    }
    
    public function testConect()
    {
        try {
            $this->connect();
            self::__destruct();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
     
    /*Método insert que insere valores no banco de dados e retorna o último id inserido*/
    public function insertDB($sql,$params=null){
        try{
            $conexao=$this->connect();
            $query=$conexao->prepare($sql);
            $query->execute($params);
            $rs = $conexao->lastInsertId() or die(print_r($query->errorInfo(), true));
            self::__destruct();
            return $rs;
        }
        catch (PDOException $i)
        {
            $this->setErro("Erro: <code>" . $i->getMessage() . "</code>");
        }
    }
     
    /*Método update que altera valores do banco de dados e retorna o número de linhas afetadas*/
    public function updateDB($sql,$params=null){
        try{
            $query=$this->connect()->prepare($sql);
            $query->execute($params);
            $rs = $query->rowCount() or die(print_r($query->errorInfo(), true));
            self::__destruct();
            return $rs;
        }
        catch (PDOException $i)
        {
            $this->setErro("Erro: <code>" . $i->getMessage() . "</code>");
        }
    }
     
    /*Método delete que excluí valores do banco de dados retorna o número de linhas afetadas*/
    public function deleteDB($sql,$params=null){
        try{
            $query=$this->connect()->prepare($sql);
            $query->execute($params);
            $rs = $query->rowCount() or die(print_r($query->errorInfo(), true));
            self::__destruct();
            return $rs;
        }
        catch (PDOException $i)
        {
            $this->setErro("Erro: <code>" . $i->getMessage() . "</code>");
        }
    }
}
