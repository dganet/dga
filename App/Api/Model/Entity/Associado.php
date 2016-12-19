<?php
namespace Api\Model;

class Associado extends GORM\Model{
	
	private $id;					// Id de controle do associado	
	private $nome;					//Nome do associado
	private $cpf;					//CPF do associado
	private $rg;					//RG do associado
	private $orgaoExpedidor;					//orgao expedidor do rg do associado
	private $nomePai;				// nome do pai do associado
	private $nomeMae;				// Nome da Mãe do Associado
	private $endereco;				//Endereço do Associado
	private $numero;				//Numero da casa do Assicoado
	private $bairro;				//Bairro do Associado
	private $cidade;				//Cidade do Associado
	private $cep;					//CEP do Associado
	private $telResidencial;		// Telefone Residencial
	private $telCelular;			//Telefone Celular
	private $telComercial;			//Telefone Comercial
	private $email;					//Email que sera usado para login
	private $profissao;				//Profissão do Associado
	private $nomeEmpresa;			//Nome da Empresa onde o Associado trabalha
	private $funcao;				// Cargo do Associado
	private $salario;				// Salário do Associado
	private $outraRenda;			// Se tem outra renda Boolean
	private $rendaExtra;			// Se tiver outra renda, de onde ela é
	private $estadoCivil;			// Estado Civil
	private $nomeConjuje;			// Se casado, Nome do Conjuje
	private $qtdeFilhos;			// Numero de filhos
	private $idadeFilhos;			// Idade dos filhos
	private $pessoasResidencia;		// Quantidade de pessoas na residencia
	private $qtasPessoasTrab;		// Quantas pessoas trabalhan na residencia
	private $rendaFamiliar;			// Renda Familiar
	private $planoSaude;			// Possui plano de saude Bool
	private $planoEmpresa;			// Nome da Empresa do Plano de Saúde
	private $tipoSangue;			// Tipo Sanguineo
	private $problemaSaude;			// Possui algum problema de saúde, se sim, descreva
	private $curso;					// Curso 
	private $universidade;			// Nome da Universidade/Escola 
	private $semestreCursando;		// Qual Semestre está Cursando
	private $aulaSabado;			// Possui Aula Sabado Boolean
	private $duracaoCurso;			// Qual Duração do curso
	private $rgm;					// RA do Associado
	private $valorMensalidade;		// Mensalidade da faculdade
	private $possuiBolsaFinCred;	// Possui Bolsa Financiamento ou Credito Estudantil Boolean
	private $porcBolsaFinCred;		//porcentagem da Bolsa Financeamento ou Credito Estudantil
	private $cursoUniversitario;	//Possui Curso Universitario Boolean
	private $cursoNome;				// Nome do Curso
	private $retidoFalta;			// Já foi retido por Falta Boolean
	private $retidoMaisUmAno;		// Já foi retido mais de um ano letivo Boolean
	private $desistiuCursarAnoLetivo;	// já desistiu de cursar o primeiro ano letivo? Boolean
	

	
	// adiciona uma instancia desta classe na classe GORM/MODEL
	public function __construct(){

		$this->class = $this;
	}

	//METODO QUE TEM QUE SER IMPLEMENTADO PARA QUE O GORM FUNCTIONE CORRETAMENTE
	public function toArray(){
		
		return array();
	}

}