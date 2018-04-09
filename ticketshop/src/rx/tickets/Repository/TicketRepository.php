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
use Doctrine\ORM\EntityRepository;
use Rx\Tickets\Entity\Ticket;

class TicketRepository extends EntityRepository implements TicketRepositoryInterface
{
    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, $entityManager->getClassMetadata(Ticket::class));
    }

    public function save(Ticket $ticket)
    {
        $this->getEntityManager()->persist($ticket);
        $this->getEntityManager()->flush();
    }

    public function findByTicketId(String $id): Ticket
    {
        return $this->find($id);
    }
}