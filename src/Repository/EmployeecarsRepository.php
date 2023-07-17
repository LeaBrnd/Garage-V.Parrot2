<?php

namespace App\Repository;

use App\Entity\Employeecars;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Employeecars>
 *
 * @method Employeecars|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employeecars|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employeecars[]    findAll()
 * @method Employeecars[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeecarsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employeecars::class);
    }

//    /**
//     * @return Employeecars[] Returns an array of Employeecars objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Employeecars
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
