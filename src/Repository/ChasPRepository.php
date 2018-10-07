<?php

namespace App\Repository;

use App\Entity\ChasP;
use AppBundle\Entity\Customer;
use AppBundle\Entity\MedicalPackage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ChasP|null find($id, $lockMode = null, $lockVersion = null)
 * @method ChasP|null findOneBy(array $criteria, array $orderBy = null)
 * @method ChasP[]    findAll()
 * @method ChasP[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ChasPRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ChasP::class);
    }

//    /**
//     * @return ChasP[] Returns an array of ChasP objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ChasP
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
