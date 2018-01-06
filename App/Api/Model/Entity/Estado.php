<?php
namespace Api\Model\Entity;

class Estado extends \GORM\Model{
    public $idEstado;
    public $nome;
    public $uf;
    public $paisId;
    
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
            case 'paisId':
                if ($this->recursive){ 
                    $pais = Pais::getInstance();
                    $pais->makeSelect()->where('idPais='.$this->$attr);
                    return $pais->toArray();
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
   
}