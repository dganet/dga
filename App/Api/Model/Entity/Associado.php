<?php
namespace Api\Model\Entity;
use \Api\Model\Entity\Imagem;

class Associado extends \GORM\Model{

    public $id;                      
    public $rg;                      
    public $nome;                    
    public $cpf;                     
    public $orgaoExpedidor;          
    public $nomePai;                 
    public $nomeMae;                 
    public $endereco;                
    public $numero;                  
    public $bairro;                  
    public $cidade;                  
    public $cep;                     
    public $telResidencial;          
    public $telCelular;              
    public $telComercial;            
    public $email;                   
    public $profissao;               
    public $nomeEmpresa;             
    public $funcao;                  
    public $salario;                 
    public $outraRenda;              
    public $rendaExtra;              
    public $rendaSerial;             
    public $estadoCivil;             
    public $nomeConjuje;             
    public $qtdeFilhos;              
    public $idadeFilhos;             
    public $pessoasResidencia;       
    public $qtasPessoasTrab;         
    public $rendaFamiliar;           
    public $planoSaude;              
    public $qualPlano;               
    public $planoEmpresa;            
    public $tipoSangue;              
    public $problemaSaude;           
    public $quaisProblemas;          
    public $semestreCursando;        
    public $aulaSabado;              
    public $duracaoCurso;            
    public $rgm;                     
    public $valorMensalidade;        
    public $possuiBolsaFinCred;      
    public $porcBolsaFinCred;        
    public $cursoUniversitario;      
    public $cursoNome;               
    public $retidoFalta;             
    public $retidoMaisUmAno;         
    public $desistiuCursarAnoLetivo; 
    public $porQueDesistiu;          
    public $senha;                   
    public $documento;               
    public $foto;                    
    public $createAt;                
    public $updateAt;                
    public $status;                  
    public $fkUniversidade;                          
    public $fkCursoFaculdade;                        

    public function getRendaPerCapta(){
        if (!is_array($this->rendaSerial)){
            $this->documento = unserialize($this->documento);
            $this->rendaSerial = unserialize($this->rendaSerial);
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
        $this->status = "AGUARDANDOVAGA";
        $this->createAt = date('Y-m-d H:i:s');
        $this->documento = serialize($this->documento);
        $this->rendaSerial= serialize($this->rendaSerial);
    }
    /**
     * Executa antes de atualizar
     *
     * @return void
     */
    public function beforeUpdate(){
       $this->documento = serialize($this->documento);
       $this->rendaSerial = serialize($this->rendaSerial);
    }
    /**
     * Executa depois do Select
     *
     * @return void
     */
    public function beforeCollection(){
        $this->documento = unserialize($this->documento);
        $this->rendaSerial = unserialize($this->rendaSerial);
        
    }
}