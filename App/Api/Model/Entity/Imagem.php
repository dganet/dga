<?php
namespace Api\Model\Entity;

class Imagem extends \GORM\Model{
    private $idImagem;
    private $caminhoImagem;
    private $nomeImagem;
    private $statusImagem;
    private $createAtImagem;
    private $updateAtImagem;
    private $fkGaleria;


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
        return $this->$attr;
    }

    public function toArray(){
        return [
            'idGaleria'     => $this->__get('idGaleria'),
            'nomeGaleria'   => $this->__get('nomeGaleria')
        ];
    }

    public function __toString(){
        var_dump($this->toArray());
    }
}