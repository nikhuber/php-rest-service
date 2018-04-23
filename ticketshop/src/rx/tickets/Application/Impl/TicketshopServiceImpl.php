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

    public function createTicket(string $ticketHolderName, int $eventId, string $eventName): Ticket
    {
        $ticket = new Ticket($ticketHolderName, $eventId, $eventName);
        $this->ticketRepository->save($ticket);
        return $ticket;
    }

    public function getAll(): array
    {
        return $this->ticketRepository->findAll();
    }

    public function getTicketById(string $ticketId): ?Ticket
    {
        return $this->ticketRepository->findByTicketId($ticketId);
    }

}