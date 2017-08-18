<?php
namespace Api\Model\Entity;
use TicketMessage;
class Ticket extends \GORM\Model{
    public $idTicket;
    public $assuntoTicket;
    public $descricaoTicket;
    public $ownerTicket;
    public $statusTicket;
    public $createAtTicket;
    public $updateAtTicket;
    public $closedAtTicket;
    private $messages;

    /**
     * Carrega as informações das mensagens deste ticket
     *
     * @return void
     */
    public function getMessages(){
        $message = \Api\Model\Entity\TicketMessage()::getInstance();
        $message->makeSelect()->where("fkTicket=".$this->idTicket);
        $collection = $message->execute();
        $this->messages = $collection->getAll();
    }
}