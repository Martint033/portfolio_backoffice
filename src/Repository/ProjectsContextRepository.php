<?php

namespace App\Repository;

use App\Entity\ProjectsContext;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProjectsContext|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectsContext|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectsContext[]    findAll()
 * @method ProjectsContext[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectsContextRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProjectsContext::class);
    }

//    /**
//     * @return ProjectsContext[] Returns an array of ProjectsContext objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProjectsContext
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
