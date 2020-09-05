<?php

namespace App\Repository;

use App\Entity\Epidemic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Epidemic|null find($id, $lockMode = null, $lockVersion = null)
 * @method Epidemic|null findOneBy(array $criteria, array $orderBy = null)
 * @method Epidemic[]    findAll()
 * @method Epidemic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EpidemicRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Epidemic::class);
    }

    // /**
    //  * @return Epidemic[] Returns an array of Epidemic objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Epidemic
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
