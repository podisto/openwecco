<?php
/**
 * Created by PhpStorm.
 * User: podisto
 * Date: 10/04/2017
 * Time: 20:19
 */

namespace UserBundle\Repository;


use Doctrine\ORM\EntityRepository;

class UserRepository extends EntityRepository
{
    public function findByUsernameOrEmail($username) {
        $qb = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('u')->from("UserBundle:User", 'u')
            ->where('u.username = :username')
            ->orWhere('u.email = :username')
            ->setParameter('username', $username)
        ;
        return $qb->getQuery()->getOneOrNullResult();
    }
}