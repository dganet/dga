<?php
namespace Api\Model\Entity;

class CarteiraCliente extends \GORM\Model{
    public $idCarteiraCliente;
    public $idCliente;
    public $idUsuario;

    public function __construct(){

    }
    public function list($idUsuario, $idCliente = null){
        $collection = new \GORM\Collection\Collection();
        if ($idCliente == null){
            $return =  $this->makeSelect('idCliente')->where('idUsuario = '.$idUsuario)->execute(true);
             foreach ($return as $key => $value) {
                 $cliente = new Cliente();
                 $cliente->setPrimaryKey('idCliente');
                 $cliente = $cliente->makeSelect()->where('idCliente ='.$value['idCliente'])->and('statusCliente= "ATIVO"')->execute();
                 if ($cliente->exists(0)){
                   $cliente = $cliente->get(0);
                 }
                 $collection->add($cliente);
             }
             return $collection;
        }else{
            $this->makeSelect('idCliente')->where('idUsuario = '.$idUsuario)->and('idCliente = '.$idCliente)->execute();
        }
    }
    public function beforeSave(){

    }
}
