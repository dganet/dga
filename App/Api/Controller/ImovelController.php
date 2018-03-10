<?php
namespace Api\Controller;
use \Api\Model\Entity\Imovel, \Api\Model\Entity\Galeria, \Api\Model\Entity\Proprietario;
use \Api\Utils\Image, \Api\Model\Entity\CarteiraImovel, \Api\Model\Entity\Endereco;
use \Api\Model\Entity\Bairro;
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
        $op = 'fkEndereco,idImovel,isPublic,tipoOperacaoImovel,tipoImovel,iptuImovel,condominioImovel,idadeConstrucaoImovel,suiteImovel,copaImovel,banheiroImovel,salajantarImovel,mobiliadoImovel,elevadorImovel,andarImovel,garagemCobertaImovel,garagemCobertaImovel,areaTerrenoImovel,areaUtilImovel,areaTotalImovel,descricaoImovel,valorVendaImovel,valorLocacaoImovel';
        $collection = $this->carteiraImovel->getImovel($user['conteudo']['idUsuario'], $op);
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
        $collection = $imovel->makeSelect()->where('idImovel='.$args['id'])->execute();
        return $response->withJson($collection->getAll());
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
        $i['valorVendaImovel'] = isset($i['valorImovel'])?$i['valorImovel']:null;
        unset($i['valorImovel']);
        $i['idadeConstrucaoImovel'] = isset($i['idadeImovel'])?$i['idadeImovel']:null;
        unset($i['idadeImovel']);
        $i['garagemCobertaImovel'] = isset($i['garagemDescobertaImovel'])? $i['garagemDescobertaImovel']: null;
        unset($i['garagemDescobertaImovel']);
        $p['telComercialProprietario'] = isset($p['telefoneProprietario'])? $p['telefoneProprietario']: null;
        unset($p['telefoneProprietario']);
        // //FIM
        $logado = Auth::_isLoggedIn($args['token']);
        $user = Auth::_getTokenInfo($args['token']);
        if ($logado){
            //Gera o proprietário
            $proprietario = Proprietario::getInstance();
            $galeria =  Galeria::getInstance();
            $carteiraImovel = CarteiraImovel::getInstance();
            $endereco = Endereco::getInstance();
            $imovel = Imovel::getInstance();
            $bairro = Bairro::getInstance();
            $imagem = \Api\Model\Entity\Imagem::getInstance();
            $proprietario->load($p);
            $imovel->load($i);
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
            /**
             * Salva o endereco
             */
            $endereco->paisId = 1;
            $endereco->estadoId = $e['idEstado'];
            $endereco->cidadeId = $e['idCidade'];
            if (is_int($e['idBairro'])){
                $endereco->bairroId = $e['idBairro'];
            }else{
                $bairro->nome = $e['idBairro'];
                $endereco->bairroId = $bairro->save(true)['lastId'];
            }
            $endereco->logradouro = $e['enderecoImovel'];
            $imovel->fkEndereco = $endereco->save(true)['lastId'];
            // FIM ENDERECO
            //Fim upload de imagem
            // Prepara o Imovel
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

    public function update($request, $response, $args){
        $token = $args['token'];
        if(Auth::_isLoggedIn($token)){
          $user = Auth::_getTokenInfo($args['token']);
          $post = json_decode($request->getBody(), true);
          $imovel = Imovel::getInstance();
          $imovel->load($post);
          $imovel->setPrimaryKey('idImovel');
          if($imovel->update()){
            return $response->withJson([
              'message' => 'Imovel atualizado com sucesso!',
              'flag'    => true
            ]);
          }else{
            return $response->withJson([
              'message' => 'Não foi possivel atualizar as informações ',
              'flag'    => false
            ]);
          }
        }else{
          return $response->withJson([
            'message' => 'Usuario não está logado',
            'flag'    => false
          ]);
        }
    }

}
