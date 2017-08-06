<?php
namespace Api\Model\Entity;
use \Api\Model\Entity\Imagem;

class Associado extends \GORM\Model{
    
    public $id;						// Id de controle do associado
    public $nome;						// Nome do associado
    public $cpf;						// CPF do associado
    public $rg;						// RG do associado
    public $orgaoExpedidor;			// orgao expedidor do rg do associado
    public $nomePai;					// nome do pai do associado
    public $nomeMae;					// Nome da Mãe do Associado
    public $endereco;					// Endereço do Associado
    public $numero;					// Numero da casa do Assicoado
    public $bairro;					// Bairro do Associado
    public $cidade;					// Cidade do Associado
    public $cep;						// CEP do Associado
    public $telResidencial;			// Telefone Residencial
    public $telCelular;				// Telefone Celular
    public $telComercial;				// Telefone Comercial
    public $email;						// Email que sera usado para login
    public $senha;						// Senha para acesso do Associado
    public $profissao;					// Profissão do Associado
    public $nomeEmpresa;				// Nome da Empresa onde o Associado trabalha
    public $funcao;					// Cargo do Associado
    public $salario;					// Salário do Associado
    public $outraRenda;				// Se tem outra renda Boolean
    public $rendaExtra;				// Se tiver outra renda, de onde ela é
    public $rendaSerial;				// Serialização de informações da renda;
    public $estadoCivil;				// Estado Civil
    public $nomeConjuje;				// Se casado, Nome do Conjuje
    public $qtdeFilhos;				// Numero de filhos
    public $idadeFilhos;				// Idade dos filhos
    public $pessoasResidencia;			// Quantidade de pessoas na residencia
    public $qtasPessoasTrab;			// Quantas pessoas trabalhan na residencia
    public $rendaFamiliar;				// Renda Familiar
    public $planoSaude;				// Possui plano de saude Bool
    public $qualPlano; 				// Nome do Plano
    public $planoEmpresa;				// Nome da Empresa do Plano de Saúde
    public $tipoSangue;				// Tipo Sanguineo
    public $problemaSaude;				// Possui algum problema de saude? Boolean
    public $quaisProblemas; 			// Quais problemas de saúde
    public $curso;						// Curso id
    public $universidade;				// Nome da Universidade/Escola
    public $semestreCursando;			// Qual Semestre está Cursando
    public $aulaSabado;				// Possui Aula Sabado Boolean
    public $duracaoCurso;				// Qual Duração do curso
    public $rgm;						// RA do Associado
    public $valorMensalidade;			// Mensalidade da faculdade
    public $possuiBolsaFinCred;		// Possui Bolsa Financiamento ou Credito Estudantil Boolean
    public $porcBolsaFinCred;			// porcentagem da Bolsa Financeamento ou Credito Estudantil
    public $cursoUniversitario;		// Possui Curso Universitario Boolean
    public $cursoNome;					// Nome do Curso
    public $retidoFalta;				// Já foi retido por Falta Boolean
    public $retidoMaisUmAno;			// Já foi retido mais de um ano letivo Boolean
    public $desistiuCursarAnoLetivo;	// já desistiu de cursar o primeiro ano letivo? Boolean
    public $porQueDesistiu; 			// Por que desistiu
    public $createAt;					// Quando o cadastro foi Criado
    public $updateAt;					// Quando o cadastro foi atualizado
    public $status;					// Se o cadastro está ativo ou não
    public $usuario_id;				// Chave estrangeira
    public $veiculo_id;				// Chave estrangeira que ligará o usuario a sua linha
    public $imagem_id;					// Id da Imagem
    public $documento;                 //Campo que recebe o array com os documentos
    public $foto;                      //Campo responsável pela foto do associado
    /**
     * Des serializa uma informação do objeto
     *
     * @return void
     */
    public function desSerialize(){
        $this->documento = unserialize($this->documento);
        $this->rendaSerial= unserialize($this->rendaSerial);
    }
    /**
     * Gera renda perCapta do associado 
     *
     * @return void
     */
    public function getRendaPerCapta(){
        if (!is_array($this->rendaSerial)){
            $this->desSerialize();
        }
        $perCapta = null;
        foreach ($this->rendaSerial as $key => $value) {
            $perCapta +=  $value['rendaParentesco'];
        }
        $this->rendaSerial['rendaPercapta'] = ($this->salario+$perCapta)/(count($this->rendaSerial)+1);
    }
    /**
     * Executa antes de ser salvo
     *
     * @return void
     */
    public function beforeSave(){
        $this->createAt = date('Y-m-d H:i:s');
        $this->documento = serialize($this->documento);
        $this->rendaSerial= serialize($this->rendaSerial);
    }
}