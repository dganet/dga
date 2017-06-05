<?php
namespace Api\Test;
use \Api\Model\Entity\Usuario;
use \Api\Model\Entity\CarteiraCliente;
use \Api\Controller\Cache;
class Teste{

    public function main($request, $response, $args){
       \PagSeguro\Configuration\Configure::setEnvironment('sandbox');//production or sandbox
        \PagSeguro\Configuration\Configure::setAccountCredentials(
            'guilhermebritto.prof@gmail.com',
            'AEE8BFA8DC1C49AEBE62C9DDAA0B8787'
        );
        \PagSeguro\Configuration\Configure::setCharset('UTF-8');// UTF-8 or ISO-8859-1
        \PagSeguro\Configuration\Configure::setLog(true, '../tmp/PagSeguro.log');
        $resultCode;
        try {
        /**
         * @todo For use with application credentials use:
         * \PagSeguro\Configuration\Configure::getApplicationCredentials()
         *  ->setAuthorizationCode("FD3AF1B214EC40F0B0A6745D041BFDDD")
         */
        $sessionCode = \PagSeguro\Services\Session::create(
            \PagSeguro\Configuration\Configure::getAccountCredentials()
        );
            echo "<strong>ID de sess&atilde;o criado: </strong>{$sessionCode->getResult()}";
            $resultCode = $sessionCode->getResult();
        } catch (Exception $e) {
            die($e->getMessage());
        }
        echo '<script type="text/javascript" src=
        "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
        PagSeguroDirectPayment.setSessionId('.$resultCode.');
        console.log(PagSeguroDirectPayment.getSenderHash());
        </script>';
    }
}