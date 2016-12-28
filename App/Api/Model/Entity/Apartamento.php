<?php
namespace App\Model\Entity;

class Apartamento extends \GORM\Model{
	private $idApartamento;
	private $dormitorio;
	private $suite;
	private $elevador;
	private $mobiliado;
	private $areaUtil;
	private $vagasGaragem;
	private $kitinet;
	private $banheiro;
	private $andares;
	private $areaTotal;
	private $outrosDados;

	public function __construct($data = []){
		isset($data['idApartamento']) : $this->idApartamento = $data['idApartamento'] ? $this->idApartamento = null;
		isset($data['dormitorio']) : $this->dormitorio = $data['dormitorio'] ? $this->dormitorio = null;
		isset($data['suite']) : $this->suite = $data['suite'] ? $this->suite = null;
		isset($data['elevador']) : $this->elevador = $data['elevador'] ? $this->elevador = null;
		isset($data['mobiliado']) : $this->mobiliado = $data['mobiliado'] ? $this->mobiliado = null;
		isset($data['areaUtil']) : $this->areaUtil = $data['areaUtil'] ? $this->areaUtil = null;
		isset($data['vagasGaragem']) : $this->vagasGaragem = $data['vagasGaragem'] ? $this->vagasGaragem = null;
		isset($data['kitinet']) : $this->kitinet = $data['kitinet'] ? $this->kitinet = null;
		isset($data['banheiro']) : $this->banheiro = $data['banheiro'] ? $this->banheiro = null;
		isset($data['andares']) : $this->andares = $data['andares'] ? $this->andares = null;
		isset($data['areaTotal']) : $this->areaTotal = $data['areaTotal'] ? $this->areaTotal = null;
		isset($data['outrosDados']) : $this->outrosDados = $data['outrosDados'] ? $this->outrosDados = null;
		$this->class = $this;
	}

	public function __set($attr, $value){
		switch ($attr) {
			case 'idApartamento':
				$this->idApartamento = $value;
				break;
			case 'dormitorio':
				$this->dormitorio = $value;
				break;
			case 'suite':
				$this->suite = $value;
				break;
			case 'elevador':
				$this->elevador = $value;
				break;
			case 'mobiliado':
				$this->mobiliado = $value;
				break;
			case 'areaUtil':
				$this->areaUtil = $value;
				break;
			case 'vagasGaragem':
				$this->vagasGaragem = $value;
				break;
			case 'kitinet':
				$this->kitinet = $value;
				break;
			case 'banheiro':
				$this->banheiro = $value;
				break;
			case 'andares':
				$this->andares = $value;
				break;
			case 'areaTotal':
				$this->areaTotal = $value;
				break;
			case 'outrosDados':
				$this->outrosDados = $value;
				break;
			

			default:
				# code...
				break;
		}
	}
	public function __get($attr){
		switch ($attr) {
			case 'idApartamento':
				return $this->idApartamento;
				break;
			case 'dormitorio':
				return $this->dormitorio;
				break;
			case 'suite':
				return $this->suite;
				break;
			case 'elevador':
				return $this->elevador;
				break;
			case 'mobiliado':
				return $this->mobiliado;
				break;
			case 'areaUtil':
				return $this->areaUtil;
				break;
			case 'vagasGaragem':
				return $this->vagasGaragem;
				break;
			case 'kitinet':
				return $this->kitinet;
				break;
			case 'banheiro':
				return $this->banheiro;
				break;
			case 'andares':
				return $this->andares;
				break;
			case 'areaTotal':
				return $this->areaTotal;
				break;
			case 'outrosDados':
				return $this->outrosDados;
				break;
			
			default:
				# code...
				break;
		}
	}

	public function toArray(){
        return array(
            "idApartamento" =>  $this->idApartamento,
            "dormitorio"    =>  $this->dormitorio,
            "suite"         =>  $this->suite,
            "elevador"      =>  $this->elevador,
            "mobiliado"     =>  $this->mobiliado,
            "areaUtil"      =>  $this->areaUtil,
            "vagasGaragem"  =>  $this->vagasGaragem,
            "kitinet"       =>  $this->kitinet,
            "banheiro"      =>  $this->banheiro,
            "andares"       =>  $this->andares,
            "areaTotal"     =>  $this->areaTotal,
            "outrosDados"   =>  $this->outrosDados
            );
    }
}