<?php
namespace Api\Controller;
use \Api\Model\Entity\Servico;
class ServicoController{

  public function list($request, $response, $args){
    $servico = new Servico();
    return $response->withJson($servico->all());
  }
  
  public function save($request, $response, $args){
    $post = json_decode($request->getBody(), true);
    $servico = new Servico($post);
    return $response->withJson($servico->save());
  }
}