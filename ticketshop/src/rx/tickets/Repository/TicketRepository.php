<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 05.04.18
 * Time: 11:21
 */
declare(strict_types=1);


namespace Rx\Tickets\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Rx\Tickets\Entity\Ticket;

class TicketRepository implements TicketRepositoryInterface
{
    private $entityManager;
    private $ticketRepository;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->ticketRepository = $entityManager->getRepository(Ticket::class);
    }

    public function save(Ticket $ticket)
    {
        $this->entityManager->persist($ticket);
        $this->entityManager->flush();
    }

    public function findAll()
    {
        return $this->ticketRepository->findAll();
    }

    public function findByTicketId(String $id): Ticket
    {
        return $this->ticketRepository->find($id);
    }
}