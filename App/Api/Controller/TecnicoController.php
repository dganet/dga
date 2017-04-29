<?php
namespace Api\Controller;
use \Api\Model\Entity\Tecnico;
class TecnicoController{

  public function list($request, $response, $args){
    $tecnico = new Tecnico();
    return $response->withJson($tecnico->all());
  }
  
  public function save($request, $response, $args){
    $post = json_decode($request->getBody(), true);
    $tecnico = new Tecnico($post);
    return $response->withJson($tecnico->save());
  
  }
}