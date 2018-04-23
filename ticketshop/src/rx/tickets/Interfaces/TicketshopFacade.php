<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 20.04.18
 * Time: 15:09
 */
declare(strict_types=1);

namespace Rx\Tickets\Interfaces;

use Rx\Tickets\Interfaces\Dto\TicketDto;

interface TicketshopFacade
{
    public function create(TicketDto $data): TicketDto;

    public function getAll(): array;

    public function getTicketById(String $id): TicketDto;
}