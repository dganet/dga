<?php
namespace Api\Controller;
use \Api\Model\Entity\Usuario;
class UsuarioController {
    
    public function list($request,$response,$args){
        $usuario = new Usuario();
        $usuario = $usuario->all();
        $response->withJson($usuario->toArray());
    }
    public function save($request, $response, $args){
        //$post = json_decode($request->getBody());
        $post  = array(        
            'emailUsuario'  => 'guilhermebritto.prof@gmail.com',          
            'senhaUsuario'  => '102030',          
            'nomeUsuario'   => 'Guilherme',           
            'sobrenomeUsuario'  => 'Brito',          
            'creciUsuario'  => '123456',          
            'createAtUsuario'   => date("Y-m-d H:i:s"),                      
            'statusUsuario' => 'ATIVO',         
            'fkPermissao'   =>   1       
        );
        $usuario = new Usuario($post);
        $usuario = $usuario->find(1);
        
    }
}