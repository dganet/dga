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
	  }
	}

	/**
	 * Cadastra um novo Associado com as informações vindas em $data
	 * @param  Array $data Informações para cadastrar o Associado
	 * @return Bool       Retorna true ou false
	 */
	public function cadastrar($data){
		Log::Message("Tentando Cadastrar o Associado ". $data['nome']);
		$associado = new Associado($data);
		$associado->status = "AGUARDANDOVAGA";
		$associado->createAt = date('Y-m-d H:i:s');
		$associado->rendaSerial = serialize($data['renda']);
		//Faz upload das imagens
		$img = new ImageController();
		$documento = $data['documento'];
		$docSerial= [];
		foreach ($documento as $key => $value) {
			$documento[$key]['anexoDocumento']['tipo'] = $documento[$key]['tipoDocumento']; 
			$return = $img->cadastrar($documento[$key]['anexoDocumento']);
			array_push($docSerial, $return['id']);
			
		}
		$associado->documento = serialize($docSerial);
		if ($associado->save()){
			Audit::audit($associado->toArray(), "INSERT", "associado");
			Log::Message("Usuário ". $data['nome'] ." cadastrado com sucesso !");
			return true;
		}else {
			return false;
		}
	}

	/**
	 * Lista todos os associados Ativos
	 * @return Array Array com todos os associados Ativos
	 */
	public function listaAtivo(){
		$associado = new Associado();
		try{
			Log::Message("Listando Associados");
			$associado = $associado->select(array('where' => array('status' => 'ATIVO')));
			foreach ($associado as $key => $value) {
				$associado[$key]['rendaSerial'] = unserialize($associado[$key]['rendaSerial']);
				$associado[$key]['documento'] = unserialize($associado[$key]['documento']);
			}
			return $associado;

		}catch (Exeption $e){
			Log::Error("Não foi possivel entregar a lista de Associados ".$e);
			return false;
		}
	}
	/**
	 * Lista um Associado Pelo ID
	 * @param  Int $id Id do associado a ser listado
	 * @return Array    Array com as informações do associado
	 */
	public function listaPorId($id){
		$associado = new Associado();
    Log::Message("Solicitado informações sobre o Associado ".$i);
		$associado =  $associado->select(array('where' => array('id' => $id)));
		foreach ($associado as $key => $value) {
				$associado[$key]['rendaSerial'] = unserialize($associado[$key]['rendaSerial']);
				$associado[$key]['documento'] = unserialize($associado[$key]['documento']);
			}
			return $associado;
	}
	/**
	 * Atualiza informaçoes do Associado
	 * @param  Array $data Informações que serão atualizadas
	 * @return Boolean 	True ou False
	 */
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
	/**
	 * Inativa um cliente conforme o ID passado
	 * @param  Int $id Id do associado a ser desativado
	 * @return Boolean     True ou False
	 */
	public function inativar($id){
		$associado = new Associado();
		$associado->id = $id;
		$associado->updateAt = date('Y-m-d H:i:s');
		$associado->status = 'INATIVO';
		Log::Message("Inativando Associado ".$id);
		Audit::audit($data, "DELETE", "associado");
		$associado->update();
	}
	/**
	 * Lista todos os cliente inativos
	 * @return Array Lista com todos os cliente inativos
	 */
	public function listaInativo(){
		$associado = new Associado();
		Log::Message("Listando Associados Inativos");
		$associado  = $associado->select(array('where' => array('status' => 'INATIVO')));

	}
	/**
	 * Lista os associados que estão aguardando vagaga e os organiza conforme sua
	 * renda e data de criação
	 * PRECISA SER REFEITO
	 */
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
						$associado[$key]['documento'] = unserialize($associado[$key]['documento']);
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
/**
 * Lista os associado que está com status AGUARDANDOVAGA
 * @param Int $id Id do usuarioq ue sera mostrado
 * NECESSITA SER REFEITO
 */
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
						$associado[$key]['documento'] = unserialize($associado[$key]['documento']);
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
	/**
	 * Retorna uma lista dos associados que estão aguardando uma vaga no veiculo
	 * @return Array Retorna um array com as informações descritas acima
	 */
	public function listaAguardandoAprovacao(){
		$associado = new Associado();
		Log::Message("Listando Associados Aguardando uma aprovacao");
		return $associado->select(array('where' => array('status' => 'AGUARDANDOVAGA')));
	}
	/**
	 * Lista geral de Veiculos ?????????
	 * @return Array Lista
	 * NECESSITA SER REFEITO URGENTEEEE!!
	 */
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
/**
 * Lista associados que estão em um determinado veiculo
 * @param  Int $id id do veiculo
 * @return Array     Associados que estão no veiculo $ID
 */
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
	/**
	 * Ativa o cadastro de um associado somente se o veiculo ainda possuir vagas
	 * @param  Int $id  Id do associado que será ativo
	 * @return Boolean     True ou False
	 */
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
  /**
   * Lista os associados em um determinado curso
   * @return Array  Informações dos associados no curso
   */
  public function listAssociadoCurso($id){
    $associado = new Associado();
    return $associado->select(array('where' => array('curso' => $id)));
  }
  //Gerencia a imagem de perfil do associado
  public function picture($post){
	$img = new ImageController();
	$post['picture']['tipo'] = 'foto';
	$r = $img->upload($post['picture']);
	//Associado
	$assoc = new Associado();
	$array = $assoc->load((int)$post['idAssoc']);
	$array = $array[0];
	unset($array['senha']);
	$associado = new Associado($array);
	if ($associado->foto == null){
		$imagem = new \Api\Model\Entity\Imagem();
		$imagem->path = $r['path'];
        $imagem->nome = $r['name'];
        $imagem->tipo = 'foto';
        $imagem->createAt = date('Y-m-d H:i:s');
        $imagem->status = 'ATIVO';
        $id = $imagem->save(true);
		$associado->foto = $id;
	}else{
		$image = new \Api\Model\Entity\Imagem($img->listaPorId($associado->foto));
		$nameOld = $image->nome;
		unlink($r['path'].$nameOld);
		$image->nome = $r['name'];
		$image->updateAt = date('Y-m-d H:i:s');
		$image->update();
	}
	return $associado->update();
	print_r($associado);
  }
}
