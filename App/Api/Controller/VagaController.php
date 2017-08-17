<?php
namespace Api\Controller;

class VagaController{

      public function getVagas(){
          $veiculo = \Api\Model\Entity\Veiculo::getInstance();
          $veiculo->makeSelect("id, numVagas")->where("status->'Ativo'");
      }  
}