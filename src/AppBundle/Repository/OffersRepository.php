<?php

namespace AppBundle\Repository;

/**
 * OffersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class OffersRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * Get offers list
     *
     * Get all offers item list
     *
     * @return array
     */
    public function getOffersList()
    {
        $query = $this->createQueryBuilder('offers')
            ->getQuery();

        return $query->getResult();
    }

    /**
     * Get offers by category
     *
     * Get offers by passed offers category name
     *
     * @param string $category
     * @return \Doctrine\ORM\Query
     */
    public function getOffersByCategory(string $category)
    {
        return $this->createQueryBuilder('o')
            ->join('AppBundle:OffersCategory', 'c', 'WITH', 'o.offersCategory = c.id')
            ->where('c.slug = :category')
            ->setParameter('category', $category)
            ->getQuery();
    }

    /**
     * Get offer by title
     *
     * Get offer item by passed title
     *
     * @param string $title
     * @return mixed
     */
    public function getOfferByTitle(string $title)
    {
        $query = $this->createQueryBuilder('o')
            ->where('o.title =:title')
            ->setParameter('title', $title)
            ->getQuery();

        return $query->getOneOrNullResult();
    }
}
