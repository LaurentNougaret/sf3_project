<?php

namespace CaradvisorBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ProRepository extends EntityRepository
{
    /**
     * @param $dealerName
     * @return array
     */
    public function findProIdByName($dealerName)
    {
        $dealerName = '%' . $dealerName . '%';
        $qb = $this->createQueryBuilder('p')
            ->select('p.dealerName', 'p.city', 'p.postalCode')
            ->where('p.dealerName LIKE :dealerName')
            ->setParameter('dealerName', $dealerName)
            ->getQuery();
        return $qb->getResult();
    }

    /**
     * @param $city
     * @return array
     */
    public function findProIdByCity($city)
    {
        $city = '%' . $city . '%';
        $qb = $this->createQueryBuilder('p')
            ->select('p.dealerName', 'p.city', 'p.postalCode')
            ->where('p.city LIKE :city')
            ->setParameter('city', $city)
            ->getQuery();
        return $qb->getResult();
    }

    /**
     * @param int $page
     * @param int $maxResults
     * @return Paginator
     */
    public function listEstabs($page = 1, $maxResults = 5)
    {
        $qb = $this->createQueryBuilder('p')
            ->orderBy('p.dealerName', 'ASC')
            ->setFirstResult(($page - 1) * $maxResults)
            ->setMaxResults($maxResults)
            ->getQuery();

        return new Paginator($qb, $fetchJoinCollection = false);
    }

    /**
     * @return mixed
     */
    public function totalEstabs()
    {
        $qb = $this->createQueryBuilder('p')
            ->select('COUNT(p)')
            ->getQuery()
            ->getSingleScalarResult();

        return $qb;
    }
}
