<?php
namespace Api\Controller;
use Api\Model\Entity\Imagem;
use Api\Controller\AuditController as Audit;
class ImageController{
    
    /**
     * Metodo que gerencia o armazenamento de imagens
     * 
     * @param Array $img
     * @param Boolean $update 
     * @return Array Com as informações do resultado
     */
    public function cadastrar($img = [], $update = null){
        //extrai o array

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
                        // Salva no Banco de dados
                        $imagem = new Imagem();
            
                        if($update){
                
                            $imagem->id   = $img['id'];
                            $imagem->path = $destino;
                            $imagem->nome = $newName;
                            $imagem->updateAt = date('Y-m-d H:i:s');
                            $imagem->tipo = $img['tipo'];
                            $imagem->link = $img['link'];
                            $imagem->update();
                        }else{
                
                            $imagem->path = $destino;
                            $imagem->nome = $newName;
                            $imagem->tipo = $img['tipo'];
                            $imagem->createAt = date('Y-m-d H:i:s');
                            $imagem->status = 'ATIVO';
                            $imagem->link = $img['link'];
                            $id = $imagem->save(true); //return  Last Id Isert
                        }
                     // Com as informações
                      return array(
                            flag    => true,
                            id      => $id,
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
    }
  }
  /**
   * Função que faz somenteo o upload da imagem 
   *
   * @param Array $img
   * @param Boolean $update
   * @return OBJ de Image
   */
  public function upload($img = [], $update = null){
        //extrai o array
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
                    /**
                     * Cria e carrega as informações do objeto para retornar o mesmo
                     */
                    $image = Imagem::getInstance();
                    $image->nome = $newName;
                    $image->path = $destino;
                    $image->status = 'ATIVO';
                    $image->createAt = date('Y-m-d H:i:s');
                     // Com as informações
                      return array(
                            'flag'    => true,
                            'message' => "Imagem salva com sucesso",
                            'obj'     => $image
                        );
                    }else{
                    return array(
                        'flag'    => false,
                        'message' => "Imagem não pode ser salva. Aparentemente é um problema de escrita"
                    );
                }
            }else{
                return array(
                    'flag'    => false,
                    'message' => "Extensão não permitida. Somente as seguintes extensões são permitidas: JPG, JPEG, GIF, PNG"
                );
            }
        }else{
            return array(
                'flag'    => false,
                'message' => "Tamanho do arquivo exede o permitido"
            );
        }
    }
  }
  /**
   * Função que lista todas as imagens conforme os parametros.
   * 
   * @param String Tipo da Imagem Ex: BANNER, FOTO, 
   * @return Array associativo.
   */
  public function listaPorTipo($type){
      $img = new Imagem();
      $img = $img->select(
            array(
                'where' => array(
                    'AND' => array(
                        'tipo' =>   $type,
                        'status' => 'ATIVO'
                    )
                )
            )
      );
      $img = $img[0];
      unset($img[0]);
      return $img;
  }
  public function listaTudo(){
      $img = new Imagem();
      return $img->select(
          array(
            'where' => array(
                'status' => 'ATIVO'
            )
          )
     );
  }

  /**
   * Função para listar todas as imagens conforme os parametros.
   * 
   * @param Int Id da imagem a ser mostrada
   * @return Array associativo
   */
  public function listaPorId($id){
     $img = new Imagem();
     $img = $img->select(array(
	 'where' => array(
             'id' => $id
            )
        )
     );
    $img = $img[0];
    unset($img[0]);
    return $img;
  }
  /**
   * Função  que inativa e deleta a foto
   * 
   * @param Integer $id
   * @return true or fale;
   */
  public function inativar($id){
    $img = new imagem();
    $img = $img->load((int)$id);
    $origem = dirname(dirname(__FILE__)).'/upload/'.$img['nome'];
    $imagem = $this->listaPorID($img['id']);
    unlink($origem);
    $img->load($imagem);
    $img->status = 'INATIVO';
    $img->updateAt = date('Y-m-d H:i:s');
    $img->update();
    return true;
  }

  public function updatePicture($img){
    $image = new Imagem($img);
    
  } 
	
}