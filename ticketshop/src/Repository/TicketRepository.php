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
    private $em;
    private $ticketRepository;

    private const CLASS_NAME_TICKET = 'App\Entity\Ticket';

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->ticketRepository=$this->em->getRepository(self::CLASS_NAME_TICKET);
    }

    public function save(Ticket $ticket)
    {
        $this->em->persist($ticket);
        $this->em->flush();
    }

    /**
     * Finds all tickets in the repository.
     *
     * @return array All tickets.
     */
    public function findAll()
    {
       return $this->ticketRepository->findAll();
    }
}