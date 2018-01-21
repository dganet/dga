<?php
namespace Api\Model\Entity;

class CarteiraImovel extends \GORM\Model{
    public $idCarteiraImovel;
    public $idImovel;
    public $idUsuario;


     public function list($idUsuario, $idImovel = null){
        $collection = new \GORM\Collection\Collection();
        if ($idCliente == null){
            $return =  $this->makeSelect('idImovel')->where('idUsuario = '.$idUsuario)->execute(true);
             foreach ($return as $key => $value) {
                 $imovel = new Imovel();
                 $imovel->setPrimaryKey('idImovel');
                 $imovel = $imovel->makeSelect()->where('idImovel ='.$value['idImovel'])->and('statusImovel="ATIVO"')->execute()->get(0);
                 $collection->add($imovel);
             }
             return $collection;
        }else{
            $this->makeSelect('idImovel')->where('idUsuario = '.$idUsuario)->and('idImovel = '.$idCliente)->execute();
        }
    }

   public function beforeSave(){

   }
}
