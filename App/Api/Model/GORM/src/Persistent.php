<?php
namespace GORM;
use PDOException;
trait Persistent
{
    /**
     * Salva um objeto no banco de dados conforme as configurações
     * e caso a variavel lastId for true ele retorna o id da ultima inserção
     *
     * @param boolean $lastId
     * @return Mixed
     */
    public function save($lastId = false){
        // Mode de Desenvolvimento
        if($this->configuration['mode'] == 'devel'){
            /**
            * BEFORE SAVE
            */
            $this->beforeSave();
            try{
                $this->makeInsert();
                if (!$this::getConnection()->prepare($this->configuration['sql'])->execute()){
                    throw new Exception("Não foi possivel inserir a informação no banco de dados", 003);
                }else{
                    /**
                     * AFTER SAVE
                     */
                    $this->afterSave();
                    return [
                        'flag' => true, 
                        'message' => 'Dados inseridos no Banco de dados com sucesso!', 
                        'debug' => [
                            'sql' => $this->configuration['sql']
                            ],
                        'lastId' => $this::getConnection()->lastInsertId()
                        ];
                }
            }catch(PDOException $e){
                switch ($e->getCode()) {
                    case '42000':
                        echo "Erro de sintaxe : ". $this->configuration['sql'];
                        break;
                    default:
                        echo $e->getMessage()."<br>". $this->configuration['sql'];
                        break;
                }
            }
            //Modo de Produção
        }else if ($this->configuration['mode'] == 'production'){
            $this->beforeSave();
            try{
                $this->makeInsert();
                if (!$this::getConnection()->prepare($this->configuration['sql'])->execute()){
                    throw new Exception("Não foi possivel inserir a informação no banco de dados", 004);
                }else{
                    $this->afterSave();
                    return [
                        'flag' => true, 
                        'message' => 'Dados inseridos no Banco de dados com sucesso!'];
                }
            }catch(PDOException $e){
                switch ($e->getCode()) {
                    case '42000':
                        throw $e;
                        break;
                    default:
                        echo $e->getMessage();
                        break;
                }
            }
        }
    }
    /**
     * Gera query para fazer o update de um objeto especifico. O seu where é baseado no primaryKey 
     * por padrão ele é o campo id caso queira trocar o mesmo é so utilizar o metodo setPrimaryKey
     *
     * @return void
     */
    public function update(){
        // Modo de Desenvolvimento
        if ($this->configuration['mode'] == 'devel'){
            $this->beforeUpdate();
            try{
                $this->makeUpdate();
                if(!$this::getConnection()->prepare($this->configuration['sql'])->execute()){
                    throw new Exception("Não foi posivel fazer o update das informações", 005);
                }else{
                    $this->afterUpdate();
                    return [
                        'flag' => true,
                        'message' => 'Update efetuado com sucesso',
                        'debug' => $this->configuration['sql']
                    ];
                }
            }catch(PDOException $e){
                switch ($e->getCode()) {
                    case '42000':
                        echo "Erro de sintaxe : ". $this->configuration['sql'];
                        break;
                    default:
                        echo $e->getMessage()."<br>". $this->configuration['sql'];
                        break;
                }
            }
        // Modo de Produção
        }else if ($this->configuration['mode'] == 'production'){
            $this->beforeUpdate();
            try{
            $this->makeUpdate();
            if(!$this::getConnection()->prepare($this->configuration['sql'])->execute()){
                throw new Exception("Não foi posivel fazer o update das informações", 006);
            }else{
                $this->afterUpdate();
                return [
                    'flag' => true,
                    'message' => 'Update efetuado com sucesso'
                ];
            }
            }catch(PDOException $e){
                switch ($e->getCode()) {
                    case '42000':
                        throw $e;
                        break;
                    default:
                        echo $e->getMessage();
                        break;
                }
            }
        }
    }
    public function delete(){
        //$this->beforeDelete();
        
        // if ($this->configuration['mode'] == 'devel'){
        //     try{
                 $this->makeDelete();
        //         if(!$this::getConnection()->prepare($this->configuration['sql'])->execute()){
        //             throw new Exception("Não foi posivel deletar as informações", 005);
        //         }else{
        //             $this->afterDelete();
        //             return [
        //                 'flag' => true,
        //                 'message' => 'Delete efetuado com sucesso',
        //                 'debug' => $this->configuration['sql']
        //             ];
        //         }
        //     }catch(PDOException $e){
        //         switch ($e->getCode()) {
        //             case '42000':
        //                 echo "Erro de sintaxe : ". $this->configuration['sql'];
        //                 break;
        //             default:
        //                 echo $e->getMessage()."<br>". $this->configuration['sql'];
        //                 break;
        //         }
        //     }
        // }
    }
    /**
     * É executado antes de salvar uma informação no banco de dados e pode
     * ser sobrescrito quando necessário
     *
     * @return void
     */
    public function beforeSave(){
        $this->createAt = date('Y-m-d H:i:s');
    }
    /**
     * É executado depois de salvar uma informação no banco de dados e pode
     * ser sobrescrito quando necessário
     *
     * @return void
     */
    public function afterSave(){

    }
    /**
     * Executa antes de ser atualizado
     *
     * @return void
     */
    public function beforeUpdate(){
        $this->updateAt = date('Y-m-d H:i:s');
    }
    /**
     * Executa depois de ser atualizado
     *
     * @return void
     */
    public function afterUpdate(){
    }
}