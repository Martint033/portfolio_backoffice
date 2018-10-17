<?php

namespace App\Repository;

use App\Entity\DemoLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DemoLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method DemoLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method DemoLink[]    findAll()
 * @method DemoLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DemoLinkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DemoLink::class);
    }

//    /**
//     * @return DemoLink[] Returns an array of DemoLink objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DemoLink
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
