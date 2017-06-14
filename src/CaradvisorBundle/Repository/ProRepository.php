<?php

namespace CaradvisorBundle\Repository;

class ProRepository extends \Doctrine\ORM\EntityRepository
{

    public function getReviewBuys()
    {
        $queryBuilder = $this->createQueryBuilder('p');

        $query = $queryBuilder->getQuery();
        $results = $query->getResult();

        return $results;


    }

    /**
     * @param $dealerName
     * @param $city
     * @param $postalCode
     * @return array
     */
    public function findProIdByName($dealerName, $city, $postalCode)
    {
        $qb = $this->createQueryBuilder('p')
            ->where('p.dealerName = :dealerName')
            ->andWhere('p.city = :city')
            ->andWhere('p.postalCode = :postalCode')
            ->setParameter('dealerName', $dealerName)
            ->setParameter('city', $city)
            ->setParameter('postalCode', $postalCode)
            ->getQuery();
        return $qb->getResult();
    }
}
