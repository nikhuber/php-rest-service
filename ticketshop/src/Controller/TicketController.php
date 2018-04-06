<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 05.04.18
 * Time: 09:59
 */
declare(strict_types=1);

namespace App\Controller;

use App\Dto\TicketDto;
use App\TicketService;
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
        $ticketDto = $this->ticketService->createTicket($data);
        return $ticketDto;
    }

    public function getAll()
    {
        return $this->ticketService->getAll();
    }

}