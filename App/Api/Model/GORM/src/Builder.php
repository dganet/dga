<?php
namespace GORM;
use Exception;
trait Builder{
    /**
     * Metodo responsável por criar as querys de inserção no banco de dados
     *
     * @return void
     */
    public function makeInsert(){
        $sql = "INSERT INTO ";
        $this->loadTable();
        $sql .= $this->configuration['table'];
        $chave = ' (';
        $valor = ' (';
        //Percorre o OBJETO pegando as propriedades para gerar o SQL
        foreach ($this as $key => $value) {
            //Se não fizer parte da variavel de configuração então ele lista as 
            //propriedades do Objeto
            if($key != 'configuration'){
                if(!empty($value)){
                    $value = addslashes($value);
                    $chave .= $key.",";
                    $valor .= "'".$value."',";
                }
            }
        }
        //Retira a ultima virgula das variaveis de valor e chave
        $chave = substr($chave,0, strlen($chave)-1);
        $chave .= ')';
        $valor = substr($valor,0, strlen($valor)-1);
        $valor .= ')';
        $sql .= $chave . " VALUES " . $valor;
        $this->configuration['sql'] = $sql;
    }
    /**
     * Gera uma query de update em um determinado Objeto, 
     * o seu where é por padrão no campo id (Primary Key), caso precise de um outro PK
     * deverá ser setado o novo pk com o metodo setPrimaryKey
     *
     * @return void
     */
    public function makeUpdate(){
        $sql = "UPDATE ";
        $this->loadTable();
        $sql .= $this->configuration['table']; 
        $sql .= " SET ";
        foreach ($this as $key => $value) {
            if($key != 'configuration'){
                if(!empty($value)){
                    $sql .= $key ."='". $value ."',";
                }
            }
        }
        $sql = substr($sql,0, strlen($sql)-1);
        $sql .= ' WHERE ';
        if(isset($this->configuration['primaryKey'])){
            $pk = $this->configuration['primaryKey'];
            // Verifica se o valor da PK é nulo ou vazio
            if (empty($this->$pk)){
                throw new Exception("Valor do campo ".$pk." não pode ser nulo ou vazio", 1);
            }else{
                $sql .= $pk ."=". $this->$pk;
            }
        }else{
            // Verifica se o valor do campo ID é nulo ou vazio
            if(empty($this->id)){
                throw new Exception("Valor do campo 'id' não pode ser nulo ou vazio", 1);
            }else{
                $sql .=  "id = ".$this->id;
            }
        }
        $this->configuration['sql'] = $sql;
    }
    /**
     * Gera o DELETE 
     *
     * @param String $options
     * @return void
     */
    public function makeDelete(){
        $this->loadTable();
        $sql = "DELETE FROM ".$this->configuration['table']." WHERE ";
        if(isset($this->configuration['primaryKey'])){
            $sql .= $this->configuration['primaryKey'];
        }else{
            $sql .= $this->id;
        }
        $this->configuration['sql'] = $sql;
    }
    /**
     * Cria uma parte do sql para fazer o select();
     * 
     * @return this
     */
    public function makeSelect($options = '*'){
        $sql = "SELECT $options FROM ";
        $this->loadTable();
        $sql .= $this->configuration['table'];
        $this->configuration['sql'] = $sql;
        return $this;
    }
    /**
     * Gera os campos que serão buscados, 
     * EX: SELECT $fields FROM $tabela
     *
     * @param String $options
     * @return this
     */
    public function fields($options){
        if (isset($this->configuration['sql'])){
            $sql = $this->configuration['sql'];
            $this->configuration['sql'] = str_replace('*', $options, $sql);   
        }
            return $this;   
    }
    /**
     * Gera os campos do WHERE
     *
     * @param String $options
     * @return this
     */
    public function where($options){
        if (isset($this->configuration['sql'])){
            $this->configuration['sql'] .=" WHERE ".  $options;      
        }
        return $this;
    }
    /**
     * Gera os campos AND
     *
     * @param String $options
     * @return This
     */
    public function and($options){
        if(isset($this->configuration['sql'])){
            $this->configuration['sql'] .= " AND ". $options;
        }
        return $this;
    }
    /**
     * Gera os campos do INNER JOIN
     *
     * @param String $options
     * @return void
     */
    public function inner($options,$op){
        if(isset($this->configuration['sql'])){
            $this->configuration['sql'] .= " INNER JOIN ".$options." ON ".$op;
        }
        return $this;
    }
    /**
     * Gera os campos do ORDER BY
     *
     * @param String $options
     * @return void
     */
    public function order($options){
        if(isset($this->configuration['sql'])){
            $this->configuration['sql'] .= " ORDER BY ".$options;
        }
        return $this;
    }
     /**
     * Gera os campos do GROUP BY
     *
     * @param String $options
     * @return void
     */
    public function group($options){
        if(isset($this->configuration['sql'])){
            $this->configuration['sql'] .= " GROUP BY ".$options;
        }
        return $this;
    }

    /**
     * Gera os campos do Like
     *
     * @param String $options
     * @return void
     */
    public function like($options){
        if(isset($this->configuration['sql'])){
            $this->configuration['sql'] .= " like '%".$options."%'";
        }
        return $this;
    }
}
