<?php
namespace Api\Model\Entity;

class Imagem Extends \GORM\Model {
    /**
     * Variavel que recebe o id do sit
     * 
     * @var 
     */
    private $id;
    private $path;
    private $nome;
    private $tipo;
    private $link;
    private $status;
    private $createAt;
    private $updateAt;
    
    public function __construct($data = []){
        foreach ($data as $key => $value) {
            $this->__set($key, $value);
        }
        $this->class = $this;
    }

     public function __get($attr){
        return $this->$attr;   
    }
    public function __set($attr, $value){
        $this->$attr = $value;
    }
    
    public function toArray(){
        return array(
            'id'        => $this->__get('id'),
            'path'      => $this->__get('path'),
            'nome'      => $this->__get('nome'),
            'tipo'      => $this->__get('tipo'),
            'link'      => $this->__get('link'),
            'status'    => $this->__get('status'),
            'createAt'  => $this->__get('createAt'),
            'updateAt'  => $this->__get('updateAt')
        );
    }

    public function load($data){
        foreach ($data as $key => $value) {
            $this->__set($key, $value);
        }
    }
    public function __toString(){
        return var_dump($this->toArray());
    }
    
}