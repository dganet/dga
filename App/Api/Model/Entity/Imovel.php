<?php
namespace Api\Model\Entity;

class Imovel extends \GORM\Model{
    private $idImovel;
    private $tipoOperacaoImovel;
    private $enderecoImovel;
    private $bairroImovel;
    private $cidadeImovel;
    private $iptuImovel;
    private $condominioImovel;
    private $idadeConstricaoImovel;
    private $valorLocacaoImovel;
    private $valorVendaImovel;
    private $condicoesPagamentoImovel;
    private $tipoImovel;
    private $dormitorioImovel;
    private $suiteImovel;
    private $copaImovel;
    private $garagemCobertaImovel;
    private $areaTerrenoImovel;
    private $banheiroImovel;
    private $salaJantarImovel;
    private $mobiliadoImovel;
    private $areaContruidaImovel;
    private $outrosDadosImovel;
    private $elevadorImovel;
    private $areaUtilImovel;
    private $andaresImovel;
    private $areaTotalImovel;
    private $fkProprietario;
    private $fkGaleria;
    private $statusImovel;
    private $createAtImovel;
    private $updateAtImovel;
    /**
     * Metodo Construtor
     * 
     * @param mixed $data
     */
    public function __construct($data = []){
        foreach ($data as $key => $value) {
            $this->__set($key,$value);
        }
        $this->class = $this;
    }
    /**
     * Metodo Setter
     * 
     * @param String $attr
     * @param String $value
     */
    public function __set($attr, $value){
        $this->$attr = $value;
    }
    /**
     * Metodo Getters 
     * 
     * @param String $attr
     * @return String
     */
    public function __get($attr){
        switch ($attr) {
            case 'Proprietario':
                $proprietario = new Proprietario();
                $proprietario = $proprietario->find($this->fkProprietario);
                return $proprietario;
                break;
            default:
                return $this->$attr;
                break;
        }
    }
    /**
     * Converte o Objeto para um array
     * 
     * @return void
     */
    public function toArray(): Array {
        $temp =  array(
            'idImovel' => $this->__get('idImovel'),
            'tipoOperacaoImovel' => __get('tipoOperacaoImovel'),
            'enderecoImovel' => $this->__get('enderecoImovel'),
            'bairroImovel' => $this->__get('bairroImovel'),
            'cidadeImovel' => $this->__get('cidadeImovel'),
            'iptuImovel' => $this->__get('iptuImovel'), 
            'condominioImovel' => $this->__get('condominioImovel'),
            'idadeConstricaoImovel' => $this->__get('idadeConstricaoImovel'),
            'valorLocacaoImovel' => $this->__get('valorLocacaoImovel'),
            'valorVendaImovel' => $this->__get('valorVendaImovel'),
            'condicoesPagamentoImovel' => $this->__get('condicoesPagamentoImovel'),
            'tipoImovel' => $this->__get('tipoImovel'),
            'dormitorioImovel' => $this->__get('dormitorioImovel'),
            'suiteImovel' => $this->__get('suiteImovel'),
            'copaImovel' => $this->__get('copaImovel'),
            'garagemCobertaImovel' => $this->__get('garagemCobertaImovel'),
            'areaTerrenoImovel' => $this->__get('areaTerrenoImovel'),
            'banheiroImovel' => $this->__get('banheiroImovel'),
            'salaJantarImovel' => $this->__get('salaJantarImovel'),
            'mobiliadoImovel' => $this->__get('mobiliadoImovel'),
            'areaContruidaImovel' => $this->__get('areaContruidaImovel'),
            'outrosDadosImovel' => $this->__get('outrosDadosImovel'),
            'elevadorImovel' => $this->__get('elevadorImovel'),
            'areaUtilImovel' => $this->__get('areaUtilImovel'),
            'andaresImovel' => $this->__get('andaresImovel'),
            'areaTotalImovel' => $this->__get('areaTotalImovel'),
            'fkProprietario' => $this->__get('fkProprietario'),
            'fkGaleria' => $this->__get('fkGaleria'),
            'statusImovel' => $this->__get('statusImovel'),
            'createAtImovel' => $this->__get('createAtImovel'),
            'updateAtImovel' => $this->__get('updateAtImovel')       
        );
        foreach ($temp as $key => $value) {
            if($value == null){
                unset($temp[$key]);
            }
        }
        return $temp;
    }
    /**
     * Retorna os valores das propriedades da classe
     * 
     * @return string
     */
    public function __toString(){
        return var_dump($this->toArray());
    }
    
}