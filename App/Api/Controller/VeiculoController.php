<?php
namespace Api\Controller;
use \Api\Model\Entity\Veiculo, \Api\Auth\Auth;

class VeiculoController{
	/**
	 * Salva um novo veiculo
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function cadastrar($request, $response, $args){
		if(Auth::_isLoggedIn($args['token'])){
			$data = json_decode($request->getBody(),true);
			$veiculo = Veiculo::getInstance();
			$veiculo->load($data);
			$veiculo->status = 'ATIVO';
			return $response->WithJson($veiculo->save());
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
	/**
	 * Atualiza as informações do Veiculo
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function atualizaCadastro($request, $response, $args){
		if(Auth::_isLoggedIn($args['token'])){
			$veiculo = Veiculo::getInstance();
			$data = json_decode($request->getBody(),true);
			$veiculo->find($data['id']);
			if($veiculo->numVagas > $data['numVagas']){
				return $response->WithJson(
					[
						'flag' => false,
						'message' => 'O numero de vagas não permitido'
					]
				);
			}else{
				// $dest = self::checkDestino($data);
				// if(empty($dest)){
				// 	$vaga = $data['numVagas'] - $veiculo->numVagas;  
				// 	$disp = $veiculo->vagasDisponiveis;
				// 	$veiculo->load($data);
				// 	$veiculo->vagasDisponiveis += $vaga;
				// 	return $response->WithJson($veiculo->update());
				// }else{
				// 	return $response->WithJson([
				// 		'message' => "Não é possivel remover os destinos, pois há associados indo para estas faculdades, primeiro remova-os",
				// 		'destinos' => $dest
				// 	]);
				// }
				return $response->WithJson(self::checkDestino($data));
			}
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
	/**
	 * Lista todos os veiculos ATIVOS
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaTudo($request, $response, $args){
		$veiculo = Veiculo::getInstance();
		$veiculo->makeSelect()->where("status='ATIVO'");
		$collection = $veiculo->execute();
		if($collection->exists(0)){
			return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson([]);
		}
	}
	/**
	 * Lista um veiculo pelo ID
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return json
	 */
	public function listaPorId($request, $response, $args){
		$veiculo = Veiculo::getInstance();
		$veiculo->makeSelect()->where("status='ATIVO'")->and("id=".$args['id']);
		$collection = $veiculo->execute();
		if( $collection->length() > 0 ){
			return $response->WithJson($collection->getAll());
		}
	}
	/**
	 * Lista todos os veiculos com status INATIVO
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function listaInativo($request, $response, $args){
		$veiculo = Veiculo::getInstance();
		$veiculo->makeSelect()->where("status='INATIVO'");
		$collection = $veiculo->execute();
		if($collection->exists(0)){
			return $response->WithJson($collection->getAll());
		}else{
			return $response->WithJson([]);
		}
	}
	/**
	 * Inativa um Veiculo
	 *
	 * @param Request $request
	 * @param Response $response
	 * @param Mixed $args
	 * @return Json
	 */
	public function delete($request, $response, $args){
		if(Auth::_isLoggedIn($args['token'])){
			$vagas = new \Api\Controller\VagaController();
			$veiculo = Veiculo::getInstance();
			$veiculo->find($args['id']);
			if($veiculo->vagasDisponiveis == $veiculo->numVagas){
				$veiculo->status = 'INATIVO';
				return $response->WithJson($veiculo->update());
			}else{
				return $response->WithJson(['flag' => false, 'message' => 'Ainda há associados no veicuo, não será possivel fazer a deleção']);
			}
		}else{
			return $response->WithJson(['flag' => false, 'message' => 'Não foi possivel completar sua requisição, pois, o usuario não está logado']);
		}
	}
	
	/**
	 * Retorna quais veiculos que atendem uma universidade ID e que possuem vagas disponiveis
	 *
	 * @param int $idUniversidade
	 * @return Array
	 */
	public static function getVeiculosByUniversidade($idUniversidade){
		$veiculo = Veiculo::getInstance();
		$veiculo->makeSelect()->where("status='ATIVO'")->and("vagasDisponiveis > 0");
		$collection = $veiculo->execute();
		$atende = [];
		foreach ($collection as $i => $veiculos) {
			foreach ($veiculos->destino as $key => $universidade){
				if ($universidade['id'] == $idUniversidade){
					array_push($atende , ["id" => $veiculos->id, "nome" => $veiculos->nome]);
				}
			}
		}
		return $atende;
	}
	/**
	 * Retorna todos os veiculos que tem a universidade de id $id
	 *
	 * @return void
	 */
	public function getUniversidade($idUniversidade){
		$veiculo = Veiculo::getInstance();
		$veiculo->makeSelect()->where("status='ATIVO'");
		$collection = $veiculo->execute();
		foreach ($collection as $key => $veiculo) {
			foreach($veiculo->destino as $keys => $value){
				if($value['id'] == $idUniversidade){
					return true;
					break;
				}
			}
		}
	}
	/**
	 * Verifica se uma determinada universidade pode ser removida de um veiculo
	 * A condição para que a remoção tenha sucesso é nenhum associado estar indo para a universidade requerida
	 *
	 * @param Array $array
	 * @return array
	 */
	public function checkDestino($array){
		$veiculo = Veiculo::getInstance();
		$vaga = \Api\Model\Entity\Vaga::getInstance();
		$veiculo->find($array['id']);
		$diff = self::array_recursive_diff($veiculo->destino,$array['destino']);
		// $universidades = [];
		// foreach ($diff as $key => $values){
		// 	$vaga->makeSelect()->where("fkVeiculo=".$veiculo->id)->and("fkUniversidade=".$values['id']);
		// 	$collection = $vaga->execute();
		// 	if ($collection != null){
		// 		if($collection->length() > 0){
		// 			array_push($universidades, $values);
		// 		}
		// 	}
		// }
		return print_r($diff);
	}

	public function array_recursive_diff($array1, $array2){
		$r = [];
		foreach ($array1 as $key1 => $value1) {
			$flag = false;
			foreach ($array2 as $key2 => $value2){
				if(in_array($value1['nome'], $value2)){
					
					$flag = true;
					break;
				}
			}
			if($flag == false){
				array_push($r, $value1);
			}

		}
		return $r;
	}

}
