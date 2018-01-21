<?php
namespace Api\Controller;
use \Api\Model\Entity\Imovel, \Api\Model\Entity\Galeria, \Api\Model\Entity\Proprietario;
use \Api\Utils\Image, \Api\Model\Entity\CarteiraImovel;
class ImovelController {

    public $fkCarteiraImovel;
    public function __construct(){
        $this->carteiraImovel = CarteiraImovel::getInstance();
    }
    /**
     * Lista todos os Imoveis 
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return MixedJson
     */
    public function list($request, $response, $args){
        $user = Auth::_getTokenInfo($args['token']);
        $collection = $this->carteiraImovel->list($user['conteudo']['idUsuario']);
        return $response->withJson($collection->getAll());
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
        $img = $post[3]['infoImagem'];
        $i['valorVendaImovel'] = $i['valorImovel'];
        unset($i['valorImovel']);
        $i['idadeConstrucaoImovel'] = $i['idadeImovel'];
        unset($i['idadeImovel']);
        $i['garagemCobertaImovel'] = $i['garagemDescobertaImovel'];
        unset($i['garagemDescobertaImovel']);
        $p['telComercialProprietario'] = $p['telefoneProprietario'];
        unset($p['telefoneProprietario']);
        // //FIM
        $logado = Auth::_isLoggedIn($args['token']);
        $user = Auth::_getTokenInfo($args['token']);
        if ($logado){
            //Gera o proprietário
            $proprietario = Proprietario::getInstance();
            $galeria =  Galeria::getInstance();
            $carteiraImovel = CarteiraImovel::getInstance();
            $imovel = Imovel::getInstance();
            $imagem = \Api\Model\Entity\Imagem::getInstance();
            $proprietario->load($p);
            /**
             * Caso o proprietário já exista ele somente pega o id do mesmo
             * Caso não exista ele salva e pega o id
            */
            if($proprietario->idProprietario != NULL ){
                $propId = $proprietario->idProprietario;
            }else{
                $propId = $proprietario->save(true);
                $propId = $propId['lastId'];

            }
            
            //Fim upload de imagem
            // Prepara o Imovel
            $imovel->load($i);
            $imovel->fkProprietario = $propId;
            $imovel->statusImovel = 'ATIVO';
            $r = $imovel->save(true);
            //Upload de imagem
            foreach ($img as $arr => $imag) {
                $utils = Image::_upload($imag);
                $imagem->caminhoImagem = $utils['path'];
                $imagem->nomeImagem = $utils['name'];
                $imagem->tipoImagem = $imag['type'];
                $img = $imagem->save(true);
                $galeria->idImagem = $img['lastId'];
                $galeria->idImovel = $r['lastId'];
                $galeria->save();

            }
            //
            $carteiraImovel->idImovel = $r['lastId'];
            $carteiraImovel->idUsuario = $user['conteudo']['idUsuario'];
            $carteiraImovel->save();
            //Fim Imobel

            if ($r['flag']){
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