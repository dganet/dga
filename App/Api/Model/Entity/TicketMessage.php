<?php
namespace Api\Model\Entity;

class TicketMessage extends \GORM\Model{
    public $idTicketMessage;
    public $mensagemTicketMessage;
    public $isAssoc;
    public $fkTicket;
    public $idRemetente;
    public $createAtTicket;
}