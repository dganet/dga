<?php
namespace Api\Model\Entity;
class CarteiraImovel extends \GORM\Model{
    public $idCarteiraImovel;
    public $idImovel;
    public $idUsuario;

    /**
     * Retorna todos os imoveis de um usuario
     * 
     * @param $idUsuario String -  Id do usuario que é dono do imovel
     * @param $op String - Opções de campos a serem retornados
     */
    public function getImovel($idUsuario, $field){
        $collectionId = $this->makeSelect()->where('idUsuario='.$idUsuario)->execute();
        $collection = new \GORM\Collection\Collection();
        foreach ($collectionId as $key => $value) {
            $imovel = Imovel::getInstance();
            $imovel = $imovel->makeSelect($field)->where('idImovel='.$value->idImovel)->execute();
            $collection->add($imovel->getAll()[0]);
        }
        return $collection;
    }

   public function beforeSave(){

   }
}
