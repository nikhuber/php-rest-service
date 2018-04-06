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
        $ticket->ticketCode = self::generateTicketCode();
        $ticket->ticketHolderName = $ticketDto->getTicketHolderName();
        $ticket->eventId = $ticketDto->getEventId();
        $ticket->eventName = $ticketDto->getEventName();
        // Persist entity
        $this->ticketRepository->save($ticket);
        // Return Dto with Id
        $ticketDto->setTicketId($ticket->getId());
        $ticketDto->setTicketCode($ticket->ticketCode);
        return $ticketDto;
    }

    public function getAll()
    {
        return $this->ticketRepository->findAll();
    }

    public function getTicketById(String $id): TicketDto
    {
        $ticket = $this->ticketRepository->findBy($id);
        $ticketDto = new TicketDto();
        $ticketDto->setTicketId($ticket->getId());
        $ticketDto->setTicketCode($ticket->ticketCode);
        $ticketDto->setTicketHolderName($ticket->ticketHolderName);
        $ticketDto->setEventId($ticket->eventId);
        $ticketDto->setEventName($ticket->eventName);
        return $ticketDto;
    }

    public function generateTicketCode(): int
    {
        // Implement some fancy generation algorithm here
        return rand(100000,999999);
    }
}