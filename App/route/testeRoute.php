<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/test',function(Request $request, Response $response){
    echo "
        <table >
        <form action='upload' method='post' enctype='multipart/form-data'>
            <input type='file' name='arquivo'  accept='image/png, image/jpeg'>
            <input type='text' name='texto'>
            <input type='submit' value='enviar'>
            </form>
        </table>
    ";
});

$app->get('/img',function(Request $request, Response $response){
   echo "<img src='/gadeveloper/App/Api/upload/148985243658cd5814787e9.jpg'>";
});

$app->post('/upload', function(Request $request, Response $response){
  var_dump($_FILES);
});

