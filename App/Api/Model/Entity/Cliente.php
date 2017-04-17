<?php
namespace Api\Model\Entity;

class Cliente extends \GORM\Model{
    private $idCliente;
    private $nomeCliente;
    private $emailCliente;
    private $enderecoCliente;
    private $createAtCliente;
    private $updateAtCliente;
    private $statusCliente;
    private $fkAgenda;

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
          case 'Agenda':
            if($this->fkAgenda == null){
                return null;
            }else{
                $idAgenda       = (int) $this->fkAgenda;
                $agenda         = new Agenda();
                $agenda         = $agenda->find($idAgenda);
                return $agenda;
            }
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
           'idCliente'   => $this->__get('idCliente'),
           'nomeCliente' => $this->__get('nomeCliente'),
           'emailCliente'   => $this->__get('emailCliente'),
           'enderecoCliente' => $this->__get('enderecoCliente'),
           'createAtCliente'   => $this->__get('createAtCliente'),
           'updateAtCliente' => $this->__get('updateAtCliente'),
           'statusCliente'   => $this->__get('statusCliente'),
           'fkAgenda' => $this->__get('fkAgenda')
           
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