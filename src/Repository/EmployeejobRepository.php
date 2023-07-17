<?php

namespace App\Repository;

use App\Entity\Employeejob;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Employeejob>
 *
 * @method Employeejob|null find($id, $lockMode = null, $lockVersion = null)
 * @method Employeejob|null findOneBy(array $criteria, array $orderBy = null)
 * @method Employeejob[]    findAll()
 * @method Employeejob[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmployeejobRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Employeejob::class);
    }

//    /**
//     * @return Employeejob[] Returns an array of Employeejob objects
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

//    public function findOneBySomeField($value): ?Employeejob
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
