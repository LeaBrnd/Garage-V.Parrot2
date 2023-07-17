<?php

namespace App\Repository;

use App\Entity\EmployeeCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EmployeeCategory>
 *
 * @method EmployeeCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmployeeCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmployeeCategory[]    findAll()
 * @method EmployeeCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeeCategory::class);
    }

//    /**
//     * @return EmployeeCategory[] Returns an array of EmployeeCategory objects
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

//    public function findOneBySomeField($value): ?EmployeeCategory
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
