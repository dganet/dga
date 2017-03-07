<?php
namespace Api\Model\Entity;

class Associado extends \GORM\Model{

	private $id;						// Id de controle do associado
	private $nome;						// Nome do associado
	private $cpf;						// CPF do associado
	private $rg;						// RG do associado
	private $orgaoExpedidor;			// orgao expedidor do rg do associado
	private $nomePai;					// nome do pai do associado
	private $nomeMae;					// Nome da Mãe do Associado
	private $endereco;					// Endereço do Associado
	private $numero;					// Numero da casa do Assicoado
	private $bairro;					// Bairro do Associado
	private $cidade;					// Cidade do Associado
	private $cep;						// CEP do Associado
	private $telResidencial;			// Telefone Residencial
	private $telCelular;				// Telefone Celular
	private $telComercial;				// Telefone Comercial
	private $email;						// Email que sera usado para login
	private $senha;						// Senha para acesso do Associado
	private $profissao;					// Profissão do Associado
	private $nomeEmpresa;				// Nome da Empresa onde o Associado trabalha
	private $funcao;					// Cargo do Associado
	private $salario;					// Salário do Associado
	private $outraRenda;				// Se tem outra renda Boolean
	private $rendaExtra;				// Se tiver outra renda, de onde ela é
	private $estadoCivil;				// Estado Civil
	private $nomeConjuje;				// Se casado, Nome do Conjuje
	private $qtdeFilhos;				// Numero de filhos
	private $idadeFilhos;				// Idade dos filhos
	private $pessoasResidencia;			// Quantidade de pessoas na residencia
	private $qtasPessoasTrab;			// Quantas pessoas trabalhan na residencia
	private $rendaFamiliar;				// Renda Familiar
	private $planoSaude;				// Possui plano de saude Bool
	private $planoEmpresa;				// Nome da Empresa do Plano de Saúde
	private $tipoSangue;				// Tipo Sanguineo
	private $problemaSaude;				// Possui algum problema de saúde, se sim, descreva
	private $curso;						// Curso
	private $universidade;				// Nome da Universidade/Escola
	private $semestreCursando;			// Qual Semestre está Cursando
	private $aulaSabado;				// Possui Aula Sabado Boolean
	private $duracaoCurso;				// Qual Duração do curso
	private $rgm;						// RA do Associado
	private $valorMensalidade;			// Mensalidade da faculdade
	private $possuiBolsaFinCred;		// Possui Bolsa Financiamento ou Credito Estudantil Boolean
	private $porcBolsaFinCred;			// porcentagem da Bolsa Financeamento ou Credito Estudantil
	private $cursoUniversitario;		// Possui Curso Universitario Boolean
	private $cursoNome;					// Nome do Curso
	private $retidoFalta;				// Já foi retido por Falta Boolean
	private $retidoMaisUmAno;			// Já foi retido mais de um ano letivo Boolean
	private $desistiuCursarAnoLetivo;	// já desistiu de cursar o primeiro ano letivo? Boolean
	private $createAt;					// Quando o cadastro foi Criado
	private $updateAt;					// Quando o cadastro foi atualizado
	private $status;					// Se o cadastro está ativo ou não
	private $usuario_id;				// Chave estrangeira
	private $veiculo_id;				// Chave estrangeira que ligará o usuario a sua linha



