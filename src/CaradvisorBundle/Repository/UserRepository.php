<?php

namespace CaradvisorBundle\Repository;

use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
//    public function getUsersByLastName($lastName)
//    {
//        $qb = $this->createQueryBuilder("u")
//            ->select("u.lastName")
//            ->orderBy("u.lastName" , "asc")
//            ->getQuery();
//        return $qb->getResult();
//
//
//    }

    public function findAll()
    {
        return $this->findBy(array(), array('lastName' => 'ASC'));
    }
}
