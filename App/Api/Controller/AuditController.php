<?php
namespace Api\Controller;

class AuditController{
	
	/**
	* @param Array $data
	*
		
	*/
	public static final function audit($data){
		$audit = new \Api\Model\Entity\Audit($data);
		$audit->setCreateAt(date("Y-m-d H:m:s"));
		$audit->save();
	}
}