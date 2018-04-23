<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 05.04.18
 * Time: 11:20
 */

namespace Rx\Tickets\Domain\Model;

interface TicketRepository
{
    public function save(Ticket $ticket);

    public function findAll();

    public function findByTicketId(string $id): Ticket;
}