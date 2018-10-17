<?php

namespace App\Repository;

use App\Entity\ProjectsCode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProjectsCode|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectsCode|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectsCode[]    findAll()
 * @method ProjectsCode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectsCodeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProjectsCode::class);
    }

//    /**
//     * @return ProjectsCode[] Returns an array of ProjectsCode objects
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
    public function findOneBySomeField($value): ?ProjectsCode
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
