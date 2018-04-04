<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 04.04.18
 * Time: 14:27
 */
declare(strict_types=1);

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;

/**
 * @ApiResource(itemOperations={},
 *     collectionOperations={
 *          "dto"={"route_name"="ticket_dto"}
 *     })
 */
class TicketDto
{

    /**
     * @var string Ticket code
     *
     */
    public $ticketCode;

}