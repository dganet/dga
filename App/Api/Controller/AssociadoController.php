<?php
/**
 * Classe que gerencia as ações executadas pelo Associado
 * @author Guilherme Brito
 * @version 1.0
 */
namespace Api\Controller;
use \Api\Model\Entity\Associado,
 \Api\Controller\Log,
 \Api\Controller\AuditController as Audit,
 \Api\Controller\ImageController;

class AssociadoController {

// /**
//  * Loga um Associado
//  * @param  Array $data. Array contem as informações necessárias para logar o associado ['cpf','senha']
//  * @return Array ou false . Caso o Associado exista ele retorna um Array com as informações do associado
//  * Caso ele não exista ele retorna false
//  */
// 	public function logar($data){
		
// 		if(isset($data['cpf'])){
// 			Log::Message("Tentando Logar o Associado: ".$data['cpf']);
// 			$associado = new Associado();
// 			$flag =  $associado->select(array('where' => array(
// 								'AND' => array(
// 										'cpf' => $data['cpf'],
// 										'senha' => md5($data['senha']),
// 										'status' => 'ATIVO'
// 												)
// 									)
// 								)
// 							);
		
// 		if (count($flag)==0){
// 			$flag['check'] = false;
// 			Log::Error("Cpf ou senha invalidos");
// 			return $flag;
// 		}else{
// 			$flag['check'] = true;
// 			Log::Message("Associado logado com sucesso!");
// 			return $flag;
// 		}
// 	  }
// 	}
	/**
	 * Cadastra um novo associado no banco de dados
	 *
	 * @param [type] $request
	 * @param [type] $response
	 * @param [type] $args
	 * @return void
	 */
	public function cadastrar($request, $response, $args){
		//Recupera as informações trazidas pelo request,e as insere dentro do objeto
		$data = json_decode($request->getBody(),true);
		$associado = Associado::getInstance();
		$associado->status = "AGUARDANDOVAGA";
		$associado->rendaSerial = $data['renda'];
		unset($data['renda']);	//Remove o valor de renda dentro do array vindodo Request
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
		//Serializa os campos necessários e salva no banco de dados
		return $response->WithJson(var_dump($associado->save()));
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
		$associado->serializable = true;
		$associado->makeSelect()->where("status='ATIVO'");
		$collection = $associado->execute();
		return $response->Withjson($collection->getAll());
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
		$associado->serializable = true;
		$associado->makeSelect()->where("id=".$args['id']);
		$collection = $associado->execute();
		return $response->Withjson($collection->getAll());
	}
// 	/**
// 	 * Atualiza informaçoes do Associado
// 	 * @param  Array $data Informações que serão atualizadas
// 	 * @return Boolean 	True ou False
// 	 */
// 	public function atulizaCadastro($data){
// 		$associado = new Associado($data);
// 		$associado->updateAt = date('Y-m-d H:i:s');
// 		try{
// 			Log::Message("Atualizando informações do Associado");
// 			Audit::audit($data, "UPDATE", "associado");
// 			return $associado->update();
// 		}catch (Exception $e){
// 			Log::Error("Não foi possivel atualizar o usuario ".$e);
// 			return false;
// 		}
// 	}
// 	/**
// 	 * Inativa um cliente conforme o ID passado
// 	 * @param  Int $id Id do associado a ser desativado
// 	 * @return Boolean     True ou False
// 	 */
// 	public function inativar($id){
// 		$associado = new Associado();
// 		$associado->id = $id;
// 		$associado->updateAt = date('Y-m-d H:i:s');
// 		$associado->status = 'INATIVO';
// 		Log::Message("Inativando Associado ".$id);
// 		Audit::audit($data, "DELETE", "associado");
// 		$associado->update();
// 	}
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
		$associado->serializable = true;
		$associado->makeSelect()->where("status='INATIVO'");
		$collection = $associado->execute();
		return $response->WithJson($collection->getAll());
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
		$associado->serializable = true;
		$associado->makeSelect("associado.id, associado.nome, associado.salario, associado.rendaSerial, associado.createAt")
		->inner('veiculo', 'veiculo.id = associado.veiculo_id')
			->where("associado.status='AGUARDANDOVAGA'")->order('associado.createAt');
		$collection = $associado->execute();
		return $response->WithJson($collection->getAll());
		
		$associado->getRendaPerCapta();
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
		$associado->serializable = true;
		$associado->makeSelect("associado.id, associado.nome, associado.salario, associado.rendaSerial, associado.createAt")
		->inner('veiculo', 'veiculo.id = associado.veiculo_id')
			->where("associado.status='AGUARDANDOVAGA'")->and('associado.id='.$args['id'])->order('associado.createAt');
		$collection = $associado->execute();
		return $response->WithJson($collection->getAll());

		// foreach ($array as $x => $value) {
		// 		foreach ($value as $y => $v) {
		// 			if ($y == "rendaSerial"){
		// 			 $count = count($v)+1;
		// 				foreach ($v as $z => $values) {
		// 					foreach ($values as $w => $valor) {
		// 						if ($w == "rendaParentesco"){
		// 							$array[$x]["rendaPerCapta"] = $valor + $array[$x]["rendaPerCapta"];
		// 						}
		// 					}
		// 				}
		// 				$array[$x]["rendaPerCapta"] = $array[$x]["rendaPerCapta"]/$count;
		// 			}
		// 		}
		// }
		// 	return $array;
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
		$associado->serializable = true;
		$associado->makeSelect()->where("status='AGUARDANDOVAGA'");
		$collection = $associado->execute();
		return $response->WithJson($collection->getAll());
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
		$associado->serializable = true;
		$associado->makeSelect('nome')->where("veiculo_id=".$args['id'])->and("status='ATIVO");
		$collection = $associado->execute();
		return $response->WithJson($collection->getAll());
	}
// 	/**
// 	 * Ativa o cadastro de um associado somente se o veiculo ainda possuir vagas
// 	 * @param  Int $id  Id do associado que será ativo
// 	 * @return Boolean     True ou False
// 	 */
// 	public function ativaCadastro($id){
// 		$associado = new Associado();
// 		$ass = $associado->select(array('where' => array('id' => $id)));

// 		$veiculo = new \Api\Model\Entity\Veiculo();
// 		$veiculo = $veiculo->select(array('where' => array('id' => $ass[0]["veiculo_id"])));
// 		$count = $associado->select(
// 			array(
// 				'select' => 'count(veiculo_id) as quantidade',
// 				'where' =>
// 								array(
// 									'AND' =>
// 										array(
// 											'veiculo_id' => $veiculo[0]['id'],
// 											'status' => 'ATIVO'
// 										)
// 								)
// 			),
// 			 false);
// 		if ($count[0]['quantidade'] < $veiculo[0]['numVagas']){
// 			$associado->id = $ass[0]['id'];
// 			$associado->status = "ATIVO";
// 			$associado->update();
// 			return true;
// 		}else {
// 			return false;
// 		}
// 	}
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
// 	$associado->serializable = true;
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
