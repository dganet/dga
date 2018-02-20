<?php
namespace Api\Controller;
use \Api\Model\Entity\Galeria;
/**
 * Classe que gerencia toda e qualquer imagem da aplicação, é nela que e feita a separação de qual tipo de imagem
 * está sendo feito o upload
 */
class ImageController{
    /**
     * Tipo da imagem a ser carregada, EX:
     * II = IMAGEM IMOVEL
     * FC = FOTO CLIENTE
     *
     * @var MIXED
     */
    private $tipo;
    /**
     * Está variavel contem as informações da foto a ser carregada:
     * [name] => nome da imagem
     * [size] => tamanho em bites da imagem
     * [type] => tipo da imagem
     * [data] => a imagem convertida em base64
     *
     * @var mixed
     */
    private $img;

    public function main($request, $response, $args){
        //#######
        $data = json_decode($request->getBody(),true);
        $this->img = $data['foto'];
        $this->tipo = $data['tipo'];
        //#######
        //Verifica se tem alguma imagem
        if(is_null($data)){
            return $response->withJson([
              'flag' => false,
              'message' => 'Não há imagens para serem carregadas'
            ]);
        }else{
            //verifica qual é o tipo da imagem
            if ($this->tipo == 'II'){

            }
            //Foto do cliente
            if ($this->tipo == 'FC'){

            }

        }

    }
    /**
    * Retorna a galeria de um determinado imovel ID
    */
    public function getGaleria($request, $response, $args){
      $token = $args['token'];
      if(Auth::_isLoggedIn($token)){
        $user = Auth::_getTokenInfo($token);
        $galeria = new Galeria();
        return $response->withJson($galeria->list($user['conteudo']['idUsuario'], $args['idImovel'])->getALl());
      }else{
        return $response->withJson([
          'message' => 'Usuario não está logado',
          'flag'    => false
        ]);
      }
    }

    public function listId($request, $response, $args){
      $token = $args['token'];
      if(Auth::_isLoggedIn($token)){
        $user = Auth::_getTokenInfo($token);
        $galeria = new Galeria();
        return $response->withJson($galeria->getImageById($args['idImagem']));
      }
    }

}
