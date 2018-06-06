<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 05.04.18
 * Time: 09:59
 */
declare(strict_types=1);

namespace Rx\Tickets\Interfaces;

use Rx\Tickets\Application\TicketshopService;
use Rx\Tickets\Interfaces\Dto\TicketDto;
use Rx\Tickets\Interfaces\Internal\TicketAssembler;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TicketshopFacadeImpl extends Controller implements TicketshopFacade
{

    private $ticketshopService;

    public function __construct(TicketshopService $ticketService)
    {
        $this->ticketshopService = $ticketService;
    }

    public function create(TicketDto $data): TicketDto
    {
        $ticket = $this->ticketshopService->createTicket($data->getTicketHolderName(), $data->getEventId(), $data->getEventName());
        return TicketAssembler::getTicketDto($ticket);
    }

    public function getAll(): array
    {
        $tickets = $this->ticketshopService->getAll();
        return TicketAssembler::getTicketDtoAsList($tickets);
    }

    public function getTicketById(String $id): TicketDto
    {
        $ticket = $this->ticketshopService->getTicketById($id);
        return TicketAssembler::getTicketDto($ticket);
    }

}