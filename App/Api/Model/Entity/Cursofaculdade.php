<?php
namespace Api\Model\Entity;

class Cursofaculdade extends \GORM\Model {
	private $id;
	private $nome;
	private $createAt;
	private $updateAt;
	private $status;

	public function __construct($data = []){
		isset($data['id']) 				? $this-> setId( $data['id']) 			: $this->setId( null);
    isset($data['nome']) 				? $this-> setNome( $data['nome']) 			: $this->setNome( null);
    isset($data['createAt']) 				? $this-> setCreateAt( $data['createAt']) 			: $this->setCreateAt( null);
    isset($data['updateAt']) 				? $this-> setUpdateAt( $data['updateAt']) 			: $this->setUpdateAt( null);
    isset($data['status']) 				? $this-> setStatus( $data['status']) 			: $this->setStatus( null);
    $this->class = $this;
	}

	public function toArray(){
		$array = array(
			'id' => $this->getId(),
			'nome' => $this->getNome(),
			'createAt' => $this->getCreateAt(),
			'updateAt' => $this->getUpdateAt(),
			'status' => $this->getStatus()
			);
		// faz com que não se retorne valores nulos no array
		$temp = $array;
		foreach ($array as $key => $value) {
			if($value == null){
				unset($temp[$key]);
			}
		}
		return $temp;
	}

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Nome
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of Nome
     *
     * @param mixed nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of Create At
     *
     * @return mixed
     */
    public function getCreateAt()
    {
        return $this->createAt;
    }

    /**
     * Set the value of Create At
     *
     * @param mixed createAt
     *
     * @return self
     */
    public function setCreateAt($createAt)
    {
        $this->createAt = $createAt;

        return $this;
    }

    /**
     * Get the value of Update At
     *
     * @return mixed
     */
    public function getUpdateAt()
    {
        return $this->updateAt;
    }

    /**
     * Set the value of Update At
     *
     * @param mixed updateAt
     *
     * @return self
     */
    public function setUpdateAt($updateAt)
    {
        $this->updateAt = $updateAt;

        return $this;
    }

    /**
     * Get the value of Status
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of Status
     *
     * @param mixed status
     *
     * @return self
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

}
