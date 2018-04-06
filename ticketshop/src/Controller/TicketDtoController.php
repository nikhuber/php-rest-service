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

class TicketDtoController
{

    private $ticketService;

    public function __construct(TicketService $ticketService)
    {
        $this->ticketService = $ticketService;
    }

    public function __invoke(TicketDto $data): TicketDto
    {
        $ticketDto = $this->ticketService->createTicket($data);
        return $ticketDto;
    }

}