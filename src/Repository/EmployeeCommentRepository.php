<?php

namespace App\Repository;

use App\Entity\EmployeeComment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EmployeeComment>
 *
 * @method EmployeeComment|null find($id, $lockMode = null, $lockVersion = null)
 * @method EmployeeComment|null findOneBy(array $criteria, array $orderBy = null)
 * @method EmployeeComment[]    findAll()
 * @method EmployeeComment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeeCommentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeeComment::class);
    }

//    /**
//     * @return EmployeeComment[] Returns an array of EmployeeComment objects
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

//    public function findOneBySomeField($value): ?EmployeeComment
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
