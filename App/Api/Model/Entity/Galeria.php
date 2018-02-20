<?php
namespace Api\Model\Entity;

class Galeria extends \GORM\Model{
    public $idGaleria;
    public $idImovel;
    public $idImagem;

    /**
    * Retorna todas as imagem de uma determinada galeria
    */
    public function list($idUsuario, $idImovel = null){
        $collection = new \GORM\Collection\Collection();
        $return =  $this->makeSelect('idImagem')->where('idImovel = '.$idImovel)->execute(true);
         foreach ($return as $key => $value) {
           $imagem = new Imagem();
           $imagem->setPrimaryKey('idImagem');
           $imagem = $imagem->makeSelect()->where('idImagem ='.$value['idImagem'])->execute()->get(0);
           $collection->add($imagem);
         }
         return $collection;
    }
    /**
    * Retorna uma imagem pelo id
    */
    public function getImageById($idImagem){
      $imagem = new Imagem();
      return $imagem->makeSelect()->where('idImagem='.$idImagem)->execute(true);
    }

   public function beforeSave(){

   }


}
