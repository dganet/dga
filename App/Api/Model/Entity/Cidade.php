<?php
namespace Api\Model\Entity;

class Cidade extends \GORM\Model{
    private $idCidade;
    private $nome;
    private $estadoId;
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
     * Converte o Objeto para um array
     * 
     * @return void
     */
    public function toArray(): Array {
        $temp = array(
           'idCidade' => $this->__get('idCidade'),
           'nome' => $this->__get('nome'),
           'estadoId' => $this->__get('estadoId')
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