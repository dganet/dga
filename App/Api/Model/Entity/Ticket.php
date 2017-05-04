<?php
namespace Api\Model\Entity;

class Ticket extends \GORM\Model{
    private $idTicket;
    private $assuntoTicket;
    private $descricaoTicket;
    private $fkAssociado;
    private $statusTicket;
    private $createAtTicket;
    private $updateAtTicket;
    private $closedAtTicket;

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
        switch ($attr) {
            case 'messages':
                $messages = new TicketMessage();
                $message = $message->select(array('where' => array('fkTicket' =>$this->idTicket)));
                return $message;
                break;
            default:
                return $this->$attr;
                break;
        }
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
            'assuntoTicket' =>  $this->__get('assuntoTicket'),
            'descricaoTicket' =>  $this->__get('descricaoTicket'),
            'fkAssociado' =>  $this->__get('fkAssociado'),
            'statusTicket' =>  $this->__get('statusTicket'),
            'messages'  => $this->__get('messages'),
            'createAtTicket' =>  $this->__get('createAtTicket'),
            'updateAtTicket' =>  $this->__get('updateAtTicket'),
            'closedAtTicket' =>  $this->__get('closedAtTicket')
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