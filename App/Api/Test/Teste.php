<?php
namespace Api\Test;
use \Api\Model\Entity\Usuario;
use \Api\Model\Entity\CarteiraCliente;
use \Api\Controller\Cache;
class Teste{

    public function main($request, $response, $args){
       $cache = new Cache();
       return $cache->createFileLocation($args['token']);

    }
}