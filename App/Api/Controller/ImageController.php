<?php
namespace Api\Controller;
use \Api\lib\WideImage;
class ImageController{
    
    public static function save(){
        $upload = dirname(__FILE__).'/upload/';
        var_dump($_FILES);
        echo "<br>";
        $img = WideImage::load($_FILES['arquivos']['tmp_name']);
        $img = $img->resize(170, 180, 'outside');
        $img = $img->crop('center', 'center', 170, 180);
        $img->saveToFile($upload."teste.jpeg");
        
        
    }


}