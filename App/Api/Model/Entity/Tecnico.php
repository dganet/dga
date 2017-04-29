<?php
namespace Api\Model\Entity;

class Tecnico extends \GORM\Model{
    private $idTecnico;
    private $nomeTecnico;

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
            'nomeTecnico' => $this->__get('nomeTecnico')
        );
    }
    
    public function __toString(){
        return var_dump($this->toArray());
    }
}