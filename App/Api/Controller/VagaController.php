<?php
namespace Api\Controller;
use \Api\Model\Entity\Vaga, \Api\Model\Entity\Veiculo;
class VagaController{

    public function listaTudo($request, $response, $args){
        $veiculo = Veiculo::getInstance();
        $veiculo->makeSelect("destino, vagasDisponiveis");
        $data = $veiculo->execute(true);
        $universidade = [];
        foreach ($data as $key => $value) {
              $value['destino'] = unserialize($value['destino']);
              $data[$key] = $value;
        }
        $universidade = $this->getUniversidadesArray($data);
        return $response->WithJson($universidade);
    }

    public function getUniversidadesArray($data){
        $uni=[];
        foreach ($data as $key => $value) {
            foreach ($value['destino'] as $keys => $destino) {    
                if(!array_key_exists($destino['nome'], $uni)){
                    $uni[$destino['nome']] = $value['vagasDisponiveis'];
                }else{
                    $uni[$destino['nome']] += $value['vagasDisponiveis'];
                }
            }
        }
        return $uni;
    }
}