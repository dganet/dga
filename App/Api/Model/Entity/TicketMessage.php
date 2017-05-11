<?php
namespace Api\Model\Entity;

class TicketMessage extends \GORM\Model{
    private $idTicketMessage;
    private $mensagemTicketMessage;
    private $isAssoc;
    private $fkTicket;
    private $idRemetente;
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
        switch ($attr) {
            case 'idRemetente':
                if ($isAssoc){
                    $assoc = new Associado();
                    $assoc = $assoc->load($this->idRemetente);
                    return $assoc;
                }else{
                    $user = new Usuario();
                    $user = $user->load($this->idRemetente);
                    return $user;
                }
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
            'mensagemTicketMessage' =>  $this->__get('mensagemTicketMessage'),
            'isAssoc'       => $this->__get('isAssoc'),
            'idRemetente'    => $this->__get('idRemetente'),
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