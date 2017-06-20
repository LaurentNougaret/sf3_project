<?php

namespace CaradvisorBundle\Repository;

class ProRepository extends \Doctrine\ORM\EntityRepository
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
}
