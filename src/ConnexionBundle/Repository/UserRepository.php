<?php

namespace ConnexionBundle\Repository;

class UserRepository extends \Doctrine\ORM\EntityRepository
{
    public function findUser($term) {
        $qb = $this->createQueryBuilder('user');
        //"CONCAT(user.firstName, ' ', user.lastName, ' ', user.username, ' ', user.image) LIKE:TERM"
        $qb->andWhere("user.username LIKE :TERM")
            ->setParameter('TERM','%'.$term.'%');

        return $qb->getQuery()->getResult();
    }
}
