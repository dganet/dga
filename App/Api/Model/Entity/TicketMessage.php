<?php
namespace Api\Model\Entity;

class TicketMessage extends \GORM\Model{
    public $idTicketMessage;
    public $mensagemTicketMessage;
    public $isAssoc;
    public $idRemetente;
    public $createAtTicket;
}