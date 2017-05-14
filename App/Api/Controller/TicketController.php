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
        var_dump($ticket->idRemetente);
        $ticket->createAt = date('Y-m-d H:i:s');
        return $ticket->save();
    }
    public function listaMessage($id){
        $ticket = new TicketMessage();
        $message = $ticket->select(array('where' => array('fkTicket' => $id)));
        var_dump($message);
        
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