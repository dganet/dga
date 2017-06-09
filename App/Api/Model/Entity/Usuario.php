<?php
namespace Api\Model\Entity;

class Usuario extends \GORM\Model{
    private $idUsuario;
    private $idFacebook;
    private $emailUsuario;
    private $senhaUsuario;
    private $nomeUsuario;
    private $sobrenomeUsuario;
    private $creciUsuario;
    private $telComercialUsuario;
    private $telCelularUsuario;
    private $telFixoUsuario;
    private $createAtUsuario;
    private $updateAtUsuario;
    private $statusUsuario;
    private $fkPermissao;
    private $fkCarteiraImovel;
    private $fkCarteiraCliente;
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
                $permissao      = $permissao->find($idPermissao);
                return $permissao;
                break;
            case 'CarteiraCliente':
                if($this->fkCarteiraCliente == null){
                    return null;
                }else{
                    $CarteiraCliente = new CarteiraCliente();
                    $CarteiraCliente->idCarteiraCliente = $this->fkCarteiraCliente;
                    return $CarteiraCliente->carteira;
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
            'idUsuario' => $this->__get('idUsuario'),         
            'idFacebook' => $this->__get('idFacebook'),
            'emailUsuario'  => $this->__get('emailUsuario'),          
            'senhaUsuario'  => $this->__get('senhaUsuario'),          
            'nomeUsuario'   => $this->__get('nomeUsuario'),           
            'sobrenomeUsuario'  => $this->__get('sobrenomeUsuario'),          
            'creciUsuario'  => $this->__get('creciUsuario'),
            'telComercialUsuario' =>$this->__get('telComercialUsuario'),
            'telCelularUsuario' =>$this->__get('telCelularUsuario'),
            'telFixoUsuario' =>$this->__get('telFixoUsuario'),          
            'createAtUsuario'   => $this->__get('createAtUsuario'),           
            'updateAtUsuario'   => $this->__get('updateAtUsuario'),           
            'statusUsuario' => $this->__get('statusUsuario'),         
            'fkPermissao'   => $this->__get('fkPermissao'),
            'fkAgenda'   => $this->__get('fkAgenda'),
            'fkCarteiraImovel' => $this->__get('fkCarteiraImovel'),
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
     * Retorna os valores das propriedades da classe
     * 
     * @return string
     */
    public function __toString(){
        return var_dump($this->toArray());
    }
}