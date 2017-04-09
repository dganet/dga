<?php
namespace App\Model\Entity;

class Casa extends \App\Model\Model{

	private $idCasa;
	private $dormitorio;
	private $suite;
	private $copa;
	private $garagemCoberta;
	private $areaTerreno;
	private $banheiros;
	private $salaJantar;
	private $salaEstar;
	private $mobiliado;
	private $areaConstruida;
	private $outrosDados;

	public function __construct($data =[]){
		isset($data['idCasa']) : $this->idCasa = $data['idCasa'] ? $this->idCasa = null;
		isset($data['dormitorio']) : $this->dormitorio = $data['dormitorio'] ? $this->dormitorio = null;
		isset($data['suite']) : $this->suite = $data['suite'] ? $this->suite = null;
		isset($data['copa']) : $this->copa = $data['copa'] ? $this->copa = null;
		isset($data['garagemCoberta']) : $this->garagemCoberta = $data['garagemCoberta'] ? $this->garagemCoberta = null;
		isset($data['areaTerreno']) : $this->areaTerreno = $data['areaTerreno'] ? $this->areaTerreno = null;
		isset($data['banheiros']) : $this->banheiros = $data['banheiros'] ? $this->banheiros = null;
		isset($data['salaJantar']) : $this->salaJantar = $data['salaJantar'] ? $this->salaJantar = null;
		isset($data['salaEstar']) : $this->salaEstar = $data['salaEstar'] ? $this->salaEstar = null;
		isset($data['mobiliado']) : $this->mobiliado = $data['mobiliado'] ? $this->mobiliado = null;
		isset($data['areaConstruida']) : $this->areaConstruida = $data['areaConstruida'] ? $this->areaConstruida = null;
		isset($data['outrosDados']) : $this->outrosDados = $data['outrosDados'] ? $this->outrosDados = null;
		$this->class = $this;
	}

	public function __get($attr){
		switch ($attr) {
			case 'idCasa':
				return $this->idCasa;
				break;
			case 'dormitorio':
				return $this->dormitorio;
				break;
			case 'suite':
				return $this->suite;
				break;
			case 'copa':
				return $this->copa;
				break;
			case 'garagemCoberta':
				return $this->garagemCoberta;
				break;
			case 'areaTerreno':
				return $this->areaTerreno;
				break;
			case 'banheiros':
				return $this->banheiros;
				break;
			case 'salaJantar':
				return $this->salaJantar;
				break;
			case 'salaEstar':
				return $this->salaEstar;
				break;
			case 'mobiliado':
				return $this->mobiliado;
				break;
			case 'areaConstruida':
				return $this->areaConstruida;
				break;
			case 'outrosDados':
				return $this->outrosDados;
				break;
			
			default:
				# code...
				break;
		}
	}
	public function __set($attr, $value){
		switch ($attr) {
			case 'idCasa':
				$this->idCasa = $value;
				break;
			case 'dormitorio':
				$this->dormitorio = $value;
				break;
			case 'suite':
				$this->suite = $value;
				break;
			case 'copa':
				$this->copa = $value;
				break;
			case 'garagemCoberta':
				$this->garagemCoberta = $value;
				break;
			case 'areaTerreno':
				$this->areaTerreno = $value;
				break;
			case 'banheiros':
				$this->banheiros = $value;
				break;
			case 'salaJantar':
				$this->salaJantar = $value;
				break;
			case 'salaEstar':
				$this->salaEstar = $value;
				break;
			case 'mobiliado':
				$this->mobiliado = $value;
				break;
			case 'areaConstruida':
				$this->areaConstruida = $value;
				break;
			case 'outrosDados':
				$this->outrosDados = $value;
				break;
			
			default:
				# code...
				break;
		}

	public function toArray(){
        return array(
        	"idCasa"			=>  $this->idCasa,
            "dormitorio"        =>  $this->dormitorio,
            "suite"             =>  $this->suite,
            "copa"              =>  $this->copa,
            "garagemCoberta"    =>  $this->garagemCoberta,
            "areaTerreno"       =>  $this->areaTerreno,
            "banheiros"         =>  $this->banheiros,
            "salaJantar"        =>  $this->salaJantar,
            "salaEstar"         =>  $this->salaEstar,
            "mobiliado"         =>  $this->mobiliado,
            "areaConstruida"    =>  $this->areaConstruida,
            "outrosDados"       =>  $this->outrosDados
        );
    }

	}