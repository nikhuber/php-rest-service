<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 04.04.18
 * Time: 14:27
 */
declare(strict_types=1);

namespace App\Controller;

use App\Entity\TicketDto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TicketRestController extends Controller
{

    public function specialAction(TicketDto $data): TicketDto
    {
        return new TicketDto();
    }

}