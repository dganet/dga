<?php
/**
 * Classe que gerencia as ações executadas pelo Associado
 * @author Guilherme Brito
 * @version 1.0
 */
namespace Api\Controller;
use \Api\Model\Entity\Associado,
 \Api\Auth\Auth,
 \Api\Controller\ImageController,
 DateTime;

class AssociadoController {
	/**
	 * Loga um Associado
	 * 
	 * @param Request $request
	 * @param Response$response
	 * @param Mixed $args
	 * @return Json
	 */
	public function logar($request, $response, $args){
		$data = json_decode($request->getBody, true);
		$auth = new Auth();
		return $response->WithJson($auth->login($data['email'], $data['senha'], true));
	}
	/**
	 * Cadastra um novo associado no banco de dados
	 *
	 * @param [type] $request
	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	public function cadastrar($request, $response, $args){
		if (Auth::_isLoggedIn($args['token'])){
			//Recupera as informações trazidas pelo request,e as insere dentro do objeto
			$data = json_decode($request->getBody(),true);
			$associado = Associado::getInstance();
			$associado->rendaSerial = $data['renda'];
			$associado->fkCursoFaculdade = $data['curso'];
			$veiculo = $data['veiculo'];
			unset($data['curso']);  // Remove informação de curso
			unset($data['renda']);	//Remove o valor de renda dentro do array vindodo Request
			/**
			 * Faz o upload da foto e a salva no banco de dados
			 */
			$img = new ImageController();
			foreach ($associado->documento as $key => $value) {
				$doc = $img->upload($value['anexoDocumento']);
				if ($doc['flag']){
					$doc['obj']->tipo = $value['tipoDocumento'];
					$imagem = $doc['obj'];
					$r = $imagem->save(true);
					$associado->documento[$key] = $r['lastId'];
				}
			}
			/**
			 * ATIVA O ASSOCIADO E O COLOCA EM UMA VAGA
			 */
			if (isset($data['veiculo'])){
				unset($data['veiculo']);  // remove a informação de veiculo
				$associado->load($data);	//Carrega as informações restantes dentro do Objeto	
				$associado->getRendaPerCapta();
				$associado->status = "ATIVO";
				$idAssoc = $associado->save(true);
				$vaga = \Api\Model\Entity\Vaga::getInstance();
				$vaga->fkAssociado = $idAssoc['lastId'];
				$vaga->fkUniversidade = $associado->fkUniversidade;
				$vaga->fkVeiculo = $veiculo;
				return $response->WithJson($vaga->save());
			}else{
				unset($data['veiculo']);  // remove a informação de veiculo
				$associado->load($data);	//Carrega as informações restantes dentro do Objeto	
				$associado->getRendaPerCapta();
				$associado->status = "AGUARDANDOVAGA";
				return $response->WithJson($associado->save());
			}
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
	/**
	 * Lista todos os associados que estão ativos no sistema
	 *
	 * @param [type] $request
	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	public function listaAtivo($request, $response, $args){
		$associado = Associado::getInstance();
		$vaga = \Api\Model\Entity\Vaga::getInstance();
        $veiculo = \Api\Model\Entity\Veiculo::getInstance();
		$associado->makeSelect()->where("status='ATIVO'");
		$collection = $associado->execute(true);
		foreach ($collection as $key => $value) {
			$vaga = $vaga->makeSelect()->where('fkAssociado='.$value['id'])->execute(true);
			$veiculo = $veiculo->makeSelect()->where("id=".$vaga[0]['fkVeiculo'])->execute(true);
			$collection[$key]['veiculo'] = $veiculo[0]['nome'];
		}
		if($collection != null){
				return $response->Withjson($collection);
		}
	}
	/**
	 * Lista o associados atraves de um ID
	 *
	 * @param [type] $request
	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	public function listaPorId($request, $response, $args){
		$associado = Associado::getInstance();
		$associado->makeSelect()->where("id=".$args['id']);
		$collection = $associado->execute();
		if($collection != null){
			if($collection->length() > 0){
				return $response->Withjson($collection->getAll());
			}
		}
	}
	/**
	 * Atualiza informaçoes do Associado
	 * 
	 * @param [type] $request
	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	public function atulizaCadastro($request, $response, $args){
		if(Auth::_isLoggedIn($args['token'])){
			$data = json_decode($request->getBody(),true);
			$associado = Associado::getInstance();
			$associado->rendaSerial = $data['renda'];
			unset($data['renda']);	//Remove o valor de renda dentro do array vindodo Request
			unset($data['curso']);  // Remove informação de curso
			/**
			 * Faz o upload da foto e a salva no banco de dados
			 */
			$img = new ImageController();
			//Verifica se foi enviado algum documento
			if($associado->documento != null ){
				foreach ($associado->documento as $key => $value) {
					$doc = $img->upload($value['anexoDocumento']);
					if ($doc['flag']){
						$doc['obj']->tipo = $value['tipoDocumento'];
						$imagem = $doc['obj'];
						$r = $imagem->save(true);
						$associado->documento[$key] = $r['lastId'];
					}
				}
			}
			/**
			 * Atualiza as informações do associado nas vagas
			 */
			if (isset($data['veiculo'])){
				$veiculo = $data['veiculo'];
				unset($data['veiculo']);  // remove a informação de veiculo
				$associado->load($data);	//Carrega as informações restantes dentro do Objeto	
				$associado->getRendaPerCapta();
				$associado->status = "ATIVO";
				$vagacontroller = \Api\Controller\VagaController::getVagaByAssoc($associado->id);
				$vaga = \Api\Model\Entity\Vaga::getInstance();
				if ($vagacontroller == null || $vagacontroller == false ){
					//Caso o associado não esteja cadastrado em nenhuma vaga
					$vaga->fkAssociado = $associado->id;
					$vaga->fkUniversidade = $associado->fkUniversidade;
					$vaga->fkVeiculo = $veiculo;
					$vaga->save();
				}else{
					//Caso associado esteja cadastrado em uma vaga ele apenas atualiza a mesma
					$vaga->load( $vagacontroller[0]);
					$response->WithJson($vaga->delete());
					$vaga->fkAssociado = $associado->id;
					$vaga->fkUniversidade = $associado->fkUniversidade;
					$vaga->fkVeiculo = $veiculo;
					$vaga->save();
				}
				return $response->WithJson($associado->update());
			}else{
				unset($data['veiculo']);  // remove a informação de veiculo
				$associado->load($data);	//Carrega as informações restantes dentro do Objeto	
				$associado->getRendaPerCapta();
				$associado->status = "AGUARDANDOVAGA";
				return $response->WithJson($associado->update());
			}
			
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
	/**
	 * Inativa um cliente conforme o ID passado
	 * 
	 * @param [type] $request
	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	public function inativar($request, $response, $args){
		if(Auth::_isLoggedIn($args['token'])){
			$associado = Associado::getInstance();
			$associado->id = $args['id'];
			$associado->status = 'INATIVO';
			/**
			 * Remove a vaga do associado
			 */
			$vaga = \Api\Model\Entity\Vaga::getInstance();
			$vaga->fkAssociado=$args['id'];
			if ($vaga->delete()['flag']){
				return $response->WithJson($associado->update());
			}
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
	/**
	 * Retorna uma lista com os associados com status INATIVO
	 *
	 * @param [type] $request
	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	public function listaInativo($request, $response, $args){
		$associado = Associado::getInstance();
		$associado->makeSelect()->where("status='INATIVO'");
		$collection = $associado->execute();
		if($collection != null){
			if($collection->length() > 0){
				return $response->WithJson($collection->getAll());
			}
		}
	}
	/**
	 * Lista Associados que estão com status AGUGARDANDOVAGA
	 *
	 * @param [type] $request
	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	public function ListaAguardandoVaga($request, $response, $args){
		$associado = Associado::getInstance();
		$associado->makeSelect("associado.id as idAssociado, associado.nome as AssociadoNome, universidade.nome as Universidade")
		->inner('universidade', "associado.fkuniversidade=universidade.id")->where("associado.status='AGUARDANDOVAGA'");
		$collection = $associado->execute(true);
		return $response->WithJson($collection);
	}
	/**
	 * Lista Associados que estão com status AGUGARDANDOVAGA
	 *
	 * @param [type] $request
	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	public function ListaAguardandoVagaUniversidade($request, $response, $args){
		$associado = Associado::getInstance();
		$associado->makeSelect()->inner('universidade', "associado.fkuniversidade=universidade.id")->where("associado.status='AGUARDANDOVAGA'")
			->and("associado.fkUniversidade=".$args['id']);
		$collection = $associado->execute(true);
		// Separa os associados por mes onde cada posição do array é referente a um mês
		foreach ($collection as $key => $value){
			$data = DateTime::createFromFormat('Y-m-d H:i:s', $value['createAt']);
			print_r($data->format('m'));
			$month[$data->format('m')] = $values;
		}
		// Organize o array por renda amenor renda fica como a primeira
		foreach($month as $key => $value){

		}
		return $response->WithJson($month);
	}
	/**
	 * Lista Associado referente a um id e que está com o status AGUGARDANDOVAGA 
	 *
	 * @param [type] $request
	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	public function ListaAguardandoVagaID($request, $response, $args){
		$associado = Associado::getInstance();
		$associado->makeSelect("associado.id as idAssociado, associado.nome as AssociadoNome, universidade.nome as Universidade")
		->inner('universidade', "associado.fkuniversidade=universidade.id")->where("associado.status='AGUARDANDOVAGA'")
		->and('associado.id='.$args['id'])->order('associado.createAt');
		$collection = $associado->execute(true);
		return $response->WithJson($collection);
	}
	/**
	 * Retorna uma lista com os associados que estão com status AGUARDANDOVAGA
	 * 
	 * @param [type] $request
	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	public function listaAguardandoAprovacao($request, $response, $args){
		$associado = Associado::getInstance();
		$associado->makeSelect()->where("status='AGUARDANDOVAGA'");
		$collection = $associado->execute();
		if($collection != null){
			if($collection->length() > 0){
				return $response->WithJson($collection->getAll());
			}
		}
	}
	/**
	 * Retorna a lista de vagas remanecentes por onibus/associados
	 *
	 * @param [type] $request
	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	public function listaGeral($request, $response, $args){
		$associado = Associado::getInstance();
		$associado
		->makeSelect('count(associado.status) as ocupado, veiculo.id, 
			veiculo.nomeLinha, veiculo.destino, veiculo.numVagas, veiculo.periodo')
		->inner('veiculo', "associado.veiculo_id=veiculo.id" )
		->where("associado.status='ATIVO'")->group('associado.veiculo_id');
		$array = $associado->execute(true);
		//Calcula a quantidade de vagas remanecentes
		foreach ($array as $key => $value) {
			$value['disponivel'] = $value['numVagas'] - $value['ocupado'];
			$array[$key] = $value;
		}
		return $response->WithJson($array);
	}
	/**
	 * Retorna os associados que estão em um determinado veiculo
	 *
	 * @param [type] $request
	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	public function listaAssociadoVeiculo($request, $response, $args){
		$vaga = \Api\Model\Entity\Vaga::getInstance();
		$vaga->makeSelect('associado.nome')->inner('associado', "associado.id=vaga.fkAssociado")
			->inner('veiculo', 'veiculo.id=vaga.fkVeiculo')
			->where("vaga.fkveiculo=".$args['id'])->and("associado.status='ATIVO'");
		$collection = $vaga->execute(true);
		return $response->WithJson($collection);
	}
	
}
