<?php
namespace Api\Model\Entity;

class CarteiraCliente extends \GORM\Model{
    private $idCarteiraCliente;
    private $nomeCarteiraCliente;
    private $carteira;
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
     * Converte o Objeto para um array
     * 
     * @return void
     */
    public function toArray(): Array {
        $temp = array(
           'idCarteiraCliente'   => $this->__get('idCarteiraCliente'),
           'nomeCarteiraCliente' => $this->__get('nomeCarteiraCliente'),
           'carteira'   => $this->__get('carteira')
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

    public function load($data){
        foreach ($data as $key => $value) {
            $this->__set($key,$value);
        }
    }
}
