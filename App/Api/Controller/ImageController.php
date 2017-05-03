<?php
namespace Api\Controller;
use Api\Model\Entity\Imagem;
use Api\Controller\AuditController as Audit;
class ImageController{
    
    /**
     * Metodo que gerencia o armazenamento de imagens
     * 
     * @return Array Com as informações do resultado
     */
    public function cadastrar($img = [], $update = null){
        //extrai o array
            echo "estou aqui 6";
            var_dump($img);
            $link = $img['link'];
            unset($img['link']);
            foreach ($img as $key => $value) {
                $img = $value;
            }
            $img['link'] = $link;
        $destino = dirname(dirname(__FILE__)).'/upload/';
        if ($img != null || $img != ''){
            echo "estou aqui 7";
        
            //Verifica o Tamanho do arquivo
            if($img['size'] < 1000000){
                $name       = $img['name'];
                $extensao   = $img['type'];
                $extensao   = strtolower($extensao);
                $extensao   = explode("/", $extensao);
                //Verifica as extenções permitidas
                if(strstr('jpg;jpeg;gif;png' , $extensao[1])){
                    echo "estou aqui 8";
                    $newName    = uniqid(time()).".".$extensao[1];
                    $handle     = fopen($destino.$newName, 'x');
                    var_dump($destino);
                    if($handle){
                        echo "estou aqui 9";
                        $data       = explode(',',$img['data']);
                        fwrite($handle, base64_decode($data[1]));
                        fclose($handle);
                        // Salva no Banco de dados
                        $imagem = new Imagem();
                        echo "estou aqui 3";
                        if($update){
                            echo "estou aqui 1";
                            $imagem->id   = $img['id'];
                            $imagem->path = $destino;
                            $imagem->nome = $newName;
                            $imagem->updateAt = date('Y-m-d H:i:s');
                            $imagem->tipo = $img['tipo'];
                            $imagem->link = $img['link'];
                            $imagem->update();
                        }else{
                            echo "estou aqui 2";
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
   * Função que lista todas as imagens conforme os parametros.
   * 
   * @param String Tipo da Imagem Ex: BANNER, FOTO, 
   * @return Array associativo.
   */
  public function listaPorTipo($type){
      $img = new Imagem();
      return $img->select(
            array(
                'where' => array(
                    'AND' => array(
                        'tipo' =>   $type,
                        'status' => 'ATIVO'
                    )
                )
            )
      );
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
     return $img->select(array(
	 'where' => array(
             'id' => $id
            )
        )
     );
  }
  /**
   * Função  que inativa e deleta a foto
   * 
   * @param Integer $id
   * @return true or fale;
   */
  public function inativar($id){
    $img = new imagem();
    $origem = dirname(dirname(__FILE__)).'/upload/'.$img['nome'];
    $imagem = $img->select(array(
            'where' => array(
                'id' => $id
            )
        )
    );
    unlink($origem);
    $img->load($imagem);
    $img->status = 'INATIVO';
    $img->updateAt = date('Y-m-d H:i:s');
    $img->update();
    return true;
  } 
	
}