<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 20.04.18
 * Time: 15:19
 */

namespace Rx\Tickets\Application;

use Rx\Tickets\Domain\Model\Ticket;

interface TicketshopService
{
    public function createTicket(string $ticketHolderName, int $eventId, string $eventName): Ticket;

    public function getAll(): array;

    public function getTicketById(string $ticketId): ?Ticket;

}