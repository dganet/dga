<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/test',function(Request $request, Response $response){
    echo "
        <table >
        <form action='img' method='post' enctype='multipart/form-data'>
            <input type='file' name='arquivos'  accept='image/png, image/jpeg'  multiple />
            <input type='submit' value='enviar'>
            </form>
        </table>
    ";
});

$app->post('/img',function(Request $request, Response $response){
    echo \Api\Controller\ImageController::save();
    echo "<img src='uploads/teste.jpeg' alt='UPLOAD' height='170' width='180'>";


});

