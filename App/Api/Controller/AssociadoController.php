<?php
/**
 * Classe que gerencia as ações executadas pelo Associado
 * @author Guilherme Brito
 * @version 1.0
 */
namespace Api\Controller;
use \Api\Model\Entity\Associado,
 \Api\Auth\Auth,
 \Api\Controller\ImageController;

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
			unset($data['veiculo']);  // remove a informação de veiculo
			$associado->load($data);	//Carrega as informações restantes dentro do Objeto	
			$associado->getRendaPerCapta();
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
			if ($veiculo != null){
				$associado->status = "ATIVO";
				$idAssoc = $associado->save(true);
				$vaga = \Api\Model\Entity\Vaga::getInstance();
				$vaga->fkAssociado = $idAssoc['lastId'];
				$vaga->fkUniversidade = $associado->fkUniversidade;
				$vaga->fkVeiculo = $veiculo;
				return $response->WithJson($vaga->save());
			}else{
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
		$associado->makeSelect()->where("status='ATIVO'");
		$collection = $associado->execute();
		if($collection != null){
			if($collection->length() > 0){
				return $response->Withjson($collection->getAll());
			}
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
			$associado->load($data);
			return $response->WithJson($associado->update());
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
			return $response->WithJson($associado->update());
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
		// if($collection != null){
		// 	if($collection->length() > 0){
		// 		$associado->getRendaPerCapta();
		// 	}
		// }
		return $response->WithJson($collection);
		
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
		$associado->makeSelect("associado.id, associado.nome, associado.salario, associado.rendaSerial, associado.createAt")
		->inner('veiculo', 'veiculo.id = associado.veiculo_id')
			->where("associado.status='AGUARDANDOVAGA'")->and('associado.id='.$args['id'])->order('associado.createAt');
		$collection = $associado->execute();
		if($collection != null){
			if($collection->length() > 0){
				return $response->WithJson($collection->getAll());
			}
		}
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
		$associado = Associado::getInstance();
		$associado->makeSelect('nome')->where("veiculo_id=".$args['id'])->and("status='ATIVO");
		$collection = $associado->execute();
		if($collection != null){
			if($collection->length() > 0){
				return $response->WithJson($collection->getAll());
			}
		}
	}
	/**
	 * Ativa o cadastro de um associado somente se o veiculo ainda possuir vagas
	 * 
	 * @param [type] $request
 	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	// public function ativaCadastro($request, $response, $args){
	// 	$associado = Associado::getInstance();
	// 	$associado->makeSelect()->where("id=".$args['id']);
	// 	$collection = $associado->execute();
	// if($collection != null){
	// 	if($collection->length() > 0){
	// 		// 	$associado->
	// 	}
	// }
	// 	//Veiculo
	// 	$veiculo = \Api\Model\Entity\Veiculo::getInstance();
	// 	$veiculo = $associado->veiculo_id;
	// 	if($veiculo->getVagas() > 0){
	// 		$associado->status = "ATIVO";
	// 		return $response->WithJson($associado->update());
	// 	}else{
	// 		return $response->WithJson(
	// 		[
	// 			'falg' => false,
	// 			'message' => 'Não há vagas disponiveis'
	// 		]);
	// 	}
	// }
/**
 * Lista todos associados em um determinado curso
 *
 * @param [type] $request
 * @param [type] $response
 * @param [type] $args
 * @return void
 */
//   public function listAssociadoCurso($request, $response, $args){
//     $associado = Associado::getInstance();

// 	$collection = $associado->makeSelect()->where("curso=".$args['id'])->execute();
//     return $response->WithJson($collection->getAll());
//   }
//   //Gerencia a imagem de perfil do associado
//   public function picture($post){
// 	$img = new ImageController();
// 	$post['picture']['tipo'] = 'foto';
// 	$r = $img->upload($post['picture']);
// 	//Associado
// 	$assoc = new Associado();
// 	$array = $assoc->load((int)$post['idAssoc']);
// 	$array = $array[0];
// 	unset($array['senha']);
// 	$associado = new Associado($array);
// 	if ($associado->foto == null){
// 		$imagem = new \Api\Model\Entity\Imagem();
// 		$imagem->path = $r['path'];
//         $imagem->nome = $r['name'];
//         $imagem->tipo = 'foto';
//         $imagem->createAt = date('Y-m-d H:i:s');
//         $imagem->status = 'ATIVO';
//         $id = $imagem->save(true);
// 		$associado->foto = $id;
// 	}else{
// 		$image = new \Api\Model\Entity\Imagem($img->listaPorId($associado->foto));
// 		$nameOld = $image->nome;
// 		unlink($r['path'].$nameOld);
// 		$image->nome = $r['name'];
// 		$image->updateAt = date('Y-m-d H:i:s');
// 		$image->update();
// 	}
// 	return $associado->update();
// 	print_r($associado);
//   }
}
