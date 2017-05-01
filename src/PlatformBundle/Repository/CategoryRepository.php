<?php

namespace PlatformBundle\Repository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAll()
    {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->select('c')->from("PlatformBundle:Category", 'c')
            ->orderBy('c.id', 'DESC')
        ;
        return $qb->getQuery()->getArrayResult();
    }
}