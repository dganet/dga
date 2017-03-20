<?php
namespace Api\Controller;
use Api\Model\Entity\Imagem;
class ImageController{
    
    /**
     * Metodo que gerencia o armazenamento de imagens
     * 
     * @return Array Com as informações do resultado
     */
    public function cadastrar($img = [], $type = null){
        //extrai o array
        foreach ($img as $key => $value) {
            $img = $value;
        }

        $destino = dirname(dirname(__FILE__)).'/upload/';
        if ($img != null || $img != ''){
            if($img['size'] < 1000000){
                $name       = $img['name'];
                $extensao   = $img['type'];
                $extensao   = strtolower($extensao);
                $extensao   = explode("/", $extensao);
                if(strstr('jpg;jpeg;gif;png' , $extensao[1])){
                    $newName    = uniqid(time()).".".$extensao[1];
                    $handle     = fopen($destino.$newName, 'x');
                    if($handle){
                    $data       = explode(',',$img['data']);
                    fwrite($handle, base64_decode($data[1]));
                    fclose($handle);
                    // Salva no Banco de dados
                     $imagem = new Imagem();
                     $imagem->path = $destino;
                     $imagem->nome = $newName;
                     $imagem->tipo = $type;
                     $imagem->status = 'ATIVO';
                     $id = $imagem->save(true); //return  Last Id Isert
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

  public function atulizaCadastro($data){
		$img = new Imagem($data);
		$img->createAt =date('Y-m-d H:i:s');
		Audit::audit($data, "UPDATE", "img");
		return $img->update();
	}
	
}