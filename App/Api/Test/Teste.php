<?php
namespace Api\Test;
use \Api\Model\Entity\Usuario;
use \Api\Model\Entity\CarteiraCliente;
class Teste{

    public function main(){
        $carteira = new CarteiraCliente([
            'nomeCarteiraCliente' => 'carteira Teste'
        ]);
        $fk = $carteira->save(true);
        $usuario = new Usuario([
            'emailUsuario' => 'guilherme@imobiliar.net.br',
            'senhaUsuario' => md5('guilbritto'),
            'nomeUsuario' => 'Guilherme',
            'SobrenomeUsuario' => 'Brito',
            'telFixoUsuario' => null,
            'telCelularUsuario' => 13997351924,
            'telComercialUsuario' => null,
            'statusUsuario'         => 'ATIVO',
            'fkPermissao'       => 1,
            'fkCarteiraCliente' => $fk,

        ]);
        return $usuario->save();

    }
}