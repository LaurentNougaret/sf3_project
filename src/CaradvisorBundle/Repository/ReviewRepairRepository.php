<?php

namespace CaradvisorBundle\Repository;

/**
 * ReviewRepairRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReviewRepairRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @param $reviewRepairId
     * @return array
     */
    public function getReviewsForSlides($reviewRepairId)
    {
        $qb = $this->createQueryBuilder("r")
                    ->select(array(
                        "r.review",
                        "r.id",
                        "r.city",
                        "r.dateReview",
                        "r.dealerName",
                        "u.userName"))
                    ->join("r.user", "u")
                    ->orderBy("r.dateReview", "desc")
                    ->setMaxResults(3)
                    ->getQuery();

        return $qb->getResult();

    }
}
