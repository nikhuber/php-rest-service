<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 05.04.18
 * Time: 11:21
 */
declare(strict_types=1);


namespace Rx\Tickets\Repository;

use Rx\Tickets\Entity\Ticket;
use Doctrine\ORM\EntityManagerInterface;

class TicketRepository implements TicketRepositoryInterface
{
    private $em;
    private $ticketRepository;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        $this->ticketRepository = $this->em->getRepository(Ticket::class);
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

    public function findBy(String $id): Ticket
    {
        $ticket = $this->ticketRepository->find($id);
        return $ticket;
    }
}