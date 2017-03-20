<?php
namespace Api\Controller;
use \Api\Model\Entity\Site, 
\Api\Controller\AuditController as Audit,
\Api\Controller\ImageController;

class SiteController{

	public function cadastrar($data){
	if (isset($data['banner1'])){
            $img = ImageController::save($data['banner1']);
            $data['banner1'] = $img['id'];
        }
        if (isset($data['banner2'])){
            $img = ImageController::save($data['banner2']);
            $data['banner2'] = $img['id'];
        }
        if (isset($data['banner3'])){
            $img = ImageController::save($data['banner3']);
            $data['banner3'] = $img['id'];
        }
        $site = new Site($data);
		$site->createAt = date('Y-m-d H:i:s');
		Audit::audit($data, "INSERT", "site");
		return $site->save();	
	}	
	public function listaTudo(){
		$site = new Site();
		return $site->select(array('where' => array('status' => 'ATIVO')));
	}
	//Lita site pelo ID
	public function listaPorId($id){
		$site = new Site();
		return $site->select(array('where' => array('id' => $id)));
	}
	//Update de cadastro
	public function atulizaCadastro($data){
		$site = new Site($data);
		$site->updateAt =date('Y-m-d H:i:s');
		Audit::audit($data, "UPDATE", "site");
		return $site->update();
    }
}