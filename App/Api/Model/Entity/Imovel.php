<?php
namespace Api\Model\Entity;

class Imovel extends \GORM\Model{
    public $idImovel;
    public $tipoOperacaoImovel;
    public $enderecoImovel;
    public $bairroImovel;
    public $cidadeImovel;
    public $iptuImovel;
    public $condominioImovel;
    public $idadeConstrucaoImovel;
    public $valorLocacaoImovel;
    public $valorVendaImovel;
    public $condicoesPagamentoImovel;
    public $tipoImovel;
    public $dormitorioImovel;
    public $suiteImovel;
    public $copaImovel;
    public $garagemCobertaImovel;
    public $areaTerrenoImovel;
    public $banheiroImovel;
    public $salaJantarImovel;
    public $mobiliadoImovel;
    public $areaContruidaImovel;
    public $outrosDadosImovel;
    public $elevadorImovel;
    public $areaUtilImovel;
    public $andarImovel;
    public $areaTotalImovel;
    public $fkProprietario;
    public $fkGaleria;
    public $fkCarteiraImovel;
    public $statusImovel;
    public $createAtImovel;
    public $updateAtImovel;
    public $descricaoImovel;
    
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
    
}