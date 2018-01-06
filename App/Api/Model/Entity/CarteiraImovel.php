<?php
namespace Api\Model\Entity;

class CarteiraImovel extends \GORM\Model{
    public $idCarteiraImovel;
    public $nomeCarteiraImovel;
    public $carteira;
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
            case 'Imovel':
                $this->carteira = Imovel::getInstance();
                $this->carteira = $this->carteira->makeSelect()->where('fkCarteiraImovel='.$this->idCarteiraImovel)->execute(true);
                $arr = $this->carteira;
                return $arr;
                break;
            default:
                return $this->$attr;
                break;
        }
    }
    /**
     * Retorna as propriedades da classe
     * 
     * @return string
     */
    public function __toString(){
        return var_dump($this->toArray());
    }

    public function beforeSave(){    
    }
}
