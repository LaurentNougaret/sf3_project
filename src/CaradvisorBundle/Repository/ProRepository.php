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
}
