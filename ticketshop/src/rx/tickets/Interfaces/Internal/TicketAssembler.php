<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 09.04.18
 * Time: 09:16
 */
declare(strict_types=1);


namespace Rx\Tickets\Interfaces\Internal;

use Rx\Tickets\Interfaces\Dto\TicketDto;
use Rx\Tickets\Domain\Model\Ticket;

class TicketAssembler
{

    public static function getTicketDto(Ticket $ticket): TicketDto
    {
        $ticketDto = new TicketDto();
        $ticketDto->setTicketId($ticket->getTicketId());
        $ticketDto->setTicketCode($ticket->getTicketCode());
        $ticketDto->setTicketHolderName($ticket->getTicketHolderName());
        $ticketDto->setEventId($ticket->getEventId());
        $ticketDto->setEventName($ticket->getEventName());
        return $ticketDto;
    }

    public static function getTicketDtoAsList(array $tickets): array
    {
        $ticketDtoList = [];

        foreach ($tickets as $ticket) {
            array_push($ticketDtoList, TicketAssembler::getTicketDto($ticket));
        }

        return $ticketDtoList;
    }

}