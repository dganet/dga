<?php
namespace Api\Controller;
use \Api\Model\Entity\Imovel, \Api\Model\Entity\Galeria, \Api\Model\Entity\Proprietario;
class ImovelController {

    /**
     * Lista todos os Imoveis 
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixedJson
     */
    public function list($request, $response, $args){
        $imovel = new Imovel();
        return $response->withJson($imovel->all());
    }
    /**
     * Função para listar os imoveis pelo ID
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixedJson
     */
    public function listById($request, $response, $args){
        $imovel = new Imovel();
        return $response->withJson($imovel->find($args['id']));
    }
    /**
     * Salva um imovel
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return void
     */
    public function save($request, $response, $args){
        $post = json_decode($request->getBody()); 
        $logado = Auth::_isLoggedIn($args['token']);
        if ($logado['flag']){
            //Gera o proprietário
            $proprietario = new Proprietario($post['proprietario']);
            unset($post['proprietario']);
            $galeria = Galeria($post['galeria']);
            unset($post['galeria']);
            $imovel = new Imovel($post);
            $imovel->fkGaleria = $galeria->save(true);
            $imovel->fkProprietario = $proprietario->save(true);
            $proprietario->save();
        }
    }

}