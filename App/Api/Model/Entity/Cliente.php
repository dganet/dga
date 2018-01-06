<?php
namespace Api\Model\Entity;

class Cliente extends \GORM\Model{
    public $idCliente;
    public $nomeCliente;
    public $emailCliente;
    public $enderecoCliente;
    public $telComercialCliente;
    public $telFixoCliente;
    public $telCelularCliente;
    public $createAtCliente;
    public $updateAtCliente;
    public $statusCliente;
    public $fkCarteiraCliente;

    
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
    
}