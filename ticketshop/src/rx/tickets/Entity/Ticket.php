<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 04.04.18
 * Time: 09:32
 */
declare(strict_types=1);

namespace Rx\Tickets\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is a dummy entity. Remove it!
 *
 * @ApiResource
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
     * @var string Ticket code
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $ticketCode = '';

    /**
     * @var string Name of the ticket holder
     *
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $ticketHolderName = '';

    public function getId(): string
    {
        return $this->id;
    }

}