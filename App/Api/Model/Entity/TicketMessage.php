<?php
namespace Api\Model\Entity;

class TicketMessage extends \GORM\Model{
    private $idTicketMessage;
    private $mensagemTicketMessage;
    private $fkTicket;
    private $createAtTicket;
    /**
     * Classe Construtora
     */
    public function __construct($array = [])
    {
        foreach ($data as $key => $value) {
			$this->__set($key, $value);
        }
        $this->class = $this;
    }
    /**
     * Getter
     * 
     * @param [type] $attr
     * @return void
     */
    public function __get($attr){
        return $this->$attr;
    }
    /**
     * Setter
     * 
     * @param [type] $attr
     * @param [type] $values
     */
    public function __set($attr, $values){
        $this->$attr = $values;
    }
    /**
     * Metodo para converter o objeto em array
     * 
     * @return void
     */
    public function toArray(){
        return array(
            'mensagemTicketMessage' =>  $this->__get('mensagemTicketMessage'),
            'fkTicket' =>  $this->__get('fkTicket'),
            'createAtTicket' =>  $this->__get('createAtTicket')
        );
    }
    /**
     * Converter a classe em String
     * 
     * @return string
     */
    public function __toString(){
        return var_dump($this->toArray());
    }
}