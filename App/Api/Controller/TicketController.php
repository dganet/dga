<?php
namespace Api\Controller;
use \Api\Model\Entity\Ticket;
use \Api\Model\Entity\TicketMessage;
class TicketController{

    public function cadastrar($data = []){
        $ticket = new Ticket($data);
        $ticket->statusTicket = 'ATIVO';
        $ticket->createAtTicket = date('Y-m-d H:i:s');
        return $ticket->save();
    }
    public function newMessage($data = []){
        $ticket = new TicketMessage($data);
        $ticket->createAt = date('Y-m-d H:i:s');
        return $ticket->save();
    }
    public function listaMessage($id){
        $ticket = new TicketMessage();
        $message = $ticket->select(array('where' => array('fkTicket' => $id)));
        foreach ($message as $key => $value) {
            $ticket = $ticket->load($message[$key]);
            $message[$key]['idRemetente'] = $ticket->Remetente;
        }
        return $message;
    }
	public function listaTudo(){
        $ticket = new Ticket();
        return $ticket->select(array('where' => array('statusTicket' => 'ATIVO')));
    }
	public function listaPorAssociado($id){
         $ticket = new Ticket();
        return $ticket->select(array('where' => array('fkAssociado' => $id)));
    }
    //Lista os tickets ativos de todos associados;
    public function listaPorAssociadoAtivo(){
        $ticket = new Ticket();
        $ticket = $ticket->select(array('where' => array('statusTicket' => 'ATIVO')));
        $associado = new \Api\Model\Entity\Associado;
        foreach ($ticket as $key => $value) {
            $assoc[$key] =  $associado->load( (int) $ticket[$key]['fkAssociado']);
            $assoc[$key] = $assoc[$key][0];
            unset($assoc[$key][0]);
        }
        foreach ($assoc as $key => $value) {
            $check = $assoc[$key];
            foreach ($assoc as $keys => $values) {
                if($check['id'] == $assoc[$keys]['id']){
                    unset($assoc[$keys]);
                }
            }
             $assoc[$key] = $check;
        }
        return $assoc;
    }
	public function listaInativo(){
        
    }
	public function atulizaCadastro($data){
        $ticket = new Ticket($data);
        $ticket->updateAt = date('Y-m-d H:i:s');
        return $ticket->update();
    }
	public function inativar($id){
        $ticket = new Ticket($data);
        $ticket->closedAt = date('Y-m-d H:i:s');
        $ticket->statusTicket = 'INATIVO';
        return $ticket->save();
    }
}