<?php
namespace Api\Test;
use \Api\Model\Entity\Usuario;
use \Api\Model\Entity\CarteiraCliente;
use \Api\Controller\Cache;
class Teste{

    /**
     * O que eu espero receber 
     * ['field'] => referente aos campos que desejo procurar na tabela se não houver ele entende que voce quer todos,
     * ['table'] => nome da tabela a ser buscada (Obrigatorio)
     * ['conditions'] => WHERE, INNER JOIN, LEFT JOIN
     * ['values'] => valores correspondentes aos conditions
     * 
     * @param [type] $request
     * @param [type] $response
     * @param [type] $args
     * @return void
     */
    public function main($request, $response, $args){
       $sql = 'SELECT * FROM ';
       $post['table'] = 'usuario';
       $post['conditions'] = 'WHERE';
       $post['operator'] = 'AND';
       $post['values'] = 'nomeUsuario=Guilherme';
       //$post = json_decode($request->getBody(), true);
       if (isset($post['field'])){
           $sql .= '('.$post['field'].')';
       }
       $sql .= $post['table'];
       $sql .= ' '.$post['conditions'];
       $sql .= ' '.$post['values'];

       echo $sql;

       //echo str_replace('*', 'teste', $sql);
       
       
    }
}