<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 05.04.18
 * Time: 10:58
 */
declare(strict_types=1);

namespace App;

use App\Dto\TicketDto;
use App\Entity\Ticket;
use App\Repository\TicketRepositoryInterface;

class TicketService
{

    protected $ticketRepository;

    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function createTicket(TicketDto $ticketDto): TicketDto
    {
        // Create new ticket entity and map Dto
        $ticket = new Ticket();
        $ticket->ticketCode = $ticketDto->getTicketId();
        $ticket->ticketHolderName = $ticketDto->getTicketHolderName();
        // Persist entity
        $this->ticketRepository->save($ticket);
        // Return Dto with Id
        $ticketDto->setTicketId($ticket->getId());
        return $ticketDto;
    }

}