<?php
namespace Api\Model\Entity;

class Problema extends \GORM\Model{
    private $idProblema;
    private $nomeProblema;

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
            'nomeProblema' => $this->__get('nomeProblema')
        );
    }
    
    public function __toString(){
        return var_dump($this->toArray());
    }
}