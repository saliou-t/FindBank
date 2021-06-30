<?php

namespace App\Repository;

use App\Entity\Banques;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Banques|null find($id, $lockMode = null, $lockVersion = null)
 * @method Banques|null findOneBy(array $criteria, array $orderBy = null)
 * @method Banques[]    findAll()
 * @method Banques[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BanquesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Banques::class);
    }

    // /**
    //  * @return Banques[] Returns an array of Banques objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Banques
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
