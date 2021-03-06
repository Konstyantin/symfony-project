<?php

namespace CarBundle\Repository;

/**
 * TransmissionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TransmissionRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Get item by name
     *
     * Get transmission item by passed name param
     *
     * @param string $name
     * @return mixed
     */
    public function getItemByName(string $name)
    {
        $query = $this->createQueryBuilder('transmission')
            ->where('transmission.name =:name')
            ->setParameter('name', $name)
            ->getQuery();

        return $query->getOneOrNullResult();
    }

    /**
     * Get first transmission
     *
     * Get first transmission record form transmission store list
     *
     * @return mixed
     */
    public function getFirstTransmission()
    {
        $query = $this->createQueryBuilder('transmission')
            ->setMaxResults(1)
            ->getQuery();

        return $query->getSingleResult();
    }
}
