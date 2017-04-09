<?php
namespace Api\Controller;
use \Api\Model\Entity\Usuario,\Api\Model\Entity\Agenda;
class UsuarioController {
    /**
     * Lista todos os Usuarios
     * 
     * @param Request $request
     * @param Response $response
     * @param Array $args
     * @return mixedJson
     */
    public function list($request,$response,$args){
        $usuario = new Usuario();
        return $response->withJson($usuario->all());
    }
    /**
     * Salva um Usuario e cria sua agenda de telefones
     * 
     * @param Request $request
     * @param Response $response
     * @param Array $args
     * @return Boolean
     */
    public function save($request, $response, $args){
        $post = json_decode($request->getBody());
        /*$usuario = new Usuario($post);
        $agenda  = new Agenda();
        $agenda->nomeAgenda = "Agenda ".$usuario->nomeUsuario." ".$usuario->sobrenomeUsuario;
        $usuario->fkAgenda = $agenda->save(true); 
        $usuario->save();
    }
}