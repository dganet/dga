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
    /**
     * Retorna todos os associados que estão em um veiculo
     *
     * @param Request $request
     * @param Response $response
     * @param Mixed $args
     * @return mixed
     */
    public function AssociadoxVeiculo($request, $response, $args){
        $vaga = \Api\Model\Entity\Vaga::getInstance();
        $vaga->makeSelect("associado.nome")->inner('associado','associado.id = vaga.fkAssociado')
            ->where("vaga.fkVeiculo=".$args['idVeiculo'])->and("associado.status='ATIVO'");
        $collection = $vaga->execute(true);
        if($collection != null ){
            if($collection->lenth() > 0 ){
                $response->WithJson($collection->getAll());
            }
        }
    }
    /**
     * Verifica se há algum associado já cadastrado em uma vaga, se sim retorna true, se não retorna false
     *
     * @return boolean
     */
    public function checkAssociado($idAssociado){
        $vaga = \Api\Model\Entity\Vaga::getInstance();
        $vaga->makeSelect()->where("fkAssociado=".$idAssociado);
        $collection = $vaga->execute();
        if( $collection != null || $collection->lenght() > 0){
            return true;
        }else{
            return false;
        }

    }
    /**
     * Verifica se há algum associado já cadastrado em uma vaga, se sim retorna um objeto do tipo vaga, se não retorna false
     *
     * @return boolean
     */
    public static function getVagaByAssoc($idAssociado){
        $vaga = \Api\Model\Entity\Vaga::getInstance();
        $vaga->makeSelect()->where("fkAssociado=".$idAssociado);
        $collection = $vaga->execute(true);
        if( $collection != null ){
                return $collection;
        }else{
            return false;
        }

    }
}