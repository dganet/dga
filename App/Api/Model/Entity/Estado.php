<?php
namespace Api\Model\Entity;

class Estado extends \GORM\Model{
    private $idEstado;
    private $nome;
    private $uf;
    private $paisId;
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
            case 'paisId':
                if ($this->recursive){ 
                    $pais = Pais::getInstance();
                    $pais->find('where idPais='.$this->$attr);
                    return $pais->toArray();
                }else{ 
                    return $this->$attr;  
                }
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
           'idEstado' => $this->__get('idEstado'),
           'nome' => $this->__get('nome'),
           'uf' => $this->__get('uf'),
           'paisId' => $this->__get('paisId')
        );
        foreach ($temp as $key => $value) {
            if($value == null){
                unset($temp[$key]);
            }
        }
        return $temp;
    }
    /**
     * Retorna as propriedades da classe
     * 
     * @return string
     */
    public function __toString(){
        return var_dump($this->toArray());
    }
    public function load($data){
        foreach ($data as $key => $value) {
            $this->__set($key,$value);
        }
    }
}