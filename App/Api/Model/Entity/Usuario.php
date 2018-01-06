<?php
namespace Api\Model\Entity;

class Usuario extends \GORM\Model{
    public $idUsuario;
    public $idFacebook;
    public $emailUsuario;
    public $senhaUsuario;
    public $nomeUsuario;
    public $sobrenomeUsuario;
    public $creciUsuario;
    public $telComercialUsuario;
    public $telCelularUsuario;
    public $telFixoUsuario;
    public $createAtUsuario;
    public $updateAtUsuario;
    public $statusUsuario;
    public $fkPermissao;
    public $fkCarteiraImovel;
    public $fkCarteiraCliente;
    
    /**
     * Metodo Setter
     * 
     * @param String $attr
     * @param String $value
     */
    public function __set($attr, $value){ 
        switch ($attr) {
            case 'senhaUsuario':
                $this->$attr = $value;
                break;
            default:
                $this->$attr = $value;
                break;
        }
    }
    /**
     * Metodo Getters 
     * 
     * @param String $attr
     * @return String
     */
    public function __get($attr = null){
        switch ($attr) {
            case 'Permissao':
                $idPermissao    = (int) $this->fkPermissao;
                $permissao      = new Permissao();
                $permissar->setPrimaryKey('idPermissao');
                $permissao      = $permissao->find($idPermissao);
                return $permissao;
                break;
            case 'CarteiraCliente':
                $carteiraCliente = CarteiraCliente::getInstance();
                $carteiraCliente->setPrimaryKey('idCarteiraCliente');
                $carteiraCliente->find((int) $this->fkCarteiraCliente);
                return $carteiraCliente->Carteira;
                break;
            case 'CarteiraImovel':
                $carteiraImovel = CarteiraImovel::getInstance();
                $carteiraImovel->setPrimaryKey('idCarteiraImovel');
                $carteiraImovel->find((int) $this->fkCarteiraImovel);
                return $carteiraImovel; 
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
   
    /**
     * Retorna os valores das propriedades da classe
     * 
     * @return string
     */
    public function __toString(){
        return var_dump($this->toArray());
    }

   
}