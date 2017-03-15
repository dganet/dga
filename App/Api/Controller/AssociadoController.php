<?php
/**
 * Classe que gerencia as ações executadas pelo Associado
 * @author Guilherme Brito
 * @version 1.0
 */
namespace Api\Controller;
use \Api\Model\Entity\Associado, \Api\Controller\Log, \Api\Controller\AuditController as Audit;

class AssociadoController implements Controller {

/**
 * Loga um Associado
 * @param  Array $data. Array contem as informações necessárias para logar o associado ['cpf','senha']
 * @return Array ou false . Caso o Associado exista ele retorna um Array com as informações do associado
 * Caso ele não exista ele retorna false
 */
	public function logar($data){
		if(isset($data['cpf'])){
			Log::Message("Tentando Logar o Associado: ".$data['cpf']);
			$associado = new Associado();
			$flag =  $associado->select(array('where' => array(
								'AND' => array(
										'cpf' => $data['cpf'],
										'senha' => md5($data['senha']),
										'status' => 'ATIVO'
												)
									)
								)
							);
		if (count($flag)==0){
			$flag['check'] = false;
			Log::Error("Cpf ou senha invalidos");
			return $flag;
		}else{
			$flag['check'] = true;
			Log::Message("Associado logado com sucesso!");
			return $flag;
			}
		}else{
			Log::Error('CPF inválido!');
			return false;
		}
	}


	public function cadastrar($data){
		Log::Message("Tentando Cadastrar o Associado ". $data['nome']);

		$associado = new Associado($data);
		$associado->status = "AGUARDANDOVAGA";
		$associado->createAt = date('Y-m-d H:i:s');
		$associado->rendaSerial = serialize($data['renda']);
		$associado->save();
		Audit::audit($associado->toArray(), "INSERT", "associado");
		Log::Message("Usuário ". $data['nome'] ." cadastrado com sucesso !");
		return true;
	}

	//Lista todos os associados
	public function listaTudo(){
		$associado = new Associado();
		try{
			Log::Message("Listando Associados");
			return $associado->select(array('where' => array('status' => 'ATIVO')));
		}catch (Exeption $e){
			Log::Error("Não foi possivel entregar a lista de Associados ".$e);
			return false;
		}
	}
	//Lista Por Id
	public function listaPorId($id){
		$associado = new Associado();

		try{
			Log::Message("Solicitado informações sobre o Associado ".$i);
			return $associado->select(array('where' => array('id' => $id)));
		}catch (Exception $e){
			Log::Error("Não foi possivel entregar informações sobre o Associado ".$i);
			return false;
		}
	}
	//Update de cadastro
	public function atulizaCadastro($data){
		$associado = new Associado($data);
		$associado->updateAt = date('Y-m-d H:i:s');
		try{
			Log::Message("Atualizando informações do Associado");
			Audit::audit($data, "UPDATE", "associado");
			return $associado->update();
		}catch (Exception $e){
			Log::Error("Não foi possivel atualizar o usuario ".$e);
			return false;
		}
	}
	//Desativa o cliente
	public function inativar($id){
		$associado = new Associado();
		$associado->id = $id;
		$associado->updateAt = date('Y-m-d H:i:s');
		$associado->status = 'INATIVO';
		try{
			Log::Message("Inativando Associado ".$id);
			Audit::audit($data, "DELETE", "associado");
			$associado->update();
		}catch (Exception $e){
			Log::Error("Não foi possivel inativar o Associado");
			return false;
		}
	}

	public function listaInativo(){
		$associado = new Associado();
		try{
			Log::Message("Listando Associados Inativos");
			return $associado->select(array('where' => array('status' => 'INATIVO')));
		}catch (Exeption $e){
			Log::Error("Não foi possivel entregar a lista de Associados Inativos ".$e);
			return false;
		}
	}

