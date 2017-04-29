<?php
namespace Api\Controller;
use \Api\Model\Entity\Ordem;
class OrdemController{

  public function list($request, $response, $args){
    $os = new Ordem();
    return $response->withJson($os->select("where statusOrdem='PENDENTE'"));
  }
  public function save($request, $response, $args){
    $post = json_decode($request->getBody(), true);
    $os = new Ordem($post);
    $os->statusOrdem = "PENDENTE";
    $os->dataAbertura = date("Y-m-d H:i:s", $os->dataAbertura);
    $os->dataRecebimento = date("Y-m-d H:i:s", $os->dataRecebimento);
    $os->dataRealizacao = date("Y-m-d H:i:s", $os->dataRealizado);
    return $response->withJson($os->save());
  }
}
