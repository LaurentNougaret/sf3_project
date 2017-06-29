<?php

namespace CaradvisorBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class UserRepository extends EntityRepository
{
    /**
     * @param int $page
     * @param int $maxresults
     * @return Paginator
     */
   public function listUser($page = 1, $maxresults = 5)
   {
       $qb = $this->createQueryBuilder('u')
           ->orderBy('u.lastName', 'ASC')
           ->setFirstResult(($page - 1) * $maxresults)
           ->setMaxResults($maxresults)
           ->getQuery();

       return new Paginator($qb, $fetchJoinCollection = false);
   }

    /**
     * @return mixed
     */
   public function totalUsers()
   {
       $qb = $this->createQueryBuilder('u')
           ->select('COUNT(u)')
           ->getQuery()
           ->getSingleScalarResult();

       return $qb;
   }
}
