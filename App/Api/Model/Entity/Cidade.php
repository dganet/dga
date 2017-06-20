<?php
namespace Api\Model\Entity;

class Cidade extends \GORM\Model{
    private $id;
    private $nome;
    private $estado;
    /**
     * Construtor
     * 
     * @param Array $data
     */
    public function __construct($data = []){
        $this->load($data);
        $this->class = $this;
    }
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
            case 'estado':
                if ($this->recursive){ 
                    $estado =  Estado::getInstance();
                    $estado->recursive = true;
                    $estado->find('where id='.$this->$attr);
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
     * Converte o Objeto para um array
     * 
     * @return void
     */
    public function toArray(): Array {
        $temp = array(
           'id' => $this->__get('id'),
           'nome' => $this->__get('nome'),
           'estado' => $this->__get('estado')
        );
        foreach ($temp as $key => $value) {
            if($value == null){
                unset($temp[$key]);
            }
        }
        return $temp;
    }
    public function load($data){
        foreach ($data as $key => $value) {
            $this->__set($key,$value);
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