	// adiciona uma instancia desta classe na classe GORM/MODEL
	public function __construct($data = []){
		isset($data['id']) ? $this->id = $data['id'] : $this->id = null;
		isset($data['nome']) ? $this->nome = $data['nome'] : $this->nome = null;
		isset($data['cpf']) ? $this->cpf = $data['cpf'] : $this->cpf = null;
		isset($data['rg']) ? $this->rg = $data['rg'] : $this->rg = null;
		isset($data['orgaoExpedidor']) ? $this->orgaoExpedidor = $data['orgaoExpedidor'] : $this->orgaoExpedidor = null;
		isset($data['nomePai']) ? $this->nomePai = $data['nomePai'] : $this->nomePai = null;
		isset($data['nomeMae']) ? $this->nomeMae = $data['nomeMae'] : $this->nomeMae = null;
		isset($data['endereco']) ? $this->endereco = $data['endereco'] : $this->endereco = null;
		isset($data['numero']) ? $this->numero = $data['numero'] : $this->numero = null;
		isset($data['bairro']) ? $this->bairro = $data['bairro'] : $this->bairro = null;
		isset($data['cidade']) ? $this->cidade = $data['cidade'] : $this->cidade = null;
		isset($data['cep']) ? $this->cep = $data['cep'] : $this->cep = null;
		isset($data['telResidencial']) ? $this->telResidencial = $data['telResidencial'] : $this->telResidencial = null;
		isset($data['telCelular']) ? $this->telCelular = $data['telCelular'] : $this->telCelular = null;
		isset($data['telComercial']) ? $this->telComercial = $data['telComercial'] : $this->telComercial = null;
		isset($data['email']) ? $this->email = $data['email'] : $this->email = null;
		isset($data['profissao']) ? $this->profissao = $data['profissao'] : $this->profissao = null;
		isset($data['nomeEmpresa']) ? $this->nomeEmpresa = $data['nomeEmpresa'] : $this->nomeEmpresa = null;
		isset($data['funcao']) ? $this->funcao = $data['funcao'] : $this->funcao = null;
		isset($data['salario']) ? $this->salario = $data['salario'] : $this->salario = null;
		isset($data['outraRenda']) ? $this->outraRenda = $data['outraRenda'] : $this->outraRenda = null;
		isset($data['rendaExtra']) ? $this->rendaExtra = $data['rendaExtra'] : $this->rendaExtra = null;
		isset($data['estadoCivil']) ? $this->estadoCivil = $data['estadoCivil'] : $this->estadoCivil = null;
		isset($data['nomeConjuje']) ? $this->nomeConjuje = $data['nomeConjuje'] : $this->nomeConjuje = null;
		isset($data['qtdeFilhos']) ? $this->qtdeFilhos = $data['qtdeFilhos'] : $this->qtdeFilhos = null;
		isset($data['idadeFilhos']) ? $this->idadeFilhos = $data['idadeFilhos'] : $this->idadeFilhos = null;
		isset($data['pessoasResidencia']) ? $this->pessoasResidencia = $data['pessoasResidencia'] : $this->pessoasResidencia = null;
		isset($data['qtasPessoasTrab']) ? $this->qtasPessoasTrab = $data['qtasPessoasTrab'] : $this->qtasPessoasTrab = null;
		isset($data['rendaFamiliar']) ? $this->rendaFamiliar = $data['rendaFamiliar'] : $this->rendaFamiliar = null;
		isset($data['planoSaude']) ? $this->planoSaude = $data['planoSaude'] : $this->planoSaude = null;
		isset($data['planoEmpresa']) ? $this->planoEmpresa = $data['planoEmpresa'] : $this->planoEmpresa = null;
		isset($data['tipoSangue']) ? $this->tipoSangue = $data['tipoSangue'] : $this->tipoSangue = null;
		isset($data['problemaSaude']) ? $this->problemaSaude = $data['problemaSaude'] : $this->problemaSaude = null;
		isset($data['curso']) ? $this->curso = $data['curso'] : $this->curso = null;
		isset($data['universidade']) ? $this->universidade = $data['universidade'] : $this->universidade = null;
		isset($data['semestreCursando']) ? $this->semestreCursando = $data['semestreCursando'] : $this->semestreCursando = null;
		isset($data['aulaSabado']) ? $this->aulaSabado = $data['aulaSabado'] : $this->aulaSabado = null;
		isset($data['duracaoCurso']) ? $this->duracaoCurso = $data['duracaoCurso'] : $this->duracaoCurso = null;
		isset($data['rgm']) ? $this->rgm = $data['rgm'] : $this->rgm = null;
		isset($data['valorMensalidade']) ? $this->valorMensalidade = $data['valorMensalidade'] : $this->valorMensalidade = null;
		isset($data['possuiBolsaFinCred']) ? $this->possuiBolsaFinCred = $data['possuiBolsaFinCred'] : $this->possuiBolsaFinCred = null;
		isset($data['porcBolsaFinCred']) ? $this->porcBolsaFinCred = $data['porcBolsaFinCred'] : $this->porcBolsaFinCred = null;
		isset($data['cursoUniversitario']) ? $this->cursoUniversitario = $data['cursoUniversitario'] : $this->cursoUniversitario = null;
		isset($data['cursoNome']) ? $this->cursoNome = $data['cursoNome'] : $this->cursoNome = null;
		isset($data['retidoFalta']) ? $this->retidoFalta = $data['retidoFalta'] : $this->retidoFalta = null;
		isset($data['retidoMaisUmAno']) ? $this->retidoMaisUmAno = $data['retidoMaisUmAno'] : $this->retidoMaisUmAno = null;
		isset($data['desistiuCursarAnoLetivo']) ? $this->desistiuCursarAnoLetivo = $data['desistiuCursarAnoLetivo'] : $this->desistiuCursarAnoLetivo = null;
		isset($data['createAt']) ? $this->createAt = $data['createAt'] : $this->createAt = null;
		isset($data['updateAt']) ? $this->updateAt = $data['updateAt'] : $this->updateAt = null;
		isset($data['status']) ? $this->status = $data['status'] : $this->status = null;
		isset($data['senha']) ? $this->senha = md5($data['senha']) : $this->senha = null;
		isset($data['veiculo_id']) ? $this->veiculo_id = $data['veiculo_id'] : $this->veiculo_id = null;
		isset($data['usuario_id']) ? $this->usuario_id = $data['usuario_id'] : $this->usuario_id = null;
		$this->class = $this;
	}

