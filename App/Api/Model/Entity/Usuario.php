<?php
namespace Api\Model\Entity;

class Usuario extends \GORM\Model{
    private $idUsuario;
    private $emailUsuario;
    private $senhaUsuario;
    private $nomeUsuario;
    private $sobrenomeUsuario;
    private $creciUsuario;
    private $createAtUsuario;
    private $updateAtUsuario;
    private $statusUsuario;
    private $fkPermissao;
    private $fkAgenda;
    /**
     * Construtor
     * 
     * @param Array $data
     */
    public function __construct(Array $data = []){
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
            case 'Permissao':
                $idPermissao    = (int) $this->fkPermissao;
                $permissao      = new Permissao();
                $permissao      = $permissao->find($idPermissao);
                return $permissao;
                break;
            case 'Agenda':
                $idAgenda       = (int) $this->fkAgenda;
                $agenda         = new Agenda();
                $agenda         = $agenda->find($idAgenda);
                return $agenda->toString(); 
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
            'emailUsuario'  => $this->__get('emailUsuario'),          
            'senhaUsuario'  => $this->__get('senhaUsuario'),          
            'nomeUsuario'   => $this->__get('nomeUsuario'),           
            'sobrenomeUsuario'  => $this->__get('sobrenomeUsuario'),          
            'creciUsuario'  => $this->__get('creciUsuario'),          
            'createAtUsuario'   => $this->__get('createAtUsuario'),           
            'updateAtUsuario'   => $this->__get('updateAtUsuario'),           
            'statusUsuario' => $this->__get('statusUsuario'),         
            'fkPermissao'   => $this->__get('fkPermissao'),
            'fkAgenda'   => $this->__get('fkAgenda')         
        );
        foreach ($temp as $key => $value) {
            if($value == null){
                unset($temp[$key]);
            }
        }
        return $temp;
    }
}