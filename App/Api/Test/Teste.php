<?php
namespace Api\Test;
use \Api\Model\Entity\Usuario;
use \Api\Model\Entity\CarteiraCliente;
use \Api\Controller\Cache;
use \Api\Controller\Auth;
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
        
       /*echo "
        <form method='post' action='/App/proprietario/cpf/$token'>
            <input type='text' name='cpfProprietario'>
            <input type='submit'>
        </form>
       ";*/
    }
}