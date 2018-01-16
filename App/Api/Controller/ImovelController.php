<?php
namespace Api\Controller;
use \Api\Model\Entity\Imovel, \Api\Model\Entity\Galeria, \Api\Model\Entity\Proprietario;
class ImovelController {

    /**
     * Lista todos os Imoveis 
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixedJson
     */
    public function list($request, $response, $args){
        $imovel = new Imovel();
        return $response->withJson($imovel->all());
    }
    /**
     * Função para listar os imoveis pelo ID
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixedJson
     */
    public function listById($request, $response, $args){
        $imovel = new Imovel();
        return $response->withJson($imovel->find($args['id']));
    }
    /**
     * Salva um imovel
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return void
     */
    public function save($request, $response, $args){
        $post = json_decode($request->getBody(), true); 
        // Preparando as variaveis
        $p = $post[0]['infoProprietario'][0];
        $e = $post[1]['infoEndereco'][0];   
        $i = $post[2]['infoImovel'][0];

        $i['valorVendaImovel'] = $i['valorImovel'];
        unset($i['valorImovel']);
        $i['idadeConstrucaoImovel'] = $i['idadeImovel'];
        unset($i['idadeImovel']);
        $i['garagemCobertaImovel'] = $i['garagemDescobertaImovel'];
        unset($i['garagemDescobertaImovel']);
        
        
        $img = $post[3]['infoImagem'][0];
        
        //FIM
        $logado = Auth::_isLoggedIn($args['token']);
        $user = Auth::_getTokenInfo($args['token']);
        if ($logado){
            //Gera o proprietário
            $proprietario = Proprietario::getInstance();
            $proprietario->load($p);
            $galeria =  Galeria::getInstance();
            $galeria->nomeGaleria = 'Galeria Teste';
            $lastid = $galeria->save(true);
            $imovel = Imovel::getInstance();
            $imovel->load($i);
            $imovel->fkGaleria = $lastid['lastId'];
            $lastid = $proprietario->save(true);
            $imovel->fkCarteiraImovel = $user['conteudo']['fkCarteiraImovel'];
            $imovel->fkProprietario = $lastid['lastId'];
            $r = $imovel->save();
            if ($r){
                return $response->withJson([
                    'flag' => true,
                    'message' => 'Imovel salvo com sucesso!'
                ]);
            }else{
                return $response->withJson([
                    'flag' => false,
                    'message' => 'Não foi possivel salvar o imovel'
                ]);
            }

        }else{
            return $response->withJson([
                'flag' => false,
                'message' => 'Não há uma sessão valida aberta, ou a sessão atual expirou'
            ]);
        }
    }

}