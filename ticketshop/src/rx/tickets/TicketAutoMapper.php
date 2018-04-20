<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 09.04.18
 * Time: 09:16
 */
declare(strict_types=1);


namespace Rx\Tickets;

use Rx\Tickets\Interfaces\Dto\TicketDto;
use Rx\Tickets\Domain\Model\Ticket;
use AutoMapperPlus\Configuration\AutoMapperConfig;
use AutoMapperPlus\AutoMapper;

class TicketAutoMapper
{

    private $autoMapper;

    public function __construct()
    {
        $config = new AutoMapperConfig();

        $config
            ->registerMapping(Ticket::class, TicketDto::class)
            ->reverseMap();
        $this->autoMapper = new AutoMapper($config);
    }

    public function getTicketEntity(TicketDto $ticketDto)
    {
        return $this->autoMapper->map($ticketDto, Ticket::class);
    }

    public function getTicketDto(Ticket $ticket)
    {
        return $this->autoMapper->map($ticket, TicketDto::class);
    }



}