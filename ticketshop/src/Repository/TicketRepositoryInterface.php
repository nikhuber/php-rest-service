<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 05.04.18
 * Time: 11:20
 */

namespace App\Repository;

use App\Entity\Ticket;

interface TicketRepositoryInterface
{
    public function save(Ticket $ticket);

    public function findAll();
}