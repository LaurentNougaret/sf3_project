<?php

namespace CaradvisorBundle\Repository;

use Doctrine\ORM\EntityRepository;

class ReviewBuyRepository extends EntityRepository
{
    /**
     * @return array
     */
    public function getReviewBuys($id)
    {
        $qb = $this->createQueryBuilder('r');

        $qb
            ->where('r.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb
            ->getQuery()
            ->getResult()
        ;

    }

    public function getReviewsBuyWithReviewsRepair()
    {
        $qb = $this
            ->createQueryBuilder('b')
            ->leftJoin('r.reviewsRepair', 'rr')
            ->addSelect('rr')
        ;

        return $qb
            ->getQuery()
            ->getResult()
        ;
    }
}
