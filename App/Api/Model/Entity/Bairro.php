<?php
namespace Api\Model\Entity;

class Bairro extends \GORM\Model{
    public $idBairro;
    public $nome;
    public $cidadeId;
    
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
            case 'cidadeId':
                if ($this->recursive){ 
                    $cidade = Cidade::getInstance();
                    $cidade->recursive=true;
                    $cidade->find('where idCidade='.$this->$attr);
                    return $cidade->toArray();
                }else{
                    return $this->$attr;
                }
                break;
            default:
                return $this->$attr;        
                break;
        }
    }
    
    /**
     * Retorna as propriedades da classe
     * 
     * @return string
     */
    public function __toString(){
        return var_dump($this->toArray());
    }
    public function beforeSave(){

    }
    public function beforeUpdate(){
        
    }
    
}