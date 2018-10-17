<?php

namespace App\Repository;

use App\Entity\ProjectsDemo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProjectsDemo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectsDemo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectsDemo[]    findAll()
 * @method ProjectsDemo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectsDemoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProjectsDemo::class);
    }

//    /**
//     * @return ProjectsDemo[] Returns an array of ProjectsDemo objects
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
    public function findOneBySomeField($value): ?ProjectsDemo
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
