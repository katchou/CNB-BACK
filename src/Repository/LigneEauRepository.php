<?php

namespace App\Repository;

use App\Entity\LigneEau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LigneEau|null find($id, $lockMode = null, $lockVersion = null)
 * @method LigneEau|null findOneBy(array $criteria, array $orderBy = null)
 * @method LigneEau[]    findAll()
 * @method LigneEau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LigneEauRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LigneEau::class);
    }

//    /**
//     * @return LigneEau[] Returns an array of LigneEau objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LigneEau
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
