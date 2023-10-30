<?php

namespace App\Repository;

use App\Entity\YourEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<YourEntity>
 *
 * @method YourEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method YourEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method YourEntity[]    findAll()
 * @method YourEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YourEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, YourEntity::class);
    }

//    /**
//     * @return YourEntity[] Returns an array of YourEntity objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('y')
//            ->andWhere('y.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('y.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?YourEntity
//    {
//        return $this->createQueryBuilder('y')
//            ->andWhere('y.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
