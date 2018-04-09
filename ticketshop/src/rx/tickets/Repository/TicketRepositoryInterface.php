<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 05.04.18
 * Time: 11:20
 */

namespace Rx\Tickets\Repository;

use Rx\Tickets\Entity\Ticket;

interface TicketRepositoryInterface
{
    public function save(Ticket $ticket);

    public function findAll();

    public function findBy(String $id): Ticket;
}