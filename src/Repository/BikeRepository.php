<?php

namespace App\Repository;

use App\Entity\Bike;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class BikeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bike::class);
    }

    /**
     * @param Biks $bike
     */
    public function save(Bike $bike)
    {
        $this->_em->persist($bike);
        $this->_em->flush($bike);
    }

    /**
     * @param Bike $bike
     */
    public function delete(Bike $bike)
    {
        $this->_em->remove($bike);
        $this->_em->flush();
    }

}
