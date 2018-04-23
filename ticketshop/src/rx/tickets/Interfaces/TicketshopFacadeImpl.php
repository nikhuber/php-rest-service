<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 05.04.18
 * Time: 09:59
 */
declare(strict_types=1);

namespace Rx\Tickets\Interfaces;

use Rx\Tickets\TicketAutoMapper;
use Rx\Tickets\Application\TicketshopService;
use Rx\Tickets\Interfaces\Dto\TicketDto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TicketshopFacadeImpl extends Controller implements TicketshopFacade
{

    private $ticketshopService;
    private $ticketAutoMapper;

    public function __construct(TicketshopService $ticketService, TicketAutoMapper $ticketAutoMapper)
    {
        $this->ticketshopService = $ticketService;
        $this->ticketAutoMapper = $ticketAutoMapper;
    }

    public function create(TicketDto $data): TicketDto
    {
        $ticket = $this->ticketAutoMapper->getTicketEntity($data);
        $this->ticketshopService->createTicket($ticket);
        $ticketDto = $this->ticketAutoMapper->getTicketDto($ticket);
        return $ticketDto;
    }

    public function getAll(): array
    {
        $ticketDtoList = [];

        foreach ($this->ticketshopService->getAll() as $ticket) {
            array_push($ticketDtoList, $this->ticketAutoMapper->getTicketDto($ticket));
        }

        return $ticketDtoList;
    }

    public function getTicketById(String $id): TicketDto
    {
        $ticket = $this->ticketshopService->getTicketById($id);
        $ticketDto = $this->ticketAutoMapper->getTicketDto($ticket);
        return $ticketDto;
    }

}