<?php
namespace Api\Model\Entity;

class Cliente extends \GORM\Model{
    private $idCliente;
    private $nomeCliente;
    private $emailCliente;
    private $enderecoCliente;
    private $telComercialCLiente;
    private $telFixoCliente;
    private $telCelularCliente;
    private $createAtCliente;
    private $updateAtCliente;
    private $statusCliente;
    private $fkCarteiraCliente;

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
    /**
     * Converte o Objeto para um array
     * 
     * @return void
     */
    public function toArray(): Array {
        $temp = array(
           'idCliente'   => $this->__get('idCliente'),
           'nomeCliente' => $this->__get('nomeCliente'),
           'emailCliente'   => $this->__get('emailCliente'),
           'enderecoCliente' => $this->__get('enderecoCliente'),
           'telComercialCLiente' => $this->__get('telComercialCLiente'),
           'telFixoCliente' => $this->__get('telFixoCliente'),
           'telCelularCliente' => $this->__get('telCelularCliente'),
           'createAtCliente'   => $this->__get('createAtCliente'),
           'updateAtCliente' => $this->__get('updateAtCliente'),
           'statusCliente'   => $this->__get('statusCliente'),
           'fkCarteiraCliente' => $this->__get('fkCarteiraCliente')
           
        );
        foreach ($temp as $key => $value) {
            if($value == null){
                unset($temp[$key]);
            }
        }
        return $temp;
    }
    /**
     * Retorna as propriedades da classe
     * 
     * @return string
     */
    public function __toString(){
        return var_dump($this->toArray());
    }
}