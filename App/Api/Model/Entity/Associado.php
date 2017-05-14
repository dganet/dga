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
			case 'senha':
                $this->$attr = md5($value);
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

    public function __toString(){
        return var_dump($this->toArray());
    }
    
}