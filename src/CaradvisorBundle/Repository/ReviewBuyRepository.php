<?php

namespace CaradvisorBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ReviewBuyRepository extends EntityRepository
{
    /**
     * @param int $page
     * @param int $maxresults
     * @return Paginator
     */
    public function listReviewBuy($page = 1, $maxresults = 4)
    {
        $qb = $this->createQueryBuilder('rb')
            ->where("rb.isActive = false")
            ->setFirstResult(($page - 1) * $maxresults)
            ->setMaxResults($maxresults)
            ->getQuery();

        return new Paginator($qb, $fetchJoinCollection = false);
    }

//    /**
//     * @return mixed
//     */
//    public function totalUsers()
//    {
//        $qb = $this->createQueryBuilder('rb')
//            ->select('COUNT(rb)')
//            ->getQuery()
//            ->getSingleScalarResult();
//
//        return $qb;
//    }
}
