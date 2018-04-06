<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 04.04.18
 * Time: 14:27
 */
declare(strict_types=1);

namespace App\Dto;

use ApiPlatform\Core\Annotation\ApiProperty;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use App\Controller\TicketDtoController;


/**
 * ...
 * @ApiResource(
 *     collectionOperations={"post"={"method"="POST", "path"="/ticket", "controller"=TicketDtoController::class}},
 *     itemOperations={"get"}
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
     * @return string
     */
    public function getTicketId(): string
    {
        return $this->ticketId;
    }

    /**
     * @param string $ticketId
     */
    public function setTicketId(string $ticketId)
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