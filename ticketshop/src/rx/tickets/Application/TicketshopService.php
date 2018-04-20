<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 20.04.18
 * Time: 15:19
 */

namespace Rx\Tickets\Application;

use Rx\Tickets\Interfaces\Dto\TicketDto;

interface TicketshopService
{
    public function createTicket(TicketDto $ticketDto): TicketDto;

    public function getAll();

    public function getTicketById(String $id): TicketDto;

}