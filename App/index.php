<?php
require 'vendor/autoload.php';

//instancie o objeto
$app = new \Slim\Slim();

//defina a rota
get('/', function () { 
  echo "Hello, World!"; 
}); 
//rode a aplicação Slim 
$app->run();