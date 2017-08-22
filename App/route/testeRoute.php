<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/test',function(Request $request, Response $response){
    
    return $response->WithJson($veiculo->getvagas());
});

$app->get('/img',function(Request $request, Response $response){
   echo "<img src='/gadeveloper/App/Api/upload/148985243658cd5814787e9.jpg'>";
});

$app->post('/upload', function(Request $request, Response $response){
  var_dump($_FILES);
});

