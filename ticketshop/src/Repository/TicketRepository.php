<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 05.04.18
 * Time: 11:21
 */
declare(strict_types=1);


namespace App\Repository;

use App\Entity\Ticket;
use Doctrine\ORM\EntityManagerInterface;

class TicketRepository implements TicketRepositoryInterface
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function save(Ticket $ticket)
    {
        $this->em->persist($ticket);
        $this->em->flush();
    }
}