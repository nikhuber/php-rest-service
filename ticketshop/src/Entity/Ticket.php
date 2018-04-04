<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 04.04.18
 * Time: 09:32
 */
declare(strict_types=1);

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * This is a dummy entity. Remove it!
 *
 * @ApiResource
 *
 */
class Ticket
{

    /**
     * @var string A unique ticket code
     *
     * @Assert\NotBlank
     */
    public $ticketCode = '';

}