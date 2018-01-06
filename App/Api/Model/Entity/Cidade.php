<?php
namespace Api\Model\Entity;

class Cidade extends \GORM\Model{
    public $idCidade;
    public $nome;
    public $estadoId;
    
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
            case 'estadoId':
                if ($this->recursive){ 
                    $estado =  Estado::getInstance();
                    $estado->recursive = true;
                    $estado->find('where idEstado='.$this->$attr);
                    return $estado->toArray();
                }else{
                    
                    
                    //return $this->$attr;  
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
}