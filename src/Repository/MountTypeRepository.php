<?php

namespace App\Repository;

use App\Entity\MountType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MountType|null find($id, $lockMode = null, $lockVersion = null)
 * @method MountType|null findOneBy(array $criteria, array $orderBy = null)
 * @method MountType[]    findAll()
 * @method MountType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MountTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MountType::class);
    }

    // /**
    //  * @return MountType[] Returns an array of MountType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MountType
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
