<?php
namespace Api/Model/Entity;

class Ordem extends \GORM\Model{

  /**
   * Codigo da O.S
   * @var int
   */
  private $cod;
  /**
   * Codigo do Assinante
   * @var int
   */
  private $codAssinante;
  /**
   * Tipo de serviço contratado
   * @var String
   */
  private $servico;
  /**
   * Bairro da O.S
   * @var String
   */
  private $setor;
  /**
   * Tipo da conexão do cliente
   * @var String
   */
  private $tipo;
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
  private $tecnico;
  /**
   * Status da O.S
   * @var String
   */
  private $status;
  /**
   * Problema principal da O.S
   * @var String
   */
  private $problemaPrincipal;
  /**
   * Descrição do Problema
   * @var String
   */
  private $descricaoProblema;
  /**
   * Data da Chegada da O.S no departamento
   * @var DateTime
   */
  private $dataEntrada;
  /**
   * Data de Vencimento
   * @var DateTime
   */
  private $dataVencimento;
  /**
   * Observação da O.S
   * @var String
   */
  private $obs;
  /**
   * Se o cara possui Wifi
   * @var Boolean
   */
  private $wifi;
  /**
   * Periodo da Execução da O.S
   * @var String
   */
  private $periodo;

  public function __construct($data = []){
    // Percorre o vetor para setar as informações no seu determinado atributo
    foreach ($data as $key => $value) {
      $attr = ucfirst($key);
      $this->set$attr($value);
    }
  }


    /**
     * Set the value of Codigo da O.S
     *
     * @param int cod
     *
     * @return self
     */
    public function setCod($cod)
    {
        $this->cod = $cod;

        return $this;
    }

    /**
     * Get the value of Codigo da O.S
     *
     * @return int
     */
    public function getCod()
    {
        return $this->cod;
    }

    /**
     * Set the value of Codigo do Assinante
     *
     * @param int codAssinante
     *
     * @return self
     */
    public function setCodAssinante($codAssinante)
    {
        $this->codAssinante = $codAssinante;

        return $this;
    }

    /**
     * Get the value of Codigo do Assinante
     *
     * @return int
     */
    public function getCodAssinante()
    {
        return $this->codAssinante;
    }

    /**
     * Set the value of Tipo de serviço contratado
     *
     * @param String servico
     *
     * @return self
     */
    public function setServico(String $servico)
    {
        $this->servico = $servico;

        return $this;
    }

    /**
     * Get the value of Tipo de serviço contratado
     *
     * @return String
     */
    public function getServico()
    {
        return $this->servico;
    }

    /**
     * Set the value of Bairro da O.S
     *
     * @param String setor
     *
     * @return self
     */
    public function setSetor(String $setor)
    {
        $this->setor = $setor;

        return $this;
    }

    /**
     * Get the value of Bairro da O.S
     *
     * @return String
     */
    public function getSetor()
    {
        return $this->setor;
    }

