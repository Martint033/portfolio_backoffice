<?php

namespace App\Repository;

use App\Entity\CodeLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CodeLink|null find($id, $lockMode = null, $lockVersion = null)
 * @method CodeLink|null findOneBy(array $criteria, array $orderBy = null)
 * @method CodeLink[]    findAll()
 * @method CodeLink[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodeLinkRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CodeLink::class);
    }

//    /**
//     * @return CodeLink[] Returns an array of CodeLink objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CodeLink
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
