<?php
namespace GORM;
use PDO, PDOException;
trait Finder{
    /**
     * Encontra uma tupla atraves do ID fornecido
     *
     * @param int $id
     * @return void
     */
    public function find($id, $needArray = false){
        $this->makeSelect()->where($this->configuration['primaryKey'].'='.$id);
        $stmt = $this->getConnection();
        $stmt = $stmt->prepare($this->configuration['sql']);
        $stmt->execute(); 
        $line = $stmt->fetch(PDO::FETCH_ASSOC);
        if($needArray){
            return $line;
        }else{
            $this->beforeSelect();
            $this->load($line);
            $this->afterSelect();
        }
    }
    /**
     * Executa a busca do Select que estiver na variavel this
     *
     * @return Collection
     */
    public function execute($needArray = false){
        try{
            $cls = get_called_class();
            $this->beforeSelect();
            $stmt = $this::getConnection()->prepare($this->configuration['sql']);
            $stmt->execute(); 
            $line = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $this->afterSelect();
            if($needArray){
                $this->beforeArray();
                return $line;
                $this->afterArray();
            }else{
                $collection = new \GORM\Collection\Collection();
                foreach ($line as $key => $value) {
                    $cls = new $cls();
                    $cls->load($value);
                    //Antes de adcionar na coleção 
                    $cls->beforeCollection();
                    $collection->add($cls);
                    //depois de adcionar da coleção
                    $cls->afterCollection();
                }
                return $collection;
            }
        }catch (PDOException $e){
            switch ($e->getCode()) {
                    case '42000':
                        echo "Erro de sintaxe : ". $this->configuration['sql'];
                        break;
                    default:
                        echo $e->getMessage()."<br>". $this->configuration['sql'];
                        break;
                }
        }
    }
    /**
     * Executado antes de adicionar o objeto na coleção
     * caso necessário devera ser reescrito 
     *
     * @return void
     */
    public function beforeCollection(){

    }
    /**
     * Executado depois do objeto ser adicionado na coleção
     * caso necessário devera ser reescrito 
     *
     * @return void
     */
    public function afterCollection(){

    }
    /**
     * Executa antes de fazer o select
     *
     * @return void
     */
   public function beforeSelect(){

   }
   /**
    * Executa depois de fazer o select
    *
    * @return void
    */
   public function afterSelect(){

   }
   /**
     * Executa antes de fazer o select
     *
     * @return void
     */
    public function beforeArray(){
        
    }
    /**
    * Executa depois de fazer o Array
    *
    * @return void
    */
    public function afterArray(){
        
    }
}