<?php

namespace CaradvisorBundle\Repository;

class ProRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param int $pro_id
     * @return array
     */
    public function getReview($pro_id)
    {
        $qb = $this->createQueryBuilder('p')
                   ->where('p.id = :pro_id')
                   ->setParameter('pro_id', $pro_id)
                   ->join('p.reviewBuys', 'rb')
                   ->join('p.reviewRepairs', 'rr')
                   ->select('p, rb, rr')
                   ->getQuery();
        return $qb->getResult();

    }
}
