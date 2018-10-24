<?php

namespace App\Repository;

use App\Entity\Billtain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Billtain|null find($id, $lockMode = null, $lockVersion = null)
 * @method Billtain|null findOneBy(array $criteria, array $orderBy = null)
 * @method Billtain[]    findAll()
 * @method Billtain[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BilltainRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Billtain::class);
    }

//    /**
//     * @return Billtain[] Returns an array of Billtain objects
//     */
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
    public function findOneBySomeField($value): ?Billtain
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
