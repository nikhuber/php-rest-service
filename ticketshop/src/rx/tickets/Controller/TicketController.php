<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 05.04.18
 * Time: 09:59
 */
declare(strict_types=1);

namespace Rx\Tickets\Controller;

use Rx\Tickets\Dto\TicketDto;
use Rx\Tickets\TicketService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TicketController extends Controller
{

    private $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function create(TicketDto $data): TicketDto
    {
        return $this->ticketService->createTicket($data);
    }

    public function getAll()
    {
        return $this->ticketService->getAll();
    }

    public function getTicketById(String $id): TicketDto
    {
        return $this->ticketService->getTicketById($id);
    }

}