<?php
namespace Api\Model\Entity;

class Galeria extends \GORM\Model{
    private $idGaleria;
    private $nomeGaleria;

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
            case 'Imagens':
                $img = new Imagem();
                $img = $img->select('where fkGaleria='.$this->idGaleria);
                return $img;
                break;
            default:
                return $this->$attr;
                break;
        }
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