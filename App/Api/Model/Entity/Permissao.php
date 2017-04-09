<?php
namespace Api\Model\Entity;

class Permissao extends \GORM\Model{
    private $idPermissao;
    private $nomePermissao;

     /**
     * Construtor
     * 
     * @param Array $data
     */
    public function __construct(Array $data = []){
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
        return $this->$attr;
    }
    /**
     * Converte o Objeto para um array
     * 
     * @return void
     */
    public function toArray(): Array {
        $temp =  array(
            'idPermissao' => $this->__get('idPermissao'),         
            'nomePermissao'  => $this->__get('nomePermissao')           
        );
        foreach ($temp as $key => $value) {
            if($value == null){
                unset($temp[$key]);
            }
        }
        return $temp;
    }
}