<?php
namespace Api\Model\Entity;

class Bairro extends \GORM\Model{
    private $idBairro;
    private $nomeBairro;

    public function __construct($data = []){
        foreach ($data as $key => $value) {
            $this->__set($key,$value);
        }
        $this->class = $this;
    }

    public function __get($attr){
      return $this->$attr;
    }
    public function __set($attr, $values){
        $this->$attr = $values;
    }

    public function toArray(){
        return array(
            'nomeBairro' => $this->__get('nomeBairro')
        );
    }
    
    public function __toString(){
        return var_dump($this->toArray());
    }
}