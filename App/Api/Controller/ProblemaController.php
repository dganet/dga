<?php
namespace Api\Controller;
use \Api\Model\Entity\Problema;
class ProblemaController{

  public function list($request, $response, $args){
    $problema = new Problema();
    return $response->withJson($problema->all());
  }
  
  public function save($request, $response, $args){
    $post = json_decode($request->getBody(), true);
    $problema = new Problema($post);
    return $response->withJson($problema->save());
  }
}