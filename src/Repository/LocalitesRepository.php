<?php

namespace App\Repository;

use App\Entity\Localites;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Localites|null find($id, $lockMode = null, $lockVersion = null)
 * @method Localites|null findOneBy(array $criteria, array $orderBy = null)
 * @method Localites[]    findAll()
 * @method Localites[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocalitesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Localites::class);
    }

    // /**
    //  * @return Localites[] Returns an array of Localites objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Localites
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
