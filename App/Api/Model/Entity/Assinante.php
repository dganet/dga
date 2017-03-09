<?
namespace Api\Model\Entity;

class Assinante extends \GORM\Model{

    /**
     * Codigo do Assinante
     * @var int
     */
    private $codAssinante;
    /**
     * Nome do Assinante
     * @var String
     */
    private $nomeAssinante;
    /**
     * Bairro do Assinante
     * @var String
     */
    private $bairroAssinante;
    /**
     * Metodo construtor da classe
     * @param Array $data informações
     */
    public function __construct($data = []){
      // Percorre o vetor para setar as informações no seu determinado atributo
      foreach ($data as $key => $value) {
        $attr = ucfirst($key);
        $this->set$attr($value);
      }
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
     * Set the value of Nome do Assinante
     *
     * @param String nomeAssinante
     *
     * @return self
     */
    public function setNomeAssinante(String $nomeAssinante)
    {
        $this->nomeAssinante = $nomeAssinante;

        return $this;
    }

    /**
     * Get the value of Nome do Assinante
     *
     * @return String
     */
    public function getNomeAssinante()
    {
        return $this->nomeAssinante;
    }
    /**
     * Set the value of Bairro do Assinante
     *
     * @param String bairroAssinante
     *
     * @return self
     */
    public function setBairroAssinante(String $bairroAssinante)
    {
        $this->bairroAssinante = $bairroAssinante;

        return $this;
    }

    /**
     * Get the value of Bairro do Assinante
     *
     * @return String
     */
    public function getBairroAssinante()
    {
        return $this->bairroAssinante;
    }

}
