<?php

namespace App\Repository;

use App\Entity\Operateurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Operateurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Operateurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Operateurs[]    findAll()
 * @method Operateurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperateursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Operateurs::class);
    }

    // /**
    //  * @return Operateurs[] Returns an array of Operateurs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Operateurs
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
