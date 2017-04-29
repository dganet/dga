<?php
namespace Api\Controller;
use \Api\Model\Entity\Bairro;
class BairroController{

  public function list($request, $response, $args){
    $bairro = new Bairro();
    return $response->withJson($bairro->all());
  }

  public function listById($request, $response, $args){
    $bairro = new bairro();
    return $response->withJson($bairro->find($args['id'])->toArray());
  }
  
  public function save($request, $response, $args){
    $post = json_decode($request->getBody(), true);
    return $response->withJson(var_dump($post));
  
  }
}