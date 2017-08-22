<?php
namespace Api\Controller;
use \Api\Model\Entity\Vaga, \Api\Model\Entity\Veiculo;
class VagaController{
    /**
     * Lista todas as vagas disponiveis 
     *
     * @param [type] $request
     * @param [type] $response
     * @param [type] $args
     * @return void
     */
    public function listaTudo($request, $response, $args){
        return $response->WithJson($this->getVagas());
    }
    /**
     * Lista todos as vagas disponiveis e para qual faculdade
     *
     * @return void
     */
    public function getVagas(){
        $veiculo = Veiculo::getInstance();
        $veiculo->makeSelect("destino, vagasDisponiveis")->where("status='ATIVO'");
        $data = $veiculo->execute(true);
        $universidade = [];
        foreach ($data as $key => $value) {
              $value['destino'] = unserialize($value['destino']);
              $data[$key] = $value;
        }
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

    public function AssociadoxVeiculo($request, $response, $args){
        $vaga = \Api\Model\Entity\Vaga::getInstance();
        $vaga->makeSelect("associado.nome")->inner('associado','associado.id = vaga.fkAssociado')
            ->where("vaga.fkVeiculo=".$args['idVeiculo'])->and("associado.status='ATIVO'");
        $collection = $vaga->execute(true);
        var_dump($collection);
    }
}