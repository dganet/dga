<?php
namespace Api\Model\Entity;

class Servico extends \GORM\Model{
    private $idServico;
    private $nomeServico;

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
            'nomeServico' => $this->__get('nomeServico')
        );
    }
    
    public function __toString(){
        return var_dump($this->toArray());
    }
}