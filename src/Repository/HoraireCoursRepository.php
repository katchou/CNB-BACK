<?php

namespace App\Repository;

use App\Entity\HoraireCours;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method HoraireCours|null find($id, $lockMode = null, $lockVersion = null)
 * @method HoraireCours|null findOneBy(array $criteria, array $orderBy = null)
 * @method HoraireCours[]    findAll()
 * @method HoraireCours[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class HoraireCoursRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, HoraireCours::class);
    }

//    /**
//     * @return HoraireCours[] Returns an array of HoraireCours objects
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
    public function findOneBySomeField($value): ?HoraireCours
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
