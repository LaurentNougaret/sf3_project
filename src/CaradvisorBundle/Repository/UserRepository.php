<?php

namespace CaradvisorBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    /**
     * @param int $user_id
     * @return array
     */
    public function getReviewUser($user_id)
    {
        $qb = $this->createQueryBuilder('u')
                    ->where('u.id = :user_id')
                    ->setParameter('user_id', $user_id)
                    ->join('u.reviewBuys','rb')
                    ->join('u.reviewRepairs', 'rr')
                    ->select('u, rb ,rr')
                    ->getQuery();
        return $qb->getResult();
    }

}