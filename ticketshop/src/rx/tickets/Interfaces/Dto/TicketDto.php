<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 04.04.18
 * Time: 14:27
 */
declare(strict_types=1);

namespace Rx\Tickets\Interfaces\Dto;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *      collectionOperations={
 *          "post"={
 *              "method"="POST",
 *              "path"="/ticket",
 *              "controller"="Rx\Tickets\Interfaces\TicketshopFacadeImpl::create"
 *          },
 *          "get"={
 *              "method"="GET",
 *              "path"="/tickets",
 *              "controller"="Rx\Tickets\Interfaces\TicketshopFacadeImpl::getAll"
 *          }
 *      },
 *      itemOperations={
 *          "get"={
 *              "method"="GET",
 *              "path"="/tickets/{id}",
 *              "controller"="Rx\Tickets\Interfaces\TicketshopFacadeImpl::getTicketById",
 *              "defaults"={"_api_receive"=false}
 *          }
 *      }
 *     )
 */
class TicketDto
{
    /**
     * @var string Unique Identifier of the ticket
     *
     * @ApiProperty(identifier=true)
     * @Assert\NotBlank()
     */
    private $ticketId;

    /**
     * @var string Full name of the ticket holder
     *
     * @Assert\NotBlank()
     */
    private $ticketHolderName;

    /**
     * @var int ID of the event
     *
     * @Assert\NotBlank
     */
    private $eventId;

    /**
     * @var string Name of the event
     *
     */
    private $eventName;

    /**
     * @var int Ticket code printed on the ticket and evaluated by scanners
     *
     * @Assert\NotBlank
     */
    private $ticketCode;

    /**
     * @return int
     */
    public function getEventId(): int
    {
        return $this->eventId;
    }

    /**
     * @param int $eventId
     */
    public function setEventId(int $eventId): void
    {
        $this->eventId = $eventId;
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return $this->eventName;
    }

    /**
     * @param string $eventName
     */
    public function setEventName(string $eventName): void
    {
        $this->eventName = $eventName;
    }

    /**
     * @return int
     */
    public function getTicketCode(): int
    {
        return $this->ticketCode;
    }

    /**
     * @param int $ticketCode
     */
    public function setTicketCode(int $ticketCode): void
    {
        $this->ticketCode = $ticketCode;
    }

    /**
     * @return string
     */
    public function getTicketId(): string
    {
        return $this->ticketId;
    }

    /**
     * @param string $ticketId
     */
    public function setTicketId($ticketId)
    {
        $this->ticketId = $ticketId;
    }

    /**
     * @return string
     */
    public function getTicketHolderName(): string
    {
        return $this->ticketHolderName;
    }

    /**
     * @param string $ticketHolderName
     */
    public function setTicketHolderName(string $ticketHolderName): void
    {
        $this->ticketHolderName = $ticketHolderName;
    }

}