<?php
namespace Api\Controller;
use \Api\Model\Entity\Ticket;
use \Api\Model\Entity\TicketMessage;
class TicketController{

    public function cadastrar($data = []){
        $ticket = new Ticket($data);
        $ticket->createAt = date('Y-m-d H:i:s');
        return $ticket->save();
    }
    public function newMessage($data = []){
        $ticket = new TicketMessage($data);
        $ticket->createAt = date('Y-m-d H:i:s');
        return $ticket->save();
    }
	public function listaTudo(){
        $ticket = new Ticket();
        return $ticket->select(array('where' => array('statusTicket' => 'ATIVO')));
    }
	public function listaPorId($id){
         $ticket = new Ticket();
        return $ticket->select(array('where' => array('idTicket' => $id)));
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