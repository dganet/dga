<?php
namespace Api\Test;
use \Api\Model\Entity\Usuario;
use \Api\Model\Entity\CarteiraCliente;
use \Api\Controller\Cache;
class Teste{

    public function main($request, $response, $args){
       echo "
       <form method='post' action='/App/usuario/login/forgot'>
        <input type='text' name='email'>
        <input type='submit'>
       </form>
       ";
       
    }
}