<?php
include('src/Model.php');
class Animals extends \GORM\Model{
    private $idAnimals;
    private $name;
    private $idDono;
    
    public function __construct($data = []){
        foreach ($data as $key => $value) {
            $this->__set($key, $value);
        }
        $this->class = $this;
    }

    public function __set($attr,$value){
       $this->$attr = $value;
    }
    public function __get($attr){
        return $this->$attr;
    }
    public function toArray(){
        return array(
            'idAnimals'   => $this->__get('idAnimals'),
            'name' => $this->__get('name')
        );
    }

    }
    

class Dono extends \GORM\Model{
    private $idDono;
    private $name;

   
    public function __construct($data = []){
        foreach ($data as $key => $value) {
            $this->__set($key, $value);
        }
        $this->class = $this;
    }

    public function __set($attr,$value){
       switch ($attr) {
           //FK animal
           case '':
               break;
           
           default:
                $this->$attr = $value;
               break;
       }
    }
    public function __get($attr){
        return $this->$attr;
    }
    public function toArray(){
        return array(
            'idDono'   => $this->__get('idDono'),
            'name' => $this->__get('name')
        );
    }
    
}
$animal = new Animals();
$animal->name = 'Pheabe';
$animal->idAnimals = 19;
$animal->_setPrimaryKey('idAnimal');
$animals = $animal->all();
echo "<br>Animals: ";
echo var_dump($animals);
$dono = new Dono();
$dono = $dono->all();
echo "<br>DONO: ";
echo var_dump($dono);
echo "<br>PK Animal: ";
echo $animal->_getPrimaryKey();


