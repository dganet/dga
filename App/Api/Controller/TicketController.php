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
        return $ticket->select(array('where' => array('fkTicket' => $id)));
    }
	public function listaTudo(){
        $ticket = new Ticket();
        return $ticket->select(array('where' => array('statusTicket' => 'ATIVO')));
    }
	public function listaPorAssociado($id){
         $ticket = new Ticket();
        return $ticket->select(array('where' => array('fkAssociado' => $id)));
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