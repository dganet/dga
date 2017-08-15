<?php
namespace Api\Controller;
use Api\Model\Entity\Imagem;
class ImageController{ 
  /**
   * Remove/apaga/deleta uma imagem 
   *
   * @param String $name
   * @return Boolean
   */
  public function delete($name){
    $origem = dirname(dirname(__FILE__)).'/upload/'.$name;
    return unlink($origem);
  }
  /**
   * Função que faz somenteo o upload da imagem 
   *
   * @param Array $img
   * @param Boolean $update
   * @return OBJ de Image
   */
  public function upload($img = [], $update = null){
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
                        $image->tipo  = $img['tipo'];
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
     *  FUNÇÔES HTTP
    */
    /**
     * Salva uma nova imagem
     *
     * @param [type] $request
     * @param [type] $response
     * @param [type] $args
     * @return void
     */
    public function cadastrar($request, $response, $args){
        $data = json_decode($request->getBody(),true);
        $this->upload($data);
        $img = Imagem::getInstance();
        return $response->WithJson($img->save());
    }
    public function update($request, $response, $args){
        
    }
  /**
   * Função que lista todas as imagens conforme os parametros.
   * 
   * @param String Tipo da Imagem Ex: BANNER, FOTO, 
   * @return Array associativo.
   */
  public function listaPorTipo($request, $response, $args){
    $img = Imagem::getInstance();
    $img->makeSelect()->where("tipo")->like($args['tipo']);
    $collection = $img->execute();
    if ($collection->length() > 0 ){
        return $response->WithJson($collection->getAll());
    }
  }
  /**
   * Lista todas as imagens
   *
   * @return void
   */
  public function listaTudo($request, $response, $args){
    $img = Imagem::getInstance();
    $img->makeSelect()->where("status='ATIVO'");
    $collection = $img->execute();
    if ($collection->length() > 0 ){
        return $response->WithJson($collection->getAll());
    }
  }
  /**
   * Função para listar todas as imagens conforme os parametros.
   * 
   * @param Int Id da imagem a ser mostrada
   * @return Array associativo
   */
  public function listaPorId($request, $response, $args){
    $img = Imagem::getInstance();
    $img->makeSelect()->where("id=".$args['id'])->and("status='ATIVO'");
    $collection = $img->execute();
    if ($collection->length() > 0 ){
        return $response->WithJson($collection->getAll());
    }
  }
  /**
   * Função  que inativa e deleta a foto
   * 
   * @param Integer $id
   * @return true or fale;
   */
  public function inativar($request, $response, $args){
    $img = imagem::getInstance();
    $img->find($args['id']);
    $this->delete($img->nome);
    $img->status = 'INATIVO';
    return $response->WithJson($img->update());
  }
	
}