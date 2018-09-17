<?php

namespace App\Repository;

use App\Entity\UserMail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserMail|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserMail|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserMail[]    findAll()
 * @method UserMail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserMailRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserMail::class);
    }

//    /**
//     * @return UserMail[] Returns an array of UserMail objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserMail
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
