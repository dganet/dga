<?php
namespace Api\Model\Entity;

class Proprietario extends \GORM\Model{
    public $idProprietario;
    public $nomeProprietario;
    public $sobrenomeProprietario;
    public $cpfProprietario;
    public $telComercialProprietario;
    public $emailProprietario;
    public $statusProprietario;
    public $createAtProprietario;
    public $updateAtProprietario;
    
    
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
    
}