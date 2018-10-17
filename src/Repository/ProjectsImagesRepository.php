<?php

namespace App\Repository;

use App\Entity\ProjectsImages;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ProjectsImages|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProjectsImages|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProjectsImages[]    findAll()
 * @method ProjectsImages[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectsImagesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ProjectsImages::class);
    }

//    /**
//     * @return ProjectsImages[] Returns an array of ProjectsImages objects
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
    public function findOneBySomeField($value): ?ProjectsImages
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