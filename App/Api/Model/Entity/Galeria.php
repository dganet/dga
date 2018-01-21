<?php
namespace Api\Model\Entity;

class Galeria extends \GORM\Model{
    public $idGaleria;
    public $idImovel;
    public $idImagem;

    public function list($idUsuario, $idImovel = null){
        $collection = new \GORM\Collection\Collection();
        if ($idCliente == null){
            $return =  $this->makeSelect('idImovel')->where('idUsuario = '.$idUsuario)->execute(true);
             foreach ($return as $key => $value) {
                 $imagem = new Imagem();
                 $imagem->setPrimaryKey('idImagem');
                 $imagem = $imagem->makeSelect()->where('idImagem ='.$value['idImagem'])->execute()->get(0);
                 $collection->add($imagem);
             }
             return $collection;
        }else{
            $this->makeSelect('idImovel')->where('idUsuario = '.$idUsuario)->and('idImovel = '.$idCliente)->execute();
        }
    }

   public function beforeSave(){

   }

   
}