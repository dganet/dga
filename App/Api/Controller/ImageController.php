<?php
namespace Api\Controller;
class ImageController{
    
    /**
     * Metodo que gerencia o armazenamento de imagens
     * 
     * @return Array Com as informações do resultado
     */
    public static function save(){
        $destino = dirname(dirname(__FILE__)).'/upload/';
        if($_FILES['arquivo']['name'] != '' && $$_FILES['arquivo']['nome']==0){
            if($_FILES['arquivo']['size'] < 1000000){   // checa se o arquivo tem mais de 1MB
                $arquivo_tmp = $_FILES['arquivo']['tmp_name'];
                $nome = $_FILES['arquivo']['name'];
                $extensao = pathinfo($nome, PATHINFO_EXTENSION); // retorna a extensão do arquivo
                $extensao = strtolower($extensao);
                if(strstr('.jpg;.jpeg;.gif;.png', $extensao)){
                    $newName = uniqid(time()).".".$extensao;
                    $destino .=$newName;
                    if(@move_uploaded_file($arquivo_tmp, $destino)){
                        return array(
                            flag    => true,
                            message => "Imagem salva com sucesso",
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
        }else{
            return array(
                flag    => false,
                message => "Nenhum arquivo foi enviado!"
            );
        }
    }   
}