<?php
namespace Api\Model\Entity;

class CarteiraCliente extends \GORM\Model{
    public $idCarteiraCliente;
    public $nomeCarteiraCliente;
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
            case 'Carteira':
                $this->carteira = Cliente::getInstance();
                $this->carteira = $this->carteira->select('where fkCarteiraCliente='.$this->idCarteiraCliente);
                return $this->carteira;
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
