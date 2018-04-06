<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 04.04.18
 * Time: 09:32
 */
declare(strict_types=1);

namespace App\Entity;

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
    private $id;

    /**
     * @var string Name of the ticket holder
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $ticketHolderName = '';

    /**
     * @var int ID of the event
     *
     * @ORM\Column(type="bigint")
     * @Assert\NotBlank
     */
    public $eventId;

    /**
     * @var string Name of the event
     *
     * @ORM\Column
     */
    public $eventName;

    /**
     * @var int Ticket code printed on the ticket and evaluated by scanners
     *
     * @ORM\Column(type="bigint")
     * @Assert\NotBlank
     */
    public $ticketCode;

    public function getId(): string
    {
        return $this->id;
    }

}