	public function ListaAguardandoVaga(){
		$associado = new Associado();

			Log::Message("Listando Associados Aguardando uma vaga");
			$array = $associado->select(
				array(
					'select'	=> "associado.id, associado.nome, associado.salario, associado.rendaSerial, associado.createAt",
					'inner' => array('veiculo' => array('veiculo.id' => 'associado.veiculo_id')
						),
					'where' => array('status' => 'AGUARDANDOVAGA'),
					'order' => 'associado.createAt'
					)
			);
			//$renda =  unserialize($array[0]['rendaSerial']);
			//
			foreach ($array as $key => $value) { //primeira posição de um vetor aponta para o array

				foreach ($value as $keys => $values) { // segunda posição vai ate achar a key rendaSerial que é um array serializado
					if($keys == "rendaSerial"){ // achando a posição des serializa e percorre este array
						$array[$key]['rendaSerial'] = unserialize($values); // Desserializa tudo
					}
				}
			}

		foreach ($array as $x => $value) {
				foreach ($value as $y => $v) {
					if ($y == "rendaSerial"){
					 $count = count($v)+1;
						foreach ($v as $z => $values) {
							foreach ($values as $w => $valor) {
								if ($w == "rendaParentesco"){
									$array[$x]["rendaPerCapta"] = $valor + $array[$x]["rendaPerCapta"];
								}
							}
						}
						$array[$x]["rendaPerCapta"] = $array[$x]["rendaPerCapta"]/$count;
					}
				}
		}
			return $array;
	}

	public function ListaAguardandoVagaID($id){
		$associado = new Associado();

			Log::Message("Listando Associados Aguardando uma vaga");
			$array = $associado->select(
				array(
					'select'	=> "associado.id, associado.nome, associado.salario, associado.rendaSerial, associado.createAt",
					'inner' => array('veiculo' => array('veiculo.id' => 'associado.veiculo_id')
						),
					'where' => array("AND" => array('associado.status' => 'AGUARDANDOVAGA', 'veiculo.id' => $id)),
					'order' => 'associado.createAt'
					)
			);
			//$renda =  unserialize($array[0]['rendaSerial']);
			//
			foreach ($array as $key => $value) { //primeira posição de um vetor aponta para o array

				foreach ($value as $keys => $values) { // segunda posição vai ate achar a key rendaSerial que é um array serializado
					if($keys == "rendaSerial"){ // achando a posição des serializa e percorre este array
						$array[$key]['rendaSerial'] = unserialize($values); // Desserializa tudo
					}
				}
			}

		foreach ($array as $x => $value) {
				foreach ($value as $y => $v) {
					if ($y == "rendaSerial"){
					 $count = count($v)+1;
						foreach ($v as $z => $values) {
							foreach ($values as $w => $valor) {
								if ($w == "rendaParentesco"){
									$array[$x]["rendaPerCapta"] = $valor + $array[$x]["rendaPerCapta"];
								}
							}
						}
						$array[$x]["rendaPerCapta"] = $array[$x]["rendaPerCapta"]/$count;
					}
				}
		}
			return $array;
	}

	public function listaAguardandoAprovacao(){
		$associado = new Associado();
		try{
			Log::Message("Listando Associados Aguardando uma aprovacao");
			return $associado->select(array('where' => array('status' => 'APROVACAO')));
		}catch (Exeption $e){
			Log::Error("Não foi possivel entregar a lista de Associados aguardando uma aprovacao ".$e);
			return false;
		}
	}

	public function listaGeral(){
		$associado = new Associado();

		 $array = $associado->select(
				array(
					'select' 	=> "count(associado.status) as ocupado, veiculo.id, veiculo.nomeLinha, veiculo.destino, veiculo.numVagas, veiculo.periodo",
					'inner'		=>	array('veiculo' => array('associado.veiculo_id' => 'veiculo.id')),
					'where' 	=>
						array(
							'AND' =>array(
								'associado.status' => 'ATIVO',
													)
								),
					'group' => 'associado.veiculo_id'

			), false);
			foreach ($array as $key => $value) {
					$value['disponivel'] = $value['numVagas'] - $value['ocupado'];
					$array[$key] = $value;
			}
			return $array;

	}

	public function listaAssociadoVeiculo($id){
		$associado = new Associado();
		return $associado->select(
			array(
				'select'=> 'associado.nome',
				'where' =>
					array('AND' =>
						array('veiculo_id' => $id,
									'status' => 'ATIVO'
								)
				)
			)
	);
	}

	public function ativaCadastro($id){
		$associado = new Associado();
		$ass = $associado->select(array('where' => array('id' => $id)));

		$veiculo = new \Api\Model\Entity\Veiculo();
		$veiculo = $veiculo->select(array('where' => array('id' => $ass[0]["veiculo_id"])));
		$count = $associado->select(
			array(
				'select' => 'count(veiculo_id) as quantidade',
				'where' =>
								array(
									'AND' =>
										array(
											'veiculo_id' => $veiculo[0]['id'],
											'status' => 'ATIVO'
										)
								)
			),
			 false);

		if ($count[0]['quantidade'] < $veiculo[0]['numVagas']){
			$associado->id = $ass[0]['id'];
			$associado->status = "ATIVO";
			$associado->update();
			return true;
		}else {
			return false;
		}
	}
}
