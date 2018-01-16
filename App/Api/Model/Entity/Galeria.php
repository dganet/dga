<?php
namespace Api\Model\Entity;

class Galeria extends \GORM\Model{
    public $idGaleria;
    public $nomeGaleria;

    public function __get($attr){
        switch ($attr) {
            case 'Imagens':
                $img = new Imagem();
                $img = $img->select('where fkGaleria='.$this->idGaleria);
                return $img;
                break;
            default:
                return $this->$attr;
                break;
        }
    }
     public function beforeDelete(){
    }
    public function afterDelete(){
    }
    /**
     * É executado antes de salvar uma informação no banco de dados e pode
     * ser sobrescrito quando necessário
     *
     * @return void
     */
    public function beforeSave(){
       
    }
    /**
     * É executado depois de salvar uma informação no banco de dados e pode
     * ser sobrescrito quando necessário
     *
     * @return void
     */
    public function afterSave(){

    }
    /**
     * Executa antes de ser atualizado
     *
     * @return void
     */
    public function beforeUpdate(){
       
    }
    /**
     * Executa depois de ser atualizado
     *
     * @return void
     */
    public function afterUpdate(){
    }
}