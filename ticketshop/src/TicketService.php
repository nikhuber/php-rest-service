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
use AutoMapperPlus\Configuration\AutoMapperConfig;
use AutoMapperPlus\AutoMapper;
use AutoMapperPlus\MappingOperation\Operation;

class TicketService
{

    private $autoMapper;
    private $ticketRepository;

    public function __construct(TicketRepositoryInterface $ticketRepository)
    {
        $this->ticketRepository = $ticketRepository;
        $config = new AutoMapperConfig();

        $config
            ->registerMapping(Ticket::class, TicketDto::class)
            ->forMember('ticketId', Operation::fromProperty('id'))
            ->reverseMap()
            ->forMember('id', Operation::fromProperty('ticketId'));
        $this->autoMapper = new AutoMapper($config);

    }

    public function createTicket(TicketDto $ticketDto): TicketDto
    {
        // Create new ticket entity and map Dto
        $ticket = $this->autoMapper->map($ticketDto, Ticket::class);
        $ticket->setTicketCode($this->generateTicketCode());
        // Persist entity
        $this->ticketRepository->save($ticket);
        // Convert back to DTO and return
        $ticketDto = $this->autoMapper->map($ticket, TicketDto::class);
        return $ticketDto;
    }

    public function getAll()
    {
        return $this->ticketRepository->findAll();
    }

    public function getTicketById(String $id): TicketDto
    {
        $ticket = $this->ticketRepository->findBy($id);
        $ticketDto = $this->autoMapper->map($ticket, TicketDto::class);
        return $ticketDto;
    }

    public function generateTicketCode(): int
    {
        // Implement some fancy generation algorithm here
        return rand(100000,999999);
    }
}