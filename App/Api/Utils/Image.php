<?php
namespace Api\Utils;
class Image{
    
   /**
    * Metodo para upload de imagens,  imagem deve estar em base64 para que a classe funcione
    * 
    * @param array $img
    * @return Array
    */ 
  public static function _upload($img = []){

        $destino = dirname(dirname(__FILE__)).'/upload/';
        if ($img != null || $img != ''){
        
            //Verifica o Tamanho do arquivo
            if($img['size'] < 1000000){
                $name       = $img['name'];
                $extensao   = $img['type'];
                $extensao   = strtolower($extensao);
                $extensao   = explode("/", $extensao);
                //Verifica as extenções permitidas
                if(strstr('jpg;jpeg;gif;png' , $extensao[1])){
        
                    $newName    = uniqid(time()).".".$extensao[1];
                    $handle     = fopen($destino.$newName, 'x');
                    if($handle){

                        $data       = explode(',',$img['data']);
                        fwrite($handle, base64_decode($data[1]));
                        fclose($handle);
                    // Com as informações
                      return array(
                            flag    => true,
                            message => "Imagem carregada com sucesso",
                            path    => $destino,
                            name    => $newName
                        );
                    }else{
                        return array(
                            flag    => false,
                            message => "Imagem não pode ser salva. Aparentemente é um problema de escrita"
                        );
                    }
            }else{
                return array(
                    flag    => false,
                    message => "Extensão não permitida. Somente as seguintes extensões são permitidas: JPG, JPEG, GIF, PNG"
                );
            }
        }else{
            return array(
                flag    => false,
                message => "Tamanho do arquivo exede o permitido"
            );
        }
    }
  }

  public function main(){
      $destino = dirname(dirname(dirname(__FILE__))).'/upload/';
      echo $destino;
  }
  
}