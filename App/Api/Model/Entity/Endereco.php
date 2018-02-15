<?php
namespace Api\Model\Entity;

class Endereco extends \GORM\Model{
    public $enderecoId;
    public $paisId;
    public $cidadeId;
    public $estadoId;
    public $bairroId;
    public $logradouro;

    
    
    public function beforeSave(){

    }
    public function beforeUpdate(){
        
    }
}