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
		isset($data['usuario_id']) ? $this->usuario_id = $data['usuario_id'] : $this->usuario_id = null;
		$this->class = $this;
	}

	public function __get($attr){
		switch ($attr) {
			case 'id':
			return $this->id;
				break;
			case 'nome':
			return $this->nome;
				break;
			case 'cpf':
			return $this->cpf;
				break;
			case 'rg':
			return $this->rg;
				break;
			case 'orgaoExpedidor':
			return $this->orgaoExpedidor;
				break;
			case 'nomePai':
			return $this->nomePai;
				break;
			case 'nomeMae':
			return $this->nomeMae;
				break;
			case 'endereco':
			return $this->endereco;
				break;
			case 'numero':
			return $this->numero;
				break;
			case 'bairro':
			return $this->bairro;
				break;
			case 'cidade':
			return $this->cidade;
				break;
			case 'cep':
			return $this->cep;
				break;
			case 'telResidencial':
			return $this->telResidencial;
				break;
			case 'telCelular':
			return $this->telCelular;
				break;
			case 'telComercial':
			return $this->telComercial;
				break;
			case 'email':
			return $this->email;
				break;
			case 'profissao':
			return $this->profissao;
				break;
			case 'nomeEmpresa':
			return $this->nomeEmpresa;
				break;
			case 'funcao':
			return $this->funcao;
				break;
			case 'salario':
			return $this->salario;
				break;
			case 'outraRenda':
			return $this->outraRenga;
				break;
			case 'rendaExtra':
			return $this->rendaExtra;
				break;
			case 'estadoCivil':
			return $this->estadoCivil;
				break;
			case 'nomeConjuje':
			return $this->nomeConjuje;
				break;
			case 'qtdeFilhos':
			return $this->qtdeFilhos;
				break;
			case 'idadeFilhos':
			return $this->idadeFilhos;
				break;
			case 'pessoasResidencia':
			return $this->pessoasResidencia;
				break;
			case 'qtasPessoasTrab':
			return $this->qtasPessoasTrab;
				break;
			case 'rendaFamiliar':
			return $this->rendaFamiliar;
				break;
			case 'planoSaude':
			return $this->planoSaude;
				break;
			case 'planoEmpresa':
			return $this->planoEmpresa;
				break;
			case 'tipoSangue':
			return $this->tipoSangue;
				break;
			case 'problemaSaude':
			return $this->problemaSaude;
				break;
			case 'curso':
			return $this->curso;
				break;
			case 'universidade':
			return $this->universidade;
				break;
			case 'semestreCursando':
			return $this->semestreCursando;
				break;
			case 'aulaSabado':
			return $this->aulaSabado;
				break;
			case 'duracaoCurso':
			return $this->duracaoCurso;
				break;
			case 'rgm':
			return $this->rgm;
				break;
			case 'valorMensalidade':
			return $this->valorMensalidade;
				break;
			case 'possuiBolsaFinCred':
			return $this->possuiBolsaFinCred;
				break;
			case 'porcBolsaFinCred':
			return $this->porcBolsaFinCred;
				break;
			case 'cursoUniversitario':
			return $this->cursoUniversitario;
				break;
			case 'cursoNome':
			return $this->cursoNome;
				break;
			case 'retidoFalta':
			return $this->retidoFalta;
				break;
			case 'retidoMaisUmAno':
			return $this->retidoMaisUmAno;
				break;
			case 'desistiuCursarAnoLetivo':
			return $this->desistiuCursarAnoLetivo;
				break;
			case 'createAt':
			return $this->createAt;
				break;
			case 'updateAt':
			return $this->updateAt;
				break;
			case 'status':
			return $this->status;
				break;
			case 'senha':
			return $this->senha;
				break;
			case 'usuario_id':
			return $this->usuario_id;
				break;
			
			default:
				# code...
				break;
		}

	}
	public function __set($attr, $value){
		switch ($attr) {
			case 'id':
			$this->id = $value;
				break;
			case 'nome':
			$this->nome = $value;
				break;
			case 'cpf':
			$this->cpf = $value;
				break;
			case 'rg':
			$this->rg = $value;
				break;
			case 'orgaoExpedidor':
			$this->orgaoExpedidor = $value;
				break;
			case 'nomePai':
			$this->nomePai = $value;
				break;
			case 'nomeMae':
			$this->nomeMae = $value;
				break;
			case 'endereco':
			$this->endereco = $value;
				break;
			case 'numero':
			$this->numero = $value;
				break;
			case 'bairro':
			$this->bairro = $value;
				break;
			case 'cidade':
			$this->cidade = $value;
				break;
			case 'cep':
			$this->cep = $value;
				break;
			case 'telResidencial':
			$this->telResidencial = $value;
				break;
			case 'telCelular':
			$this->telCelular = $value;
				break;
			case 'telComercial':
			$this->telComercial = $value;
				break;
			case 'email':
			$this->email = $value;
				break;
			case 'profissao':
			$this->profissao = $value;
				break;
			case 'nomeEmpresa':
			$this->nomeEmpresa = $value;
				break;
			case 'funcao':
			$this->funcao = $value;
				break;
			case 'salario':
			$this->salario = $value;
				break;
			case 'outraRenda':
				$this->outraRenda = $values;
				break;
			case 'rendaExtra':
			$this->rendaExtra = $value;
				break;
			case 'estadoCivil':
			$this->estadoCivil = $value;
				break;
			case 'nomeConjuje':
			$this->nomeConjuje = $value;
				break;
			case 'qtdeFilhos':
			$this->qtdeFilhos = $value;
				break;
			case 'idadeFilhos':
			$this->idadeFilhos = $value;
				break;
			case 'pessoasResidencia':
			$this->pessoasResidencia = $value;
				break;
			case 'qtasPessoasTrab':
			$this->qtasPessoasTrab = $value;
				break;
			case 'rendaFamiliar':
			$this->rendaFamiliar = $value;
				break;
			case 'planoSaude':
			$this->planoSaude = $value;
				break;
			case 'planoEmpresa':
			$this->planoEmpresa = $value;
				break;
			case 'tipoSangue':
			$this->tipoSangue = $value;
				break;
			case 'problemaSaude':
			$this->problemaSaude = $value;
				break;
			case 'curso':
			$this->curso = $value;
				break;
			case 'universidade':
			$this->universidade = $value;
				break;
			case 'semestreCursando':
			$this->semestreCursando = $value;
				break;
			case 'aulaSabado':
			$this->aulaSabado = $value;
				break;
			case 'duracaoCurso':
			$this->duracaoCurso = $value;
				break;
			case 'rgm':
			$this->rgm = $value;
				break;
			case 'valorMensalidade':
			$this->valorMensalidade = $value;
				break;
			case 'possuiBolsaFinCred':
			$this->possuiBolsaFinCred = $value;
				break;
			case 'porcBolsaFinCred':
			$this->porcBolsaFinCred = $value;
				break;
			case 'cursoUniversitario':
			$this->cursoUniversitario = $value;
				break;
			case 'cursoNome':
			$this->cursoNome = $value;
				break;
			case 'retidoFalta':
			$this->retidoFalta = $value;
				break;
			case 'retidoMaisUmAno':
			$this->retidoMaisUmAno = $value;
				break;
			case 'desistiuCursarAnoLetivo':
			$this->desistiuCursarAnoLetivo = $value;
				break;
			case 'createAt':
			$this->createAt = $value;
				break;
			case 'updateAt':
			$this->updateAt = $value;
				break;
			case 'status':
			$this->status = $value;
				break;
			case 'senha':
			$this->senha = md5($value);
				break;
			case 'usuario_id':
			$this->usuario_id = $value;
				break;
			default:
				# code...
				break;
		}

	}

	//METODO QUE TEM QUE SER IMPLEMENTADO PARA QUE O GORM FUNCTIONE CORRETAMENTE
	public function toArray(){
		
		return array(
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
			"usuario_id"		=>  $this->usuario_id
			);
	}

}