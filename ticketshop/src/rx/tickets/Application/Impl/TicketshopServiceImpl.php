<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 05.04.18
 * Time: 10:58
 */
declare(strict_types=1);

namespace Rx\Tickets\Application\Impl;

use Rx\Tickets\Application\TicketshopService;
use Rx\Tickets\Domain\Model\Ticket;
use Rx\Tickets\Domain\Model\TicketRepository;

class TicketshopServiceImpl implements TicketshopService
{
    private $ticketRepository;

    public function __construct(TicketRepository $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
    }

    public function createTicket(Ticket $ticket): Ticket
    {
        $ticket->setTicketCode($this->generateTicketCode());
        $this->ticketRepository->save($ticket);
        return $ticket;
    }

    public function getAll(): array
    {
        return $this->ticketRepository->findAll();
    }

    public function getTicketById(String $id): Ticket
    {
        return $this->ticketRepository->findByTicketId($id);
    }

    public function generateTicketCode(): int
    {
        // Implement some fancy generation algorithm here
        return rand(100000,999999);
    }
}