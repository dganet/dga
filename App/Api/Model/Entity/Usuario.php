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
    
    public function beforeUpdate(){
        $this->senhaUsuario = md5($this->senhaUsuario);
        $this->updateAtUsuario = date('Y-m-d H:i:s');
    }   
}