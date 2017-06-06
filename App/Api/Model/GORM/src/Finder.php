<?php
namespace GORM;
use PDO;
trait Finder
{
    public function all(){
        return $this->select();
    }
    /**
     * Select procura no banco de dados as informações que vierem com o array
     * @param Array $array
     * @return Object Json
     */
    public function select($array = []){
        self::loadTable();
        $sql        = self::makeSelect($array);
        $con        = new ConnectionFactory($this->db);
        $db         = $con->getInstance();
        $consulta   = $db->query($sql);
        $consulta   = $consulta->fetchAll(PDO::FETCH_ASSOC);
        return $consulta;
    }
    /**
     * Procura no banco de dados por 1 registro conforme o tipo de dado enviado
     * se enviado um int ele entenderá que é um id e ira procurar por id, se for
     * uma string ele entenderá que é um fim de query e deverá conter campo=valor 
     * desejado.
     * 
     * @return Object
     */
    public function find($value){
        self::loadTable();
        $sql        = self::makeSelect($value);
        if (self::_getDebug()){
            print_r($sql);
        }
        $con        = new ConnectionFactory($this->db);
        $db         = $con->getInstance();
        $consulta   = $db->query($sql);
        $consulta   = $consulta->fetch(PDO::FETCH_ASSOC);
        $cls        =  get_called_class();
        return new $cls($consulta);

    }
}