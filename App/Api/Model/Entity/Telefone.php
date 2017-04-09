<?php
namespace Api\Model\Entity;

class Telefone extends \GORM\Model{
    private $idTelefone;
    private $numeroTelefone;
    private $descricaoTelefone;
    private $createAtTelefone;
    private $updateAtTelefone;
    private $statusTelefone;
    private $fkAgenda;
     /**
     * Construtor
     * 
     * @param Array $data
     */
    public function __construct($data = []){
        foreach ($data as $key => $value) {
            $this->__set($key,$value);
        }
        $this->class = $this;
    }
    /**
     * Metodo Setter
     * 
     * @param String $attr
     * @param String $value
     */
    public function __set($attr, $value){
        $this->$attr = $value;
    }
    /**
     * Metodo Getters 
     * 
     * @param String $attr
     * @return String
     */
    public function __get($attr){
        switch ($attr) {
            case is_int():
                echo "inteiro";
                break;
            default:
                return $this->$attr;
                break;
        }
    }
    /**
     * Converte o Objeto para um array
     * 
     * @return void
     */
    public function toArray(): Array {
        $temp = array(
           'idTelefone'     => $this->__get('idTelefone'),
           'numeroTelefone'=> $this->__get('numeroTelefone'),
           'descricaoTelefone'=> $this->__get('descricaoTelefone'),
           'createAtTelefone'=> $this->__get('createAtTelefone'),
           'updateAtTelefone'=> $this->__get('updateAtTelefone'),
           'statusTelefone'=> $this->__get('statusTelefone'),
           'fkAgenda'=> $this->__get('fkAgenda')
        );
        foreach ($temp as $key => $value) {
            if($value == null){
                unset($temp[$key]);
            }
        }
        return $temp;
    }
   /**
     * Retorna os valores das propriedades da classe
     * 
     * @return string
     */
    public function __toString(){
        return var_dump($this->toArray());
    }
}