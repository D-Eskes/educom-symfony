<?php

namespace App\Repository;

use App\Entity\Poppodium;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Poppodium|null find($id, $lockMode = null, $lockVersion = null)
 * @method Poppodium|null findOneBy(array $criteria, array $orderBy = null)
 * @method Poppodium[]    findAll()
 * @method Poppodium[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PoppodiumRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Poppodium::class);
    }

    // /**
    //  * @return Poppodium[] Returns an array of Poppodium objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Poppodium
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function savePodium($params) {

        $podium = new Poppodium();
        $podium->setNaam($params["naam"]);
        $podium->setAdres($params["adres"]);
        $podium->setPostcode($params["postcode"]);
        $podium->setWoonplaats($params["woonplaats"]);
        $podium->setTelefoonnummer($params["telefoonnummer"]);
        $podium->setEmail($params["email"]);
        $podium->setWebsite($params["website"]);
        $podium->setAfbeeldingUrl($params["afbeelding_url"]);

        $this->_em->persist($podium);
        $this->_em->flush();

        return ($podium);
    }

    public function fetchPoppodium($id) {
        return($this->find($id));
    }
}
