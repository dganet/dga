<?php
namespace Api\Model\Entity;

class Agenda extends \GORM\Model{
    private $idAgenda;
    private $nomeAgenda;
    private $telefones;
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
            case 'Telefone':
                $telefone = new Telefone();
                $telefone = $telefone->find('where fkAgenda='.$this->idAgenda);
                return $telefone;
            case 'Telefones':
                $telefone = new Telefone();
                $telefone = $telefone->select('where fkAgenda='.$this->idAgenda);
                return $telefone;
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
           'idAgenda'   => $this->__get('idAgenda'),
           'nomeAgenda' => $this->__get('nomeAgenda')
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
