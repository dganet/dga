<?php
namespace Api\Model\Entity;
use \Api\Model\Entity\Imagem;

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
    private $rendaSerial;				// Serialização de informações da renda;
    private $estadoCivil;				// Estado Civil
    private $nomeConjuje;				// Se casado, Nome do Conjuje
    private $qtdeFilhos;				// Numero de filhos
    private $idadeFilhos;				// Idade dos filhos
    private $pessoasResidencia;			// Quantidade de pessoas na residencia
    private $qtasPessoasTrab;			// Quantas pessoas trabalhan na residencia
    private $rendaFamiliar;				// Renda Familiar
    private $planoSaude;				// Possui plano de saude Bool
    private $qualPlano; 				// Nome do Plano
    private $planoEmpresa;				// Nome da Empresa do Plano de Saúde
    private $tipoSangue;				// Tipo Sanguineo
    private $problemaSaude;				// Possui algum problema de saude? Boolean
    private $quaisProblemas; 			// Quais problemas de saúde
    private $curso;						// Curso id
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
    private $porQueDesistiu; 			// Por que desistiu
    private $createAt;					// Quando o cadastro foi Criado
    private $updateAt;					// Quando o cadastro foi atualizado
    private $status;					// Se o cadastro está ativo ou não
    private $usuario_id;				// Chave estrangeira
    private $veiculo_id;				// Chave estrangeira que ligará o usuario a sua linha
    private $imagem_id;					// Id da Imagem
    
    
    // adiciona uma instancia desta classe na classe GORM/MODEL
    public function __construct($data = []){
        foreach ($data as $key => $value) {
			$this->__set($key, $value);
        }

        /*
        isset($data['id']) ? $this->id = $data['id'] : $this->id = null;
        isset($data['foto']) ? $this->foto = $data['foto'] : $this->foto = null;
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
        isset($data['rendaSerial']) ? $this->rendaSerial = $data['rendaSerial'] : $this->rendaSerial = null;
        isset($data['veiculo_id']) ? $this->veiculo_id = $data['veiculo_id'] : $this->veiculo_id = null;
        isset($data['usuario_id']) ? $this->usuario_id = $data['usuario_id'] : $this->usuario_id = null;
        isset($data['qualPlano']) ? $this->qualPlano = $data['qualPlano'] : $this->qualPlano = null;
        isset($data['quaisProblemas']) ? $this->quaisProblemas = $data['quaisProblemas'] : $this->quaisProblemas = null;
        isset($data['porQueDesistiu']) ? $this->porQueDesistiu = $data['porQueDesistiu'] : $this->porQueDesistiu = null;*/
        $this->class = $this;
    }
    
    public function __get($attr){
        return $this->$attr;   
    }
    public function __set($attr, $value){
        switch ($attr) {
			case 'foto':
				$this->$attr = $value;	
				break;
			
			default:
				$this->$attr = $value;
				break;
		}
    }
    
    /**
    * Converte esta classe em um array
    * @return Array
    */
    public function toArray(){
        
        $array = array(
        "id"	=>	$this->__get('id'),
        "imagem_id"  =>  $this->__get('foto'),
        "nome"	=>	$this->__get('nome'),
        "cpf"	=>	$this->__get('cpf'),
        "rg"	=>	$this->__get('rg'),
        "orgaoExpedidor"	=>	$this->__get('orgaoExpedidor'),
        "nomePai"	=>	$this->__get('nomePai'),
        "nomeMae"	=>	$this->__get('nomeMae'),
        "endereco"	=>	$this->__get('endereco'),
        "numero"	=>	$this->__get('numero'),
        "bairro"	=>	$this->__get('bairro'),
        "cidade"	=>	$this->__get('cidade'),
        "cep"	=>	$this->__get('cep'),
        "telResidencial"	=>	$this->__get('telResidencial'),
        "telCelular"	=>	$this->__get('telCelular'),
        "telComercial"	=>	$this->__get('telComercial'),
        "email"	=>	$this->__get('email'),
        "profissao"	=>	$this->__get('profissao'),
        "nomeEmpresa"	=>	$this->__get('nomeEmpresa'),
        "funcao"	=>	$this->__get('funcao'),
        "salario"	=>	$this->__get('salario'),
        "outraRenda"	=>	$this->__get('outraRenda'),
        "rendaExtra"	=>	$this->__get('rendaExtra'),
        "estadoCivil"	=>	$this->__get('estadoCivil'),
        "nomeConjuje"	=>	$this->__get('nomeConjuje'),
        "qtdeFilhos"	=>	$this->__get('qtdeFilhos'),
        "idadeFilhos"	=>	$this->__get('idadeFilhos'),
        "pessoasResidencia"	=>	$this->__get('pessoasResidencia'),
        "qtasPessoasTrab"	=>	$this->__get('qtasPessoasTrab'),
        "rendaFamiliar"	=>	$this->__get('rendaFamiliar'),
        "rendaSerial"					=> $this->__get('rendaSerial'),
        "planoSaude"	=>	$this->__get('planoSaude'),
        "planoEmpresa"	=>	$this->__get('planoEmpresa'),
        "tipoSangue"	=>	$this->__get('tipoSangue'),
        "problemaSaude"	=>	$this->__get('problemaSaude'),
        "curso"	=>	$this->__get('curso'),
        "universidade"	=>	$this->__get('universidade'),
        "semestreCursando"	=>	$this->__get('semestreCursando'),
        "aulaSabado"	=>	$this->__get('aulaSabado'),
        "duracaoCurso"	=>	$this->__get('duracaoCurso'),
        "rgm"	=>	$this->__get('rgm'),
        "valorMensalidade"	=>	$this->__get('valorMensalidade'),
        "possuiBolsaFinCred"	=>	$this->__get('possuiBolsaFinCred'),
        "porcBolsaFinCred"	=>	$this->__get('porcBolsaFinCred'),
        "cursoUniversitario"	=>	$this->__get('cursoUniversitario'),
        "cursoNome"	=>	$this->__get('cursoNome'),
        "retidoFalta"	=>	$this->__get('retidoFalta'),
        "retidoMaisUmAno"	=>	$this->__get('retidoMaisUmAno'),
        "desistiuCursarAnoLetivo"	=>	$this->__get('desistiuCursarAnoLetivo'),
        "createAt"	=>	$this->__get('createAt'),
        "updateAt"	=>	$this->__get('updateAt'),
        "status"	=>	$this->__get('status'),
        "senha"		=>  $this->__get('senha'),
        "usuario_id"		=>  $this->__get('usuario_id'),
        "veiculo_id"		=>  $this->__get('veiculo_id'),
        "quaisProblemas"		=>  $this->__get('quaisProblemas'),
        "qualPlano"		=>  $this->__get('qualPlano'),
        "porQueDesistiu" => $this->__get('porQueDesistiu')
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