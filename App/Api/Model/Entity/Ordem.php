<?php
namespace Api\Model\Entity;

class Ordem extends \GORM\Model{

  /**
   * Codigo da O.S
   * @var int
   */
  private $idOs;
  /**
   * Codigo do Assinante
   * @var int
   */
  private $codAssinante;
  /**
   * Tipo de serviço contratado
   * @var String
   */
  private $fkServico;
  /**
   * Bairro da O.S
   * @var String
   */
  private $setor;
  /**
   * Tipo da conexão do cliente
   * @var String
   */
  private $tipoInternet;
  /**
   * Data da realização da O.S
   * @var DateTime
   */
  private $dataRealizacao;
  /**
   * Data de Abertura
   * @var DataTime
   */
  private $dataAbertura;
  /**
   * Nome do Tecnico
   * @var String
   */
  private $fkTecnico;
  /**
   * Status da O.S
   * @var String
   */
  private $statusOrdem;
  /**
   * Problema principal da O.S
   * @var String
   */
  private $descProblema;
  /**
   * Descrição do Problema
   * @var String
   */
  private $fkProblema;
  /**
   * Data da Chegada da O.S no departamento
   * @var DateTime
   */
  private $dataRecebimento;
  private $fkBairro;
  private $nomeAssinante;
  private $protocolo;

  public function __construct($data = []){
       foreach ($data as $key => $value) {
            $this->__set($key,$value);
        }
        $this->class = $this;
  }

  public function __get($attr){
      return $this->$attr;
  }
  public function __set($attr, $values){
    $this->$attr = $values;
  }

    public function toArray()
    {
      return array(
        "protocolo"   => $this->__get("protocolo"),
        "codAssinante"      => $this->__get("codAssinante"),
        "nomeAssinante"   => $this->__get("nomeAssinante"),
        "fkServico"           => $this->__get("fkServico"),
        "fkBairro" => $this->__get("fkBairro"),
        "setor"             => $this->__get("setor"),
        "tipoInternet"              => $this->__get("tipoInternet"),
        "dataRealizacao"    => $this->__get("dataRealizacao"),
        "dataAbertura"      => $this->__get("dataAbertura"),
        "fkTecnico"           => $this->__get("fkTecnico"),
        "statusOrdem"            => $this->__get("statusOrdem"),
        "descProblema" => $this->__get("descProblema"),
        "fkProblema" => $this->__get("fkProblema"),
        "dataRecebimento"       => $this->__get("dataRecebimento"),
      );
    }
    public function __toString(){
        var_dump($this->toArray);
    }
}
