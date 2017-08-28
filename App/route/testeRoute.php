<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/test',function(Request $request, Response $response){
    $teste = \Api\Model\Entity\Vaga::getInstance();
    $teste->fkAssociado = 1;
    $teste->makeDelete();
    return $response->WithJson(ervar_dump($teste));
});

$app->get('/img',function(Request $request, Response $response){
   echo "<img src='/gadeveloper/App/Api/upload/148985243658cd5814787e9.jpg'>";
});

$app->post('/upload', function(Request $request, Response $response){
  var_dump($_FILES);
});