	public function __get($attr){
		return $this->$attr;

	}
	public function __set($attr, $value){
		$this->$attr = $value;
	}

/**
 * Converte esta classe em um array
 * @return Array 
 */
	public function toArray(){

		$array = array(
			"id"	=>	$this->id,
			"nome"	=>	$this->nome,
			"cpf"	=>	$this->cpf,
			"rg"	=>	$this->rg,
			"orgaoExpedidor"	=>	$this->orgaoExpedidor,
			"nomePai"	=>	$this->nomePai,
			"nomeMae"	=>	$this->nomeMae,
			"endereco"	=>	$this->endereco,
			"numero"	=>	$this->numero,
			"bairro"	=>	$this->bairro,
			"cidade"	=>	$this->cidade,
			"cep"	=>	$this->cep,
			"telResidencial"	=>	$this->telResidencial,
			"telCelular"	=>	$this->telCelular,
			"telComercial"	=>	$this->telComercial,
			"email"	=>	$this->email,
			"profissao"	=>	$this->profissao,
			"nomeEmpresa"	=>	$this->nomeEmpresa,
			"funcao"	=>	$this->funcao,
			"salario"	=>	$this->salario,
			"outraRenda"	=>	$this->outraRenda,
			"rendaExtra"	=>	$this->rendaExtra,
			"estadoCivil"	=>	$this->estadoCivil,
			"nomeConjuje"	=>	$this->nomeConjuje,
			"qtdeFilhos"	=>	$this->qtdeFilhos,
			"idadeFilhos"	=>	$this->idadeFilhos,
			"pessoasResidencia"	=>	$this->pessoasResidencia,
			"qtasPessoasTrab"	=>	$this->qtasPessoasTrab,
			"rendaFamiliar"	=>	$this->rendaFamiliar,
			"planoSaude"	=>	$this->planoSaude,
			"planoEmpresa"	=>	$this->planoEmpresa,
			"tipoSangue"	=>	$this->tipoSangue,
			"problemaSaude"	=>	$this->problemaSaude,
			"curso"	=>	$this->curso,
			"universidade"	=>	$this->universidade,
			"semestreCursando"	=>	$this->semestreCursando,
			"aulaSabado"	=>	$this->aulaSabado,
			"duracaoCurso"	=>	$this->duracaoCurso,
			"rgm"	=>	$this->rgm,
			"valorMensalidade"	=>	$this->valorMensalidade,
			"possuiBolsaFinCred"	=>	$this->possuiBolsaFinCred,
			"porcBolsaFinCred"	=>	$this->porcBolsaFinCred,
			"cursoUniversitario"	=>	$this->cursoUniversitario,
			"cursoNome"	=>	$this->cursoNome,
			"retidoFalta"	=>	$this->retidoFalta,
			"retidoMaisUmAno"	=>	$this->retidoMaisUmAno,
			"desistiuCursarAnoLetivo"	=>	$this->desistiuCursarAnoLetivo,
			"createAt"	=>	$this->createAt,
			"updateAt"	=>	$this->updateAt,
			"status"	=>	$this->status,
			"senha"		=>  $this->senha,
			"usuario_id"		=>  $this->usuario_id,
			"veiculo_id"		=>  $this->veiculo_id
			);
		// faz com que não se retorne valores nulos no array
		$temp = $array;
		foreach ($array as $key => $value) {
			if($value == null){
				unset($temp[$key]);
			}
		}
		return $temp;
	}

}
