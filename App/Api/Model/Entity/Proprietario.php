<?php
namespace Api\Model\Entity;

class Proprietario extends \GORM\Model{
    private $idProprietario;
    private $nomeProprietario;
    private $sobrenomeProprietario;
    private $cpfProprietario;
    private $emailProprietario;
    private $statusProprietario;
    private $createAtProprietario;
    private $updateAtProprietario;
    /**
     * Contrutor
     *
     * @param array $data
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
           'idProprietario'   => $this->__get('idProprietario'),
           'nomeProprietario' => $this->__get('nomeProprietario'),
           'sobrenomeProprietario'   => $this->__get('sobrenomeProprietario'),
           'emailProprietario' => $this->__get('emailProprietario'),
           'statusProprietario'   => $this->__get('statusProprietario'),
           'createAtProprietario' => $this->__get('createAtProprietario'),
           'updateAtProprietario'   => $this->__get('updateAtProprietario')
           
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
    /**
     * Verifica se o priprietário tem pelo menos 1 Imovel ativo
     *
     * @return boolean
     */
    private function hasImovel(){
        $imovel = new Imovel();
        $imovel = $imovel->find('where fkProprietario='. $this->idProprietario." AND statusImovel='ATIVO'");
        if ($imovel->idImovel==null){
            return false;
        }else{
            return true;
        }
    }
    public function load($data){
        foreach ($data as $key => $value) {
            $this->__set($key,$value);
        }
    }
}