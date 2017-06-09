<?php 
namespace GORM;
use PDO;
trait Persistent
{
  /**
  *	Função para Salvar uma informação no banco de dados
  *	@return 	true ou fasle
  */
  public function save($lastId = false){
    self::loadTable();
    $sql  = $this->makeInsert();
    $con  = new ConnectionFactory($this->db);
    $db   = $con->getInstance();
    $stmt = $db->prepare($sql);
    if ($stmt->execute()){
      if ($lastId == true){
        return $db->lastInsertId();
      }else{
        return true;
      }
    }else{
      return false;
    }
    var_dump($sql);
    
  }
  /**
  *	Função para atualizar as informações no banco de dados
  * 	@param 		Parametro é atraves do objeto $this->class SQL será gerado conforme as informações neste obj
  * 	@return 	Objeto
  */
  public function update(){
    $this->loadTable();
    $sql                   = $this->makeUpdate($this->class);
    if (self::_getDebug()){
            print_r($sql);
    }else{
      $con                   = new ConnectionFactory($this->db);
      $db                    = $con->getInstance();
      $linha                 = $db->prepare($sql);
      return $linha->execute();
    }
  }
}