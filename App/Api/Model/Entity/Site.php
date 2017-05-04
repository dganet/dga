<?php
namespace Api\Model\Entity;

class Site extends \GORM\Model{
    private $id;
    private $banner1;
    private $banner2;
    private $banner3;
    private $createAt;
    private $updateAt;

    public function __construct($data = []){
        foreach ($data as $key => $value) {
            $this->__set($key, $value);
        }
        $this->class = $this;
    }

     public function __get($attr){
        return $this->$attr;   
    }
    public function __set($attr, $value){
        $this->$attr = $value;
    }
    
    public function toArray(){
        return array(
            'id'            => $this->__get('id'), 
            'banner1'       => $this->__get('banner1'),
            'banner2'       => $this->__get('banner2'),
            'banner3'       => $this->__get('banner3'),
            'createAt'      => $this->__get('createAt'),
            'updateAt'      => $this->__get('updateAt')
        );
        /*foreach ($array as $key => $value) {
			if($value == null){
				unset($temp[$key]);
			}
		}
		return $temp;*/
    }
}