<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 04.04.18
 * Time: 09:32
 */
declare(strict_types=1);

namespace Rx\Tickets\Domain\Model;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A ticket entity for testing.
 *
 * @ORM\Entity
 *
 */
class Ticket
{

    /**
     * @var string A unique ticket code
     *
     * @ORM\Id
     * @ORM\Column(type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $ticketId;

    /**
     * @var string Name of the ticket holder
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    private $ticketHolderName = '';

    /**
     * @var int ID of the event
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $eventId;

    /**
     * @var string Name of the event
     *
     * @ORM\Column
     */
    private $eventName;

    /**
     * @var int Ticket code printed on the ticket and evaluated by scanners
     *
     * @ORM\Column(type="integer")
     * @Assert\NotBlank
     */
    private $ticketCode;

    /**
     * Ticket constructor.
     *
     * @param string $ticketHolderName
     * @param int $eventId
     * @param string $eventName
     */
    public function __construct(string $ticketHolderName, int $eventId, string $eventName)
    {
        $this->ticketHolderName = $ticketHolderName;
        $this->eventId = $eventId;
        $this->eventName = $eventName;
        $this->generateTicketCode();
    }

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

    public function getTicketId(): string
    {
        return $this->ticketId;
    }

    private function generateTicketCode()
    {
        // Implement some fancy generation algorithm here
        $this->ticketCode = rand(100000,999999);
    }

}