    /**
     * Set the value of Tipo da conexão do cliente
     *
     * @param String tipo
     *
     * @return self
     */
    public function setTipo(String $tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get the value of Tipo da conexão do cliente
     *
     * @return String
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of Data da realização da O.S
     *
     * @param DateTime dataRealizacao
     *
     * @return self
     */
    public function setDataRealizacao(DateTime $dataRealizacao)
    {
        $this->dataRealizacao = $dataRealizacao;

        return $this;
    }

    /**
     * Get the value of Data da realização da O.S
     *
     * @return DateTime
     */
    public function getDataRealizacao()
    {
        return $this->dataRealizacao;
    }

    /**
     * Set the value of Data de Abertura
     *
     * @param DataTime dataAbertura
     *
     * @return self
     */
    public function setDataAbertura(DataTime $dataAbertura)
    {
        $this->dataAbertura = $dataAbertura;

        return $this;
    }

    /**
     * Get the value of Data de Abertura
     *
     * @return DataTime
     */
    public function getDataAbertura()
    {
        return $this->dataAbertura;
    }

    /**
     * Set the value of Nome do Tecnico
     *
     * @param String tecnico
     *
     * @return self
     */
    public function setTecnico(String $tecnico)
    {
        $this->tecnico = $tecnico;

        return $this;
    }

    /**
     * Get the value of Nome do Tecnico
     *
     * @return String
     */
    public function getTecnico()
    {
        return $this->tecnico;
    }

    /**
     * Set the value of Status da O.S
     *
     * @param String status
     *
     * @return self
     */
    public function setStatus(String $status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of Status da O.S
     *
     * @return String
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of Problema principal da O.S
     *
     * @param String problemaPrincipal
     *
     * @return self
     */
    public function setProblemaPrincipal(String $problemaPrincipal)
    {
        $this->problemaPrincipal = $problemaPrincipal;

        return $this;
    }

    /**
     * Get the value of Problema principal da O.S
     *
     * @return String
     */
    public function getProblemaPrincipal()
    {
        return $this->problemaPrincipal;
    }

    /**
     * Set the value of Descrição do Problema
     *
     * @param String descricaoProblema
     *
     * @return self
     */
    public function setDescricaoProblema(String $descricaoProblema)
    {
        $this->descricaoProblema = $descricaoProblema;

        return $this;
    }

    /**
     * Get the value of Descrição do Problema
     *
     * @return String
     */
    public function getDescricaoProblema()
    {
        return $this->descricaoProblema;
    }

    /**
     * Set the value of Data da Chegada da O.S no departamento
     *
     * @param DateTime dataEntrada
     *
     * @return self
     */
    public function setDataEntrada(DateTime $dataEntrada)
    {
        $this->dataEntrada = $dataEntrada;

        return $this;
    }

    /**
     * Get the value of Data da Chegada da O.S no departamento
     *
     * @return DateTime
     */
    public function getDataEntrada()
    {
        return $this->dataEntrada;
    }

    /**
     * Set the value of Data de Vencimento
     *
     * @param DateTime dataVencimento
     *
     * @return self
     */
    public function setDataVencimento(DateTime $dataVencimento)
    {
        $this->dataVencimento = $dataVencimento;

        return $this;
    }

    /**
     * Get the value of Data de Vencimento
     *
     * @return DateTime
     */
    public function getDataVencimento()
    {
        return $this->dataVencimento;
    }

    /**
     * Set the value of Observação da O.S
     *
     * @param String obs
     *
     * @return self
     */
    public function setObs(String $obs)
    {
        $this->obs = $obs;

        return $this;
    }

    /**
     * Get the value of Observação da O.S
     *
     * @return String
     */
    public function getObs()
    {
        return $this->obs;
    }

    /**
     * Set the value of Se o cara possui Wifi
     *
     * @param Boolean wifi
     *
     * @return self
     */
    public function setWifi(Boolean $wifi)
    {
        $this->wifi = $wifi;

        return $this;
    }

    /**
     * Get the value of Se o cara possui Wifi
     *
     * @return Boolean
     */
    public function getWifi()
    {
        return $this->wifi;
    }

    /**
     * Set the value of Periodo da Execução da O.S
     *
     * @param String periodo
     *
     * @return self
     */
    public function setPeriodo(String $periodo)
    {
        $this->periodo = $periodo;

        return $this;
    }

    /**
     * Get the value of Periodo da Execução da O.S
     *
     * @return String
     */
    public function getPeriodo()
    {
        return $this->periodo;
    }

    public function toArray()
    {
      return array(
        "codOrdem"          => $this->getCod(),
        "codAssinante"      => $this->getCodAssinante(),
        "servico"           => $this->getServico(),
        "setor"             => $this->getSetor(),
        "tipo"              => $this->getTipo(),
        "dataRealizacao"    => $this->getDataRealizacao(),
        "dataAbertura"      => $this->getDataAbertura(),
        "tecnico"           => $this->getTecnico(),
        "status"            => $this->getStatus(),
        "problemaPrincipal" => $this->getProblemaPrincipal(),
        "descricaoProblema" => $this->getDescricaoProblema(),
        "dataEntrada"       => $this->getDataEntrada(),
        "dataVencimento"    => $this->getDataVencimento(),
        "obs"               => $this->getObs(),
        "wifi"              => $this->getWifi(),
        "periodo"           => $this->getPeriodo()
      );
    }

}
