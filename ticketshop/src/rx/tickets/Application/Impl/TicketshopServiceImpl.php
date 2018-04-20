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
use Rx\Tickets\Interfaces\Dto\TicketDto;
use Rx\Tickets\Domain\Model\TicketRepository;
use Rx\Tickets\TicketAutoMapper;

class TicketshopServiceImpl implements TicketshopService
{
    private $ticketAutoMapper;
    private $ticketRepository;

    public function __construct(TicketRepository $ticketRepository, TicketAutoMapper $ticketAutoMapper)
    {
        $this->ticketRepository = $ticketRepository;
        $this->ticketAutoMapper = $ticketAutoMapper;
    }

    public function createTicket(TicketDto $ticketDto): TicketDto
    {
        $ticket = $this->ticketAutoMapper->getTicketEntity($ticketDto);
        $ticket->setTicketCode($this->generateTicketCode());
        $this->ticketRepository->save($ticket);

        $ticketDto = $this->ticketAutoMapper->getTicketDto($ticket);
        return $ticketDto;
    }

    public function getAll()
    {
        return $this->ticketRepository->findAll();
    }

    public function getTicketById(String $id): TicketDto
    {
        $ticket = $this->ticketRepository->findByTicketId($id);
        $ticketDto = $this->ticketAutoMapper->getTicketDto($ticket);
        return $ticketDto;
    }

    public function generateTicketCode(): int
    {
        // Implement some fancy generation algorithm here
        return rand(100000,999999);
    }
}