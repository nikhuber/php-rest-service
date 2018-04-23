<?php
/**
 * Created by PhpStorm.
 * User: nhuber
 * Date: 05.04.18
 * Time: 11:21
 */
declare(strict_types=1);


namespace Rx\Tickets\Infrastructure;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Rx\Tickets\Domain\Model\Ticket;
use Rx\Tickets\Domain\Model\TicketNotFoundException;
use Rx\Tickets\Domain\Model\TicketRepository;

class TicketRepositoryDoctrine extends EntityRepository implements TicketRepository
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

    public function findByTicketId(string $id): Ticket
    {
        $ticket = $this->find($id);
        if ($ticket === NULL)
            throw new TicketNotFoundException(sprintf('The ticket with ID "%s" does not exist.', $id));

        return $ticket;
    }
}