<?php
namespace Api\Controller;
use \Api\Model\Entity\Usuario,\Api\Model\Entity\Agenda;
class UsuarioController {
    
    public function list($request,$response,$args){
        $usuario = new Usuario();
        $usuario = $usuario->all();
        $response->withJson($usuario->toArray());
    }
    public function save($request, $response, $args){
        //$post = json_decode($request->getBody());
        $post  = array(        
            'emailUsuario'  => '123@456.789.0',          
            'senhaUsuario'  => '102030',          
            'nomeUsuario'   => 'Chuck',           
            'sobrenomeUsuario'  => 'Norris',          
            'creciUsuario'  => '66666666',          
            'createAtUsuario'   => date("Y-m-d H:i:s"),                      
            'statusUsuario' => 'ATIVO',         
            'fkPermissao'   =>   1,
        );
        /*$usuario = new Usuario($post);
        $agenda  = new Agenda();
        $agenda->nomeAgenda = "Agenda ".$usuario->nomeUsuario." ".$usuario->sobrenomeUsuario;
        $usuario->fkAgenda = $agenda->save(true); 
        $usuario->save();*/
        $usuario = new Usuario();
        $usuario = $usuario->find(2);
        echo $usuario->Agenda->Telefone;
    